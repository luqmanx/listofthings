<?php

//require_once "vendor/rosengate/exedra/Exedra/Exedra.php";
require_once 'app.php';
$exedra->httpRequest->resolveUri(); 

//echo $myapp->execute(array("method" => "get", "uri" => "test"));
$exedra->dispatch();
?>