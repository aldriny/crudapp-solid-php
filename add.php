<?php
require_once 'inc/header.php';
require_once 'app.php';
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
            <?php
            require_once 'inc/success.php';
            require_once 'inc/error.php';
            ?>

            <h2 class="form-heading mb-4">Add New Product</h2>

            <form action="handle/addProduct.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" rows="4" name="description" ></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
