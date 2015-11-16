<?php

namespace Apps\Controller;

class Trusty extends BaseController
{
	function addtrusty()
	{
		$data = array();
		$data['exe'] = $this->exe;

		$userid = $this->exe->session->get('user.userid');
		$getuser = $this->query->load('User');

		$user = $getuser->getuser($userid);

		if($user)
		{
			$data['name'] = $user->user_name;
		}
		else
		{
			$data['name'] = 'Anonymous';
		}

		$gettrusty = $this->query->load('TrustyDB');
		$trusty = $gettrusty->gettrusty($userid);

		if($trusty)
		{
			$data['trusty'] = $trusty;
			$data['trusty2'] = $trusty;
		}
		else
		{
			$data['trusty'] = '';
			$data['trusty2'] = '';
		}

		$data['assetUrl'] = $this->exe->url->asset();

		return $this->render('trusty/addtrusty',$data);

	}

	function savetrusty()
	{	
		$data = array();

		$data['user_id'] = $this->exe->session->get('user.userid');
		$data['trusty_name'] = $this->exe->request->post('trusty_name');
		$data['trusty_phone'] = $this->exe->request->post('trusty_phone');
		$data['trusty_email'] = $this->exe->request->post('trusty_email');
		$data['trusty_address'] = $this->exe->request->post('trusty_address');

		$inserttrusty = $this->query->load('TrustyDB');

		$inserttrusty->inserttrusty($data);

		return $this->exe->redirect->to('default',['controller'=>'trusty','action'=>'addtrusty']);
	}

	function deletetrusty()
	{
		$data = array();
		$data['exe'] = $this->exe;

		$tid = $this->exe->request->get('tid');

		$deletetrusty = $this->query->load('TrustyDB');
		$deletetrusty->deletetrusty($tid);

		return $this->exe->redirect->to('default',['controller'=>'trusty','action'=>'addtrusty']);
	}

	function edittrusty()
	{
		$data = array();
		$data['exe'] = $this->exe;

		$tid = $this->exe->request->get('tid');

		$edittrusty = $this->query->load('TrustyDB');
		$edittrustydata = $edittrusty->edittrusty($tid);

		if($edittrustydata)
		{
			$data['edittrusty'] = $edittrustydata;
		}
		else
		{
			$data['edittrusty'] = '';
		}

		$data['title'] = 'Edit trusty Data';
		$data['trusty_id'] = $tid;
		$data['assetUrl'] = $this->exe->url->asset();

		return $this->render('trusty/edittrusty',$data);
	}

	function saveedittrusty()
	{

		$tid = $this->exe->request->post('tid');

		$trusty_name = $this->exe->request->post('trusty_name');
		$trusty_phone = $this->exe->request->post('trusty_phone');
		$trusty_email = $this->exe->request->post('trusty_email');
		$trusty_address = $this->exe->request->post('trusty_address');
		$date_updated = $this->exe->request->post('updated_date');

		$data = array(
			'trusty_name' =>$trusty_name,
			'trusty_phone' => $trusty_phone,
			'trusty_email' => $trusty_email,
			'trusty_address' => $trusty_address,
			'date_updated' => $date_updated
			);

		$saveedittrusty = $this->query->load('TrustyDB');
		$saveedittrusty->saveedittrusty($data,$tid);

		return $this->exe->redirect->to('default',['controller'=>'trusty','action'=>'addtrusty']);

	}
}

?>