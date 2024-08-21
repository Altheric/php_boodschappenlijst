<?php
//Get the database using config.php and the Database object in database.php.
$dbCreds = (require 'config.php')['database'];
$groceriesDB = new Database('mysql', $dbCreds, 'root', '');
//Table containing all relevant grocery data.
$groceriesTable = $groceriesDB->query("SELECT * FROM groceries")->get();

//Total price of the grocieries
$totalPrice = 0;
require 'views/index.view.php';
?>