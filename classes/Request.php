<?php

namespace OnlineShop\Classes;

class Request {
    public function post($key){
        return $_POST[$key]?? null;
    }
    public function get($key){
        return $_GET[$key]?? null;
    }
    public function file($file){
        return $_FILES[$file]?? null;
    }
    public function checkPost($key){
        return isset($_POST[$key]);
    }
    public function checkGet($key){
        return isset($_GET[$key]);
    }
    public function filter($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }
    public function redirect($url){
        header("Location: $url");
        exit;
    }
}