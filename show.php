<?php
require_once 'inc/header.php';
require_once 'app.php';
?>

<div class="container my-5">
    <?php
    require_once 'inc/success.php';
    require_once 'inc/error.php';

    if ($request->checkGet('id')) {
        $id = $request->filter($request->get('id'));
        $validate->validator('id', $id, ['Required', 'Number']);
        $errors = $validate->getError();
        if (empty($errors)) {
            $product = $query->getQuery('Select', '*', 'products', $id, 'id');
            $product = $product->fetch(PDO::FETCH_ASSOC);
        }
        if (!$product) {
            $session->set('errors', ['Product not found']);
            $request->redirect('index.php');
        }
    } else {
        $session->set('errors', ['Product not found']);
        $request->redirect('index.php');
    }
    ?>
    
    <h2 class="form-heading mb-5">Product Details</h2>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid rounded shadow-sm" alt="<?php echo htmlspecialchars($product['title']); ?>">
        </div>
        <div class="col-lg-6">
            <h1 class="mb-3"><?php echo htmlspecialchars($product['title']); ?></h1>
            <p class="lead text-muted mb-3">$<?php echo htmlspecialchars($product['price']); ?></p>
            <p class="mb-4"><?php echo htmlspecialchars($product['description']); ?></p>
            <div class="d-flex gap-2">
                <a href="index.php" class="btn btn-primary">Back</a>
                <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
                <a href="handle/deleteProduct.php?id=<?php echo $product['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
