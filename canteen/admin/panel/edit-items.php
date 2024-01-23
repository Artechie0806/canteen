<?php
session_start();
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="cod-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $item = getById("items", $id);

                if (mysqli_num_rows($item) > 0) {
                    $data = mysqli_fetch_array($item);
                    ?>
                    <div class="card">
                        <h3 class="card-header" style="color:rgb(20,20,20) ">Edit Items</h3>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="item_id" value="<?=$data['id'];?>">
                                        <label for="" style="color: black">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Food Name" value="<?=$data['name'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" style="color: black">Price</label>
                                        <input type="text" name="price" class="form-control" placeholder="In Rupees" value="<?=$data['price'];?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" style="color: black">Description</label>
                                        <textarea rows="3" name="description" class="form-control"
                                            placeholder="Food Description"><?=$data['description'];?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" style="color: black">Image</label>
                                        <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                        <input type="file" name="image" class="form-control">
                                        <label for="" style="color: black">Current Image</label>
                                        <img src="../uploads/<?=$data['image']?>" width="100px" alt="<?=$data['name'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="items.php" class="btn btn-primary" type="cancel"">Cancel</a>
                            <button class=" btn btn-primary" type="submit" name="update_item_btn">Update</button>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                    <?php
                } else {
                    redirect('items.php','No Item Found');
                }
            } else {
                redirect('items.php','Id not found');
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>