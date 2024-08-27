<?php

namespace OnlineShop\Classes\Validation;

require_once 'ValidationInterface.php';

use OnlineShop\Classes\Validation\ValidationInterface;

class Image implements ValidationInterface{
    private $allowedExtensions = ['jpg', 'png', 'jpeg'];
    private $maxSize = 2;
    
    public function validate($key, $value) {
        $imageExtension = strtolower(pathinfo($value['name'], PATHINFO_EXTENSION));
        $imageSize = $value['size'] / 1024 * 1024;

        if(!in_array($imageExtension, $this->allowedExtensions)){
            return "Invalid image format. Allowed formats: " . implode(', ', $this->allowedExtensions);
        }
        if($imageSize > $value['size']){
            return "Image size exceeds the maximum allowed size of $this->maxSize MB";
        }
        return false;
    }
} 