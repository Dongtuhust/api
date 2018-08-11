<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/connectdb.php';
include_once '../objects/product.php';
 
// khởi tạo  database , và kết nối 
$database = new Database();
$db = $database->getConnection();
 
// Khởi tạo object product
$product = new Product($db);
 
// query product
$stmt = $product->read();
$num = $stmt->rowCount();
 
// kiểm tra nếu nhiều hơn 1 bản ghi được tìm thấy
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "product_image" => $product_image,
            "detail_image" => $detail_image,
            "distributor" => $distributor,
            "quantity" => $quantity,
            "status" => $status,
            "update_time" => $update_time,
            "created_time" => $created_time,
            "purcharse_number" => $purcharse_number
        );
 
        array_push($products_arr["records"], $product_item);
    }
 
    echo json_encode($products_arr);
}
 
else{
    echo json_encode(
        array("message" => "Không tìm thấy sản phẩm nào.")
    );
}
?>