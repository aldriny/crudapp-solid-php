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

            if ($request->checkGet('id')) {
                $id = $request->filter($request->get('id'));
                $validate->validator('id', $id, ['Required', 'Number']);
                $errors = $validate->getError();
                if (empty($errors)) {
                    $product = $query->getQuery('Select','*', 'products', $id, 'id');
                    if (!$product) {
                        $session->set('errors', ['Product not found']);
                        $request->redirect('index.php');
                    }
                    $product = $product->fetch(PDO::FETCH_ASSOC);
                } else {
                    $session->set('errors', ['Product not found']);
                    $request->redirect('index.php');
                }
            }
            ?>

            <h2 class="form-heading mb-4">Edit Product</h2>

            <div class="text-center mb-4">
                <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" class="img-preview" alt="Product Image">
            </div>

            <form action="handle/editProduct.php?id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($product['title']); ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" step="0.01" min="0">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" rows="4" name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
                </div>

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Edit Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
