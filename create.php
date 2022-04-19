<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - Thêm sản phẩm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="./style/create.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
</head>
<body>




    <a href="./index.php" class="home">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Trang chủ
    </a>
    <form method="post" class="form-create" enctype='multipart/form-data'>
        <div class="form-group">
            <label>Tên sản phẩm </label>
            <input type="text" id="product-name" placeholder="Nhập tên sản phẩm" name="product_name" required>
        </div>
        <div class="form-group">
            <label>Giá gốc </label>
            <input type="number" id="product-price" placeholder="Nhập giá gốc sản phẩm" name="product_price" required>
        </div>

        <div class="form-group">
            <label>Giá hiện tại </label>
            <input type="number" id="product-priceSale" placeholder="Nhập giá hiện tại sản phẩm" name="product_priceSale"required>
        </div>

        <div class="form-group">
            <label>Loại sản phẩm </label>
            <input type="text" id="product-type" placeholder="Nhập loại sản phẩm" name="product_type"required>
        </div>

        <div class="form-group">
            <label>Ảnh sản phẩm </label>
            <input type="text" id="product-image" placeholder="Nhập ảnh sản phẩm" name="product_image"required>
        </div>

        <div class="form-group">
            <label>Mô tả </label>
            <textarea rows="10" cols="40" placeholder="Nhập mô tả sản phẩm" name="product_desc"required></textarea>
        </div>

        <button type="submit" name="submit">Thêm</button>

        <?php 

        include_once("./Product.php");

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = (object)$_POST;
            $modelProduct = new Product();
            $create = $modelProduct->create($request);

            if ($create) {
                header('Location: /');
            }
            else {
                var_dump("Error");  
            }

        }
            
        ?>
    </form>

</body>
</html>