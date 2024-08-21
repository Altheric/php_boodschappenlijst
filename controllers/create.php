<?php
//Set up some variables to use later.
$nameErr = $priceErr = $qtyErr = '';
$productName = $productPrice = $productQuantity = '';
$nameResult = $priceResult = $qtyResult = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validator.php';
    $validator = new Validator();
    //Check if the POST form values are empty, if they're not then validate them with functions.
    $nameResult = $validator->validateStrInput($_POST['product_name']);
    !$nameResult[1] ? $nameErr = $nameResult[0]: $productName = $nameResult[0];
    $priceResult = $validator->validateFloatInput($_POST['product_price'], 0.01, 255);
    !$priceResult[1] ? $priceErr = $priceResult[0]: $productPrice = $priceResult[0];
    $qtyResult = $validator->validateIntInput($_POST['product_quantity'], 1, 100);
    !$qtyResult[1]? $qtyErr = $qtyResult[0]: $productQuantity = $qtyResult[0];
    if($nameResult[1] && $priceResult[1] && $qtyResult[1]){
        //If no errors were thrown, write to database.
        $dbCreds = (require 'config.php')['database'];
        $groceriesDB = new Database('mysql', $dbCreds, 'root', '');
        //Prepare the statment
        $prepStatement = $groceriesDB->query('INSERT INTO groceries(`product_name`, `product_price`, `product_quantity`) VALUES (:product_name ,:product_price ,:product_quantity)', [
            'product_name' => $productName, 
            'product_price' => $productPrice,
            'product_quantity' => $productQuantity
        ]);
        header("Location: /");
        die();
    }
}
require 'views/create.view.php';
?>