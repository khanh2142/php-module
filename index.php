<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="./style/style.css" rel="stylesheet">
</head>
<body>


<?php

include_once("./Product.php");

function currency_format($number) {
    if(!empty($number)) {
        return number_format($number, 0, ',', '.');
    }
}


$product = new Product();

$allProduct = $product->getAllData();

?>    
    <a href="./create.php" class="btn">Thêm sản phẩm</a>
    <a href="./update.php?id=0" class="btn btn-update">Chỉnh sửa sản phẩm</a>
    <a href="./delete.php" class="btn btn-delete">Xóa sản phẩm</a>

    <h1>Danh sách sản phẩm<h1>
    <div class="product__container">
        <?php foreach($allProduct as $item) { ?>
            <div class="product__item">
                <div class="product__item-image" style="background-image : url(<?php echo $item->product_image ?>)"></div>
                <div class="product__item-name"><?php echo $item->product_name?></div>
                <div class="product__item-price"><?php echo currency_format($item->price)?>₫</div>
                <div class="product__item-priceSale"><?php echo currency_format($item->price_sale)?>₫</div>
                <div class="preview__item">
                    <div class="preview__item-container">
                        <div class="preview__item-name">Tên sản phẩm : <?php echo $item->product_name?></div>
                        <div class="preview__item-price">Giá gốc : <?php echo currency_format($item->price)?>₫</div>
                        <div class="preview__item-priceSale">Giá : <?php echo currency_format($item->price_sale)?>₫</div>
                        <div class="preview__item-type">Loại : <?php echo $item->product_type?></div>
                        <div class="preview__item-desc">Mô tả sản phẩm : <?php echo $item->product_desc?></div>

                    </div>
                    <div class="preview__item-image">
                        <img src="<?php echo $item->product_image?>" alt="">
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>


    
</body>

</html>

