<?php

namespace Apps\Controller;


class Main
{

	public function __construct($exe)
	{
		$this->exe = $exe;
		$this->view = $this->exe->view;

		$this->exe->url->setBase('http://localhost/will-list');
        $this->exe->url->setAsset('http://localhost/will-list/assets');

        $this->query = new \Apps\Model\QB();


	}

	public function index()
	{

		$data = array();
		$data['title'] = "Will - List";
		$data['exe'] = $this->exe;

        $data['assetUrl'] = $this->exe->url->asset();

		return $this->view->create("index")->set($data)->render();
		
		
	}

	public function register()
	{

		$username = $this->exe->request->post('username');
		$email = $this->exe->request->post('email');
		$password = $this->exe->request->post('password');

		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $password
			);

        $insertdata = $this->query->load('User');
        $validates = $insertdata->validate($data);

        if ($validates) 
        {

        	foreach ($validates as $validate) {

            	$this->exe->flash->set('error_user','Username and email already exists. Please login to your account');
            	$this->exe->flash->set('username' , $username);
            	$this->exe->flash->set('email', $email);
            	$this->exe->flash->set('password' , $password);
            	return $this->exe->redirect->to('index');
        	  }
        	
        }
        else
        {
        $newuser = $insertdata->register($data);
        
        return $this->exe->redirect->to('@admin.default',['controller'=>'dashboard','action'=>'maininterface']);
    	}

	}

	public function signup()
	{
      $data = array();
      $data['title'] = "Sign Up Page";
      $data['exe'] = $this->exe;

      $data['assetUrl'] = $this->exe->url->asset();

      return $this->view->create("signup")->set($data)->render();
	}

	public function signupprocess()
	{

		$username = $this->exe->request->post('username_signup');
		$email = $this->exe->request->post('email_signup');
		$password = $this->exe->request->post('password_signup');

		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $password
			);
        
        $signupdata = $this->query->load('User');
        $validatesignupdatas = $signupdata->validate($data);
        
        if($validatesignupdatas)
		{
			foreach ($validatesignupdatas as $validatesignupdata) {
				$this->exe->flash->set('error_signup', 'Username and email already exists. Please login to your account');
				$this->exe->flash->set('signup_username' , $username);
				$this->exe->flash->set('signup_email', $email);
				$this->exe->flash->set('signup_password', $password);
				return $this->exe->redirect->to('signup');
			}
		}
		else
		{
        $signupdata->register($data);
		return $this->exe->redirect->to('@admin.default',['controller'=>'dashboard','action'=>'maininterface']);
	    }

	}

	public function logintemplate()
	{
		$data = array();
		$data['title'] = "Login Page";
		$data['exe'] = $this->exe;

		$data['assetUrl'] = $this->exe->url->asset();

		return $this->view->create('logintemplate')->set($data)->render();

	}

	public function loginprocess()
	{
		$login_name = $this->exe->request->post('login_name');
		$login_password = $this->exe->request->post('login_password');

		$data = array(
			'login_name' => $login_name,
			'login_password' => $login_password
			);

		$logindata = $this->query->load('User');
		$validatelogindatas = $logindata->validatelogin($data);

		if($validatelogindatas)
		{
			foreach ($validatelogindatas as $validatelogindata) 
			{
				$this->exe->session->set('user.userid', $validatelogindata->user_id);
				return $this->exe->redirect->to('@admin.default',['controller'=>'dashboard','action'=>'maininterface']);
			}
		}
		else
		{

				$this->exe->flash->set('error_login', 'Username and password is not match. Please enter correct username and password');	
				$this->exe->flash->set('login_username' , $login_name);	
				$this->exe->flash->set('login_password' , $login_password);
				return $this->exe->redirect->to('login');
		
		}
	}


}
?>