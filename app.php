<?php

require_once 'classes/Request.php';
require_once 'classes/Session.php';
require_once 'classes/Validation/Validator.php';
require_once 'classes/ImageUpload.php';
require_once 'classes/Queries/Query.php';
require_once 'classes/Factory.php';

use OnlineShop\Classes\Request;
use OnlineShop\Classes\Session;
use OnlineShop\Classes\Validation\Validator;
use OnlineShop\Classes\ImageUpload;
use OnlineShop\Classes\Queries\Query;


$request = new Request;
$session = new Session;
$validate = new Validator;
$imageUpload = new ImageUpload;
$query = new Query;
