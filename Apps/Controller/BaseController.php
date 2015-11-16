<?php

namespace Apps\Controller;

class BaseController
{

	public function __construct($exe)
	{
		$this->exe = $exe;
		$this->view = $this->exe->view;
		$this->layout = $this->exe->view->create('layout/default');

		$this->exe->url->setBase('http://localhost/will-list');
		$this->exe->url->setAsset('http://localhost/will-list/assets');

		$this->query = new \Apps\Model\QB();

		
	}

	public function render($view, $data = array())
	{
		$this->view->create($view)->set($data)->render();
	}
	
}

?>