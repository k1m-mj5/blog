<?php

require_once 'database.php';

class Category extends Database{
    private $conn;

    public function __construct(){
        $this->conn = $this->connect();
    }

    public function displayCategoriesAsOptions($category_id = NULL){
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){

            if($category_id == NULL){
                echo "<option disabled selected>Select Category</option>";
            }
            
            while($row = $result->fetch_assoc()){

                if($category_id == $row["category_id"]){
                    echo "<option value='".$row["category_id"]."' selected>".$row["category_name"]."</option>";
                }
                else{
                    echo "<option value='".$row["category_id"]."'>".$row["category_name"]."</option>";
                }
                
            }
        } else{
            echo "<option disabled selected>No Categories to choose from</option>";
        }
    }

    public function displayCategoriesAsRows(){
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
            echo 
            "<tr>
                <td>".$row["category_id"]."</td>
                <td>".$row["category_name"]."</td>
                <td>
                <button class='btn btn-warning text-white btn-sm btn-block'>Update</button>
                </td>
                <td>
                
                <!-- Button trigger modal -->
                <button type='button' class='btn btn-danger btn-block btn-sm' data-toggle='modal' data-target='#delete".$row["category_id"]."'>
                Delete
                </button>

                <!-- Modal -->
                <div class='modal fade' id='delete".$row["category_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Delete Category</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                <div class='modal-body'>
                <P class='text-center'>Are you sure you want to delete the category <span class='font-weight-bold font-italic'>".$row["category_name"]."</span>?</p>
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary'>Save changes</button>
                </div>
                </div>
                </div>
                </div>
                </td>
            </tr>";
            }
        }
    }
    
}
