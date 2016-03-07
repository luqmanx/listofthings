<?php

namespace Apps\Controller;

class Main
{

	public function __construct($exe)
	{
		$this->exe = $exe;
		$this->view = $this->exe->view;

        $this->query = new \Apps\Model\QB($exe->config->get('db'));

        // set default data
        $this->view->setDefaultData(array(
			'exe' => $exe,
			'form' => $exe->form
			));

        $this->layout = $this->exe->view->create('layout/defaultmain');
        
	}

	public function index()
	{

		$data = array();
		$data['title'] = "Will - List";
		$data['exe'] = $this->exe;

        $data['assetUrl'] = $this->exe->url->asset();

		return $this->layout->set('view',$this->view->create('index')->set($data))->render();
		
		
	}

	public function register()
	{

		$username = $this->exe->request->post('username');
		$email = $this->exe->request->post('email');
		$password = md5($this->exe->request->post('password'));

		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'updated_at' => date("Y-m-d H:i:s")
			);

        $insertdata = $this->query->load('User');
        $validates = $insertdata->validate($data);

        if ($validates) 
        {

	    	$this->exe->flash->set('error_user','Username and email already exists. Please login to your account');
	    	$this->exe->flash->set('username' , $username);
	    	$this->exe->flash->set('email', $email);
	    	$this->exe->flash->set('password' , $this->exe->request->post('password'));
	    	$this->exe->flash->set('password2' , $this->exe->request->post('password2'));

			return $this->exe->redirect->to('@main.index');
        	
        }
        else
        {
        $newuserid = $insertdata->register($data);
        $getuser = $this->query->load('User');
        $user = $getuser->getuser($newuserid);

	        if($user)
	        {
	        	$this->exe->session->set('user.userid', $user->user_id);
	        	return $this->exe->redirect->to('@admin.default',['controller'=>'dashboard','action'=>'maininterface']);
	        }

	    }

	}

	public function signup()
	{
      return $this->exe->redirect->to('@main.index');
	}

	public function login()
	{
		$data = array();
		$data['title'] = "Sign In";
		$data['exe'] = $this->exe;

		$data['assetUrl'] = $this->exe->url->asset();

		return $this->layout->set('view',$this->view->create('login')->set($data))->render();

	}

	public function loginprocess()
	{
		$login_name = $this->exe->request->post('login_name');
		$login_password = md5($this->exe->request->post('login_password'));

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
				$this->exe->flash->set('login_password' , $this->exe->request->post('login_password'));
				return $this->exe->redirect->to('login');
		
		}
	}

	public function forgot()
	{
		$data = array();
		$data['title'] = "Forgot Password";
		$data['exe'] = $this->exe;

		$data['assetUrl'] = $this->exe->url->asset();
		
		return $this->layout->set('view',$this->view->create('forgot')->set($data))->render();
	}

	public function forgot_password()
	{
		$data = array();
		$data['exe'] = $this->exe;
		$data['title'] = 'Reset Link';

		$data['assetUrl'] = $this->exe->url->asset();

		$data['email_forgot'] = $this->exe->request->post('email_forgot');

		$getemail = $this->query->load('User');
		$user = $getemail->getemail($data['email_forgot']);

		if($user)
		{	
			$this->sendmail($user);
			return $this->layout->set('view',$this->view->create('forgot_password')->set($data))->render();
		}

		else
		{
			$this->exe->flash->set('error_email', 'Email not found. Please enter correct email.');
			$this->exe->flash->set('email_forgot_error',$data['email_forgot']);

			return $this->exe->redirect->to('forgot');
		}

		

	}

	function sendmail($data)
	{
		
		$exe = $this->exe;

		$base = $this->exe->url->base();

		$to = $data->user_email;
		$id = $data->user_id;
		$link = $base.'reset';
		
		$body = '<p>Click <a href="'.$link.'?uid='.$id.'">here </a>to reset password.</p>';

		$mail = new \PHPMailer;

		$mail->isSMTP();
		
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		$mail->Username = 'ifa@digitalgaia.com';
		$mail->Password = 'ifasazuani89';
		$mail->addAddress($to);
		$mail->Subject = 'Reset Link';
		$mail->msgHTML($body);


		$mail->From = 'ifa@digitalgaia.com';
       	$mail->FromName = 'Will-List';
       	$mail->AddReplyTo('iifasazuani@gmail.com');

		$mail->send();

	}

	function reset()
	{
		$data = array();
		$data['exe'] = $this->exe;
		$data['title'] = 'Reset Password';

		$data['assetUrl'] = $this->exe->url->asset();

		$data['user_id'] = $this->exe->request->get('uid');

		$email = $this->query->load('User');
		$useremail = $email->getuser($data['user_id']);

		if($useremail)
		{
			$this->exe->session->set('user.useremail',$useremail->user_email);
			return $this->layout->set('view',$this->view->create('reset')->set($data))->render();
		}

		$this->exe->session->destroy();

	}

	function reset_password()
	{
		$data = array();
		$data['exe'] = $this->exe;
		$data['assetUrl'] = $this->exe->url->asset();
		$data['title'] = 'Reset Password Success';
		$data['user_id'] = $this->exe->request->post('user_id');

		$new = array(
			'user_id' => $data['user_id'] ,
			'user_password' => md5($this->exe->request->post('new_password')),
			'updated_at' => date("Y-m-d H:i:s")
			);

		$reset_password = $this->query->load('User');
		$reset_password->reset_password($new);

		return $this->layout->set('view',$this->view->create('reset_password')->set($data))->render();

	}
	


}
?>