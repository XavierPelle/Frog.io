<?php 
include_once('vendor/autoload.php');

use Formation\Cours\Dispatcher;

$content = new Dispatcher();
$content->dispatch();
