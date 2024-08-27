<?php

require_once '../inc/connection.php';
require_once '../app.php';

if ($request->checkGet('id')){

    $id = $request->filter($request->get('id'));

    $validate->validator('id', $id, ['Required', 'Number']);
    $errors = $validate->getError();

    if (empty($errors)) {
        $product = $query->getQuery('Select', ['id','image'], 'products', $id, 'id');
        $product = $product->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            $session->set('errors', ['product not found']);
            $request->redirect('../index.php');
        }
        else{
            $image = $product['image'];
            $imageUpload->delete($image);
            $deleteProduct = $query->getQuery('Delete','', 'products', $id, 'id');
            if(!$deleteProduct) {
                $session->set('errors', ['error deleting product']);
                $request->redirect('../index.php');                
            }
            $session->set('success', 'Product deleted successfully');
            $request->redirect('../index.php');  
        }
}

}