<?php
session_start();
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="cod-md-12">
            <div class="card">
                <h3 class="card-header" style="color:rgb(20,20,20) ">Add Items</h3>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" style="color: black">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Food Name">
                            </div>
                            <div class="col-md-6">
                                <label for="" style="color: black">Price</label>
                                <input type="text" name="price" class="form-control" placeholder="In Rupees">
                            </div>
                            <div class="col-md-12">
                                <label for="" style="color: black">Description</label>
                                <textarea rows="3" name="description" class="form-control"
                                    placeholder="Food Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="" style="color: black">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                        <a href="items.php" class="btn btn-primary" type="cancel"">Cancel</a>
                            <button class="btn btn-primary" type="submit" name="add_item_btn">Add</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>