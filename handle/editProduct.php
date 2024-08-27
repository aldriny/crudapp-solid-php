<?php

require_once '../inc/connection.php';
require_once '../app.php';


if ($request->checkPost('submit') && $request->checkGet('id')) {
    // get old product data

    $id = $request->filter($request->get('id'));
    $validate->validator('id', $id, ['Required', 'Number']);
    $errors = $validate->getError();
    if (empty($errors)) {
        $product = $query->getQuery('Select', '*', 'products', $id, 'id');
        $product = $product->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            $session->set('errors', ['product not found']);
            $request->redirect('../index.php');

            // get new product data if exist
        } else {
            //filter product data
            $title = $request->filter($request->post('title')) ?: $product['title'];
            echo $product['title'];
            $price = $request->filter($request->post('price')) ?: $product['price'];
            $description = $request->filter($request->post('description')) ?: $product['description'];
            $image = $request->file('image');

            //validate product data
            $validate->validator('title', $title, ['Str', 'Max:255']);
            $validate->validator('price', $price, ['Number']);
            $validate->validator('description', $description, ['Str', 'Max:1000']);

            $errors = $validate->getError();

            if (empty($errors)) {
                if ($image['error'] !== UPLOAD_ERR_OK) {
                    echo ($product['image']);
                    $imageName = $product['image'];
                } else {
                    $validate->validator('image', $image, ['Image']);
                    $errors = $validate->getError();
                    if (empty($errors)) {
                        $imageName = $imageUpload->upload($image);
                    }
                }
                // upload edited product
                $updatedProduct = $query->getQuery('Update', ['title' => $title, 'price' => $price, 'description' => $description, 'image' => $imageName], 'products', $id, 'id');
                if (!$updatedProduct) {
                    $session->set('errors', ['problem editing product']);
                    $request->redirect('../index.php');
                } else {
                    $session->set('success', 'Product edited successfully');
                    $request->redirect('../index.php');
                }
            }
        }
    } else {
        $session->set('errors', ['product not found']);
        $request->redirect('../index.php');
    }
}
