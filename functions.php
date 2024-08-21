<?php
function convertToEuroes($price){
    //Return the proper euro price notation as a string.
    //Check first if the value isn't a float with no decimals.
    if(floatval($price) - intval($price) == 0){
        return '&euro;'.$price.',-';
    } else {
        //Convert to proper euro notation if it has decimals
        return '&euro;'.number_format($price, 2, ',', '.');
    }
}
function urlIs($url){
    //Return whether or not the given url is the current page.
    return $_SERVER['REQUEST_URI'] === $url;
}
function displayTable($tableArr){
    //Return a table from the database as a table in html.
    $totalPrice = 0;
    require 'views/partials/tablehead.php';
        foreach($tableArr as $product){
            echo "<tr>";
            echo "<td>{$product['product_name']}</td>";
            echo "<td>".convertToEuroes($product['product_price'])."</td>";
            echo "<td>{$product['product_quantity']}</td>";
            $subTotal = $product['product_price'] * $product['product_quantity'];
            $totalPrice += $subTotal;
            echo "<td>".convertToEuroes($subTotal)."</td>";
            echo "</tr>";
        }
    require 'views/partials/tablefoot.php';
    }
?>