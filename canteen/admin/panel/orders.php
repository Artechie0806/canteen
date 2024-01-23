<?php
session_start();
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
    <?php if (isset($_SESSION['message'])) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>
                <?= $_SESSION['message']; ?>.
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>
    
    <!-- <div class="row">
        <div class="cod-md-12">
            <div class="card">
                <h3 class="card-header" style="color:rgb(20,20,20) ">Food Items</h3>
                <div class="card-body">
                    <table class="table table-bordered">
                        <?php
                        $items = getAll("items");

                        if (mysqli_num_rows($items) > 0) { ?>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($items as $item) {
                                    ?>

                                    <tr>
                                        <td>
                                            <?= $item['name']; ?>
                                        </td>
                                        <td>
                                            <?= $item['description']; ?>
                                        </td>
                                        <td>
                                            <img src="../uploads/<?= $item['image'];?>" width="50px" alt="<?=$item['name'];?>">
                                        </td>
                                        <td>
                                            <?= $item['price']; ?>
                                        </td>
                                        <td>
                                            <a href="edit-items.php?id=<?= $item['id'];?>" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                        } else {
                            ?>
                                <h5>No Records Found</h5>
                                <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <a href="add-items.php" class="btn btn-primary">Add Items</a>
                </div>
            </div>
        </div>
    </div> -->
</div>

<?php include('includes/footer.php') ?>