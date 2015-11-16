<?php

require_once "./vendor/rosengate/exedra/Exedra/Exedra.php";

$exedra = new \Exedra\Exedra(__DIR__);

$myapp = $exedra->build("Apps" , function($app)
{

	$app->config->set([
		'baseUrl' => '',
		'assetUrl' => ''
		]);

});

$exedra->dispatch();
?>