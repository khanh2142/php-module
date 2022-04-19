<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - Xóa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./style/delete.css" rel="stylesheet">
</head>
<body>
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
    ?>

        <div class="container" style="margin-top: 50px;">

        <a href="./index.php" class="btn btn-primary">Trang chủ</a>

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
            <td class="table-delete"><a href="/delete.php?id=<?php echo $item->id?>" class="btn btn-danger">Xóa</a></td>
            </tr>
    <?php
        }
    ?>
</tbody>
</table>

<?php
    $id = $_GET['id'];
    $modelProduct = new Product();
    $data = $modelProduct->find($id);
    if(empty($data)) {
        return;
    }
    $status = $modelProduct->delete($id);
    header("Refresh:0");
    ob_end_flush();

?>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>