<?php
class ProductController {

    public function index(){
       $db= new Product();
       $data['products']= $db->getAllProducts();
       View::load('product/index',$data);
    }
    //load page add to add new product
    public function add(){
        View::load('product/add');
    }
    //get data from form and add product to database
    public function store(){

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];

            $data = Array ("name" => $name,
               "price" => $price,
               "description" => $description,
               "qty" => $qty);
            $db = new Product();
            if($db->insertProduct($data)){
                View::load("product/add",["success"=>"Data Created Successfully"]);
            }
            else{
                View::load("product/add");
            }
            }
        }

    //edit product info
    public function edit ($id){
        $db = new Product();
        if($db->getRow($id)){
            $data['row']=$db->getRow($id);
            View::load('product/edit',$data);
        }
        else{
            echo "error";
        }
     //   View::load('product/edit');
    }
    //delete product from database
    public function delete($id){
        $db = new Product();
        if($db->deleteProduct($id)){
            View::load('product/delete');
        }
        else {
            echo "Error";
        }
        
    }

    public function update($id){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];

            $dataInsert = Array ("name" => $name,
               "price" => $price,
               "description" => $description,
               "qty" => $qty);
            $db = new Product();
            if($db->updateProduct($id,$dataInsert)){
             
                View::load("product/edit",["success"=>"Data Updated Successfully","row"=>$db->getRow($id)]);
            }
            else{
                View::load("product/edit",["row"=>$db->getRow($id)]);
            }
            }

    }
}