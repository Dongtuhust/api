<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/connectdb.php';
include_once '../objects/product.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new Product($db);
 
// set ID property of product to be edited
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of product to be edited
$product->readOne();
 
// create array
$product_arr = array(
    "id" =>  $product->id,
    "name" => $product->name,
    "description" => $product->description,
    "price" => $product->price,
    "category_id" => $product->category_id,
 	"product_image" => $product->product_image,
    "detail_image" => $product->detail_image,
    "distributor" => $product->distributor,
    "quantity" => $product->quantity,
    "status" => $product->status,
    "update_time" => $product->update_time,
    "created_time" => $product->created_time,
    "purcharse_number" => $product->purcharse_number
);
 
// make it json format
print_r(json_encode($product_arr));