<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/connectdb.php';
 
// instantiate product object
include_once '../objects/product.php';
 

 

 
// get data rabbitmq
$connection = new AMQPConnection('35.240.181.251', 31234, 'guest', 'guest');
$channel    = $connection->channel();
$channel->queue_declare('product_queue', false, false, false, false);


$callback = function ($msg) {
	$data =  $msg->body;
	echo $data;
	$database = new Database();
	$db = $database->getConnection();
	$data = json_decode($data);
	var_dump($data);
	$product = new Product($db);
// set product property values
	$product->name = $data->name;
	echo $product->name;
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
    var_dump($product);
    var_dump($product->create());
// create the product
	if($product->create()){
	    echo '{';
	        echo '"message": "Tạo mới một sản phẩm thành công"';
	    echo '}';
	    return true;
	}
	 
	// if unable to create the product, tell the user
	else{
	    echo '{';
	        echo '"message": "Tạo mới thất bại"';
	    echo '}';
	    return false;
	}
	
};

$channel->basic_consume('product_queue', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
    if ($channel->callbacks) {
    	break;
    }
}


?>
