<?php 

class Product {

    public function getAllData(){
        $connect = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
        $sql = "select * from products";
        $statement = $connect->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_OBJ);
        return (count($data) > 0) ? $data : [];
    }

    public function create($request) {
        try {
            $connect = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
            $sql = "insert into products (product_name,  product_desc, price,price_sale, product_image, product_type) value (? , ? , ? , ? , ? , ?)";
            $stmt= $connect->prepare($sql);
            $stmt->execute([$request->product_name, $request->product_desc, $request->product_price,$request->product_priceSale,$request->product_image,$request->product_type]);
            $connect = null;
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    public function update($id, $request){
        try {
            $connect = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
            $sql = "update products set product_name=?, product_desc=?,price=?, price_sale=?, product_image=? ,product_type=? WHERE id=?";
            $stmt= $connect->prepare($sql);
            $stmt->execute([$request->product_name,$request->product_desc,$request->product_price,$request->product_priceSale,$request->product_image,$request->product_type,$id]);
            $connect = null;
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    public function find($id) {
        $sql = "select * from products where id = {$id}";
        try {
            $connect = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
            $statement = $connect->query($sql);
            $data = $statement->fetchAll();
            if(count($data)) {
                $data = $data[0];
            } else {
                $data = [];
            }
            return $data;
        } catch(Exception $e) {
            return [];
        }
    }

    public function delete($id) {
        try {
            $connect = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
            $sql = "delete from products where id = {$id}";
            $connect->exec($sql);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}

?>