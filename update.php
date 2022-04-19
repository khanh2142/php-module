<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - Sửa sản phẩm</title>
  <link href="./style/delete.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <style>

    </style>


    <?php
          ob_start();
        include_once("./Product.php");
        function currency_format($number) {
            if(!empty($number)) {
                return number_format($number, 0, ',', '.');
            }
        }
        $product = new Product();
        $allProduct = $product->getAllData();

        $id = $_GET['id'];
        $modelProduct = new Product();

        $data = $modelProduct->find($id);

    


    ?>

        <div class="container" style="margin-top: 50px;">

        <a href="./index.php" class="btn btn-primary">Trang chủ</a>

        <form method="post" class="form-create" enctype='multipart/form-data'>
            <div class="form-group">
                <label>Tên sản phẩm </label>
                <input type="text" id="product-name" value="<?php echo $data ? $data["product_name"] : ""?>" name="product_name" required>
            </div>
            <div class="form-group">
                <label>Giá gốc </label>
                <input type="number" id="product-price" value="<?php echo $data ? $data["price"] : ""?>" required name="product_price">
            </div>

            <div class="form-group">
                <label>Giá hiện tại </label>
                <input type="number" id="product-priceSale" value="<?php echo $data ? $data["price_sale"] : ""?>" name="product_priceSale"required>
            </div>

            <div class="form-group">
                <label>Loại sản phẩm </label>
                <input type="text" id="product-type" value="<?php echo $data ? $data["product_type"] : ""?>" name="product_type" required>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm </label>
                <input type="text" id="product-image" value="<?php echo $data ? $data["product_image"] : ""?>" name="product_image" required>
            </div>

            <div class="form-group">
                <label>Mô tả </label>
                <textarea rows="10" cols="40"  name="product_desc" required><?php echo $data ? $data["product_desc"] : ""?></textarea>
            </div>

            <button class="btn btn-warning" type="submit" id="btn">Sửa</button>
        </form>

<table class="table">
<thead>
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Tên sản phẩm</th>
    <th scope="col">Ảnh</th>
    <th scope="col">Giá gốc</th>
    <th scope="col">Giá sale</th>
    <th scope="col">Loại</th>
    <th scope="col">Mô tả</th>
    <th scope="col">Chức năng</th>
    </tr>
</thead>
<tbody>
    <?php foreach($allProduct as $item ){
        ?>
            <tr class="table-item">
            <th scope="row"><?php echo $item->id?></th>
            <td class="table-name"><?php echo $item->product_name?></td>
            <td class="table-image"><img src="<?php echo $item->product_image?>" alt=""/></td>
            <td><?php echo currency_format($item->price)?>đ</td>
            <td><?php echo currency_format($item->price_sale)?>đ</td>
            <td><?php echo $item->product_type?></td>
            <td class="table-desc"><?php echo $item->product_desc?></td>
            <td class="table-delete"><a href="/update.php?id=<?php echo $item->id?>" class="btn btn-success">Sửa</a>
                
        </td>

            </tr>
    <?php
        }
    ?>
</tbody>
</table>

        
    <?php
    
    
    if(!(array)$data) {
        return;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $request = (object)$_POST;

        $status = $modelProduct->update($id, $request);

        header("Refresh:0");
    }
    ob_end_flush();
?>

    </div>

</body>
</html>