<?php

namespace OnlineShop\Classes;

class ImageUpload {
    public function upload($image){
        $ext = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
        $newImageName = uniqid() . time() . ".". $ext;
        move_uploaded_file($image['tmp_name'],"../assets/images/$newImageName");
        return $newImageName;
    }

    public function delete($image){
        unlink("../assets/images/$image");
    }
}