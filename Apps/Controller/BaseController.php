<?php

namespace Apps\Controller;

class BaseController
{
	public function __construct($exe)
	{
		$this->query = new \Apps\Model\QB($exe->config->get('db'));

		// get user data.
		$userid = $exe->session->get('user.userid');
		$this->user = $this->query->load('User')->getuser($userid);

		// set base property like exe, view builder 
		$this->exe = $exe;
		$this->view = $this->exe->view;
		$this->userid = $exe->session->get('user.userid');

		// set default data
		$this->view->setDefaultData(array(
			'exe' => $exe,
			'form' => $exe->form
			));

		// create layout
		$this->layout = $this->exe->view->create('layout/default');

		// set layout data.
		$this->layout->set('user', $this->user);
	}

	public function render($title,$view, $data = array())
	{
		return $this->layout->set('title',$title)->set('view', $this->view->create($view)->set($data))->render();
	}
	
}

?>