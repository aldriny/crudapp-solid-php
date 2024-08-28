<?php
require_once 'inc/connection.php';
require_once 'inc/header.php';
require_once 'app.php';
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <?php
            require_once 'inc/success.php';
            require_once 'inc/error.php';
            ?>

            <form action="handle/addProduct.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <center><button on type="submit" class="btn btn-primary" name="submit">Add Product</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>