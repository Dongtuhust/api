<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/connectdb.php';
include_once '../objects/product.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new Product($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$product->id = $data->id;
 
// set product property values
$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->product_image = $data->product_image;
$product->detail_image = $data->detail_image;
$product->distributor = $data->distributor;
$product->quantity = $data->quantity;
$product->status = $data->status;
$product->category_id = $data->category_id;
$product->created_time = date('Y-m-d H:i:s');
$product->purcharse_number = $data->purcharse_number;
 
// update the product
if($product->update()){
    echo '{';
        echo '"message": "Cập nhật thành công sản phẩm"';
    echo '}';
}
 
// if unable to update the product, tell the user
else{
    echo '{';
        echo '"message": "Cập nhật thất bại"';
    echo '}';
}
?>