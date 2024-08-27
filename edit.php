<?php
require_once 'inc/header.php';
require_once 'app.php';
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <?php
            require_once 'inc/success.php';
            require_once 'inc/error.php';


            if ($request->checkGet('id')) {
                $id = $request->filter($request->get('id'));
                $validate->validator('id', $id, ['Required','Number']);
                $errors = $validate->getError();    
                if(empty($errors)){
                $product = $query->getQuery('Select', '*', 'products', $id, 'id');      
                if(!$product){
                    $session->set('errors', ['product not found']);
                    $request->redirect('index.php');
                }
                $product = $product->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $session->set('errors', ['product not found']);
                    $request->redirect('index.php');
                }
            }
            ?>

            <form action="handle/editProduct.php?id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $product['title']; ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" rows="3" name="description"><?php echo $product['description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <div class="col-lg-3">
                    <img src="assets/images/<?php echo $product['image'] ?>" class="card-img-top">
                </div>

                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>