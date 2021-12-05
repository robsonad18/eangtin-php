<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Validation\Gtin;

$gtin = "7891074479532";

$result = Gtin::isValid($gtin);

var_dump($result);