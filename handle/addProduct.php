<?php

require_once '../app.php';

if ($request->checkPost('submit')) {
    $title = $request->filter($request->post('title'));
    $price = $request->filter($request->post('price'));
    $description = $request->filter($request->post('description'));
    $image = $request->file('image');

    //validate
    $validate->validator('title', $title, ['Required', 'Str', 'Max:255']);
    $validate->validator('price', $price, ['Required', 'Number']);
    $validate->validator('description', $description, ['Required', 'Str', 'Max:1000']);
    $validate->validator('image', $image, ['Required', 'Image']);

    $errors = $validate->getError();

    if (empty($errors)) {
        $newImageName = $imageUpload->upload($image);

        $insert =  $query->getQuery('Insert', ['title', 'price', 'description', 'image'], 'products', [$title, $price, $description, $newImageName]);


        if ($insert) {
            $session->set('success', 'Product added successfully');
            $request->redirect('../index.php');
        } else {
            $session->set('errors', ['Failed to add product']);
            $request->redirect('../add.php');
        }
    } else {
        $session->set('errors', $errors);
        $request->redirect('../add.php');
    }
} else {
    $request->redirect('../add.php');
}
