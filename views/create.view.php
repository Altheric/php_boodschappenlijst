<?php require('partials/header.php') ?>
<?php require('partials/nav.php') ?>
<form method="POST" action="<?=htmlspecialchars('/create');?>">
    <label for="product-name">Product naam:</label>
    <input type="text" id="product-name" name="product_name" maxlength="255" required>
    <span class="error">* <?php echo $nameErr;?></span><br>
    <label for="product-price">Prijs per product:</label>
    <input type="number" id="product-price" name="product_price" min = "0.01" step="0.01" placeholder = "0,-" required>
    <span class="error">* <?php echo $priceErr;?></span><br>
    <label for="product-quantity">Hoeveelheid:</label>
    <input type="number" id="product-quantity" name="product_quantity" min = "1" max="100" placeholder = "0" required>
    <span class="error">* <?php echo $qtyErr;?></span><br>
    <input type="submit" value="Toevoegen">
</form>
<?php require('partials/footer.php');?>