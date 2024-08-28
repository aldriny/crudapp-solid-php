<?php
require_once 'inc/header.php';
require_once 'app.php';

?>

<div class="container my-5">
    <div class="row">
        <?php
        require_once 'inc/success.php';
        require_once 'inc/error.php';

            $stmt = $query->getQuery('Select','*', 'products');

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="assets/images/<?php echo $row['image'] ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="text-muted">$<?php echo htmlspecialchars($row['price']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <div class="mt-auto">
                                <a href="show.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Show</a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                                <a href="handle/deleteProduct.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('are you sure ?')">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '
            <div class="container text-center mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <h1 class="display-4">No Products Found</h1>
                        <p class="lead">It seems there are no products available at the moment.</p>
                        <a href="add.php" class="btn btn-primary btn-lg">Add New Product</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>

<?php include 'inc/footer.php'; ?>