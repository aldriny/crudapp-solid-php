<?php
require_once 'inc/header.php';
require_once 'app.php';
?>

<div class="container my-5">

    <div class="row">
    <div class="col-lg-6">
    <?php
                require_once 'inc/success.php';
                require_once 'inc/error.php';

                if ($request->checkGet('id')) {
                    $id = $request->filter($request->get('id'));
                    $validate->validator('id', $id, ['Required','Number']);
                    $errors = $validate->getError();    
                    if(empty($errors)){
                    $product = $query->getQuery('Select','*','products',$id,'id');
                    $product = $product->fetch(PDO::FETCH_ASSOC);
                    }
                    if(!$product){
                        $session->set('errors', ['product not found']);
                        $request->redirect('index.php');
                    }
                    }
                    else{
                        $session->set('errors', ['product not found']);
                        $request->redirect('index.php');
                    }
            ?>
            <img src="assets/images/<?php echo $product['image'];?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?php echo $product['title'];?></h5>
            <p class="text-muted"><?php echo $product['price'];?></p>
            <p><?php echo $product['description'];?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
            <a href="handle/deleteProduct.php?id=<?php echo $product['id'] ?>" class="btn btn-danger"  onclick="confirm('are you sure ?')">Delete</a>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>