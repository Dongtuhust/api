<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "products";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $product_image;
    public $detail_image;
    public $price;
    public $category_id;
    public $distributor;
    public $quantity;
    public $status;
    public $update_time;
    public $created_time;
    public $purcharse_number;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
 
        // select all query
        $query = "SELECT * FROM products";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

    // create product
    function create(){
     
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "(name,price,description,category_id,product_image,detail_image,distributor,quantity,status,created_time,purcharse_number) values (:name,:price,:description,:category_id,:product_image,:detail_image,:distributor,:quantity,:status,:created_time,:purcharse_number) ";
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->product_image=htmlspecialchars(strip_tags($this->product_image));
        $this->detail_image=htmlspecialchars(strip_tags($this->detail_image));
        $this->distributor=htmlspecialchars(strip_tags($this->distributor));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->purcharse_number=htmlspecialchars(strip_tags($this->purcharse_number));
        $this->created_time=htmlspecialchars(strip_tags($this->created_time));
     
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":product_image", $this->product_image);
        $stmt->bindParam(":detail_image", $this->detail_image);
        $stmt->bindParam(":distributor", $this->distributor);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":purcharse_number", $this->purcharse_number);
        $stmt->bindParam(":created_time", $this->created_time);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }


    // used when filling up the update product form
    function readOne(){
     
        // query to read single record
        $query = "SELECT
                   *
                FROM
                    products p
                WHERE
                    p.id = ?
                LIMIT
                    0,1";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->name=$row['name'];
        $this->price=$row['price'];
        $this->description=$row['description'];
        $this->category_id=$row['category_id'];
        $this->product_image=$row['product_image'];
        $this->detail_image=$row['detail_image'];
        $this->distributor=$row['distributor'];
        $this->quantity=$row['quantity'];
        $this->status=$row['status'];
        $this->purcharse_number=$row['purcharse_number'];
        $this->created_time=$row['created_time'];
    }



    // update the product
    function update(){
     
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name=:name, price=:price, description=:description, category_id=:category_id,product_image=:product_image,detail_image=:detail_image,distributor=:distributor,quantity:=quantity,status=:status, created_time=:created_time,purcharse_number:=purcharse_number
                WHERE
                    id = :id";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->product_image=htmlspecialchars(strip_tags($this->product_image));
        $this->detail_image=htmlspecialchars(strip_tags($this->detail_image));
        $this->distributor=htmlspecialchars(strip_tags($this->distributor));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->purcharse_number=htmlspecialchars(strip_tags($this->purcharse_number));
        $this->created_time=htmlspecialchars(strip_tags($this->created_time));
     
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":product_image", $this->product_image);
        $stmt->bindParam(":detail_image", $this->detail_image);
        $stmt->bindParam(":distributor", $this->distributor);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":purcharse_number", $this->purcharse_number);
        $stmt->bindParam(":created_time", $this->created_time);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }


    // delete the product
    function delete(){
     
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }


    // search products
    function search($keywords){
     
        // select all query
        $query = "SELECT
                   *
                FROM
                    " . $this->table_name . " p
                WHERE
                    p.name LIKE ? ";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
     
        // bind
        $stmt->bindParam(1, $keywords);

        // execute query
        $stmt->execute();
     
        return $stmt;
    }


        // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                   *
                FROM  $this->table_name LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
}
