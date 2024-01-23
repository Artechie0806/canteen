<?php

session_start();

include("../config/dbcon.php");
include("../functions/redirct.php");

if (isset($_POST["add_item_btn"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().".".$image_ext;

    $item_query = "INSERT INTO items (name,price,description,image) VALUES  ('$name','$price','$description','$filename')";

    $item_query_run = mysqli_query($con, $item_query);

    if($item_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect('items.php','Added Successfully');
    }
    else{
        redirect("items.php","Something Went Wrong");
    }
}

else if(isset($_POST["update_item_btn"])) {
    $item_id= $_POST["item_id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $path = "../uploads";

    $new_image = $_FILES["image"]["name"];

    $old_image = $_POST["old_image"];

    if($new_image != ""){
        $update_filename = $new_image;
    }
    else{
        $update_filename = $old_image;
    }

    $update_query = "UPDATE items SET name='$name', price='$price', description='$description', image='$update_filename' WHERE id='$item_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run){
        if($new_image != NULL){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }
        redirect("items.php","Item Updated Successfully for $name");
    } 
}

else if(isset($_POST["delete_item"])) {
    $item_id= mysqli_real_escape_string($con, $_POST['item_id']);
    $item_query ="SELECT * FROM items WHERE id='$item_id'";
    $item_query_run = mysqli_query($con, $item_query);
    $item_data = mysqli_fetch_array($item_query_run);

    $image = $item_data["image"];

    $delete_query = "DELETE FROM items WHERE id='$item_id'";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run){
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        redirect("items.php","Category Deleted");
    }
    else{
        redirect("items.php","Something went wrong");
    }
}

?>