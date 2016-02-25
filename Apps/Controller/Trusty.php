<?php

namespace Apps\Controller;

class Trusty extends BaseController
{
	function assigntrusty()
	{
		$data['title'] = 'Assign Trusty';
		$gettrusty = $this->query->load('TrustyDB');
		$trusty = $gettrusty->gettrusty($this->userid);

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

		return $this->render('Assign Trusty','trusty/assigntrusty',$data);

	}

	function addtrusty()
	{
		$data['title'] = 'Add New Trusty';
		return $this->render('Assign Trusty','trusty/addtrusty',$data);
	}

	function savetrusty()
	{	
		
		$data['user_id'] = $this->userid;
		$data['trusty_name'] = $this->exe->request->post('trusty_name');
		$data['trusty_phone'] = $this->exe->request->post('trusty_phone');
		$data['trusty_email'] = $this->exe->request->post('trusty_email');
		$data['trusty_address'] = $this->exe->request->post('trusty_address');
		$data['date_updated'] = date("Y-m-d H:i:s");

		$inserttrusty = $this->query->load('TrustyDB');

		$inserttrusty->inserttrusty($data);

		return $this->exe->redirect->to('default',['controller'=>'trusty','action'=>'assigntrusty']);
	}

	function deletetrusty()
	{

		$tid = $this->exe->request->get('tid');

		$deletetrusty = $this->query->load('TrustyDB');
		$deletetrusty->deletetrusty($tid);

		return $this->exe->redirect->to('default',['controller'=>'trusty','action'=>'assigntrusty']);
	}

	function edittrusty()
	{

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

		$data['title'] = 'Edit trusty';
		$data['trusty_id'] = $tid;

		return $this->render('Assign Trusty','trusty/edittrusty',$data);
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

		return $this->exe->redirect->to('default',['controller'=>'trusty','action'=>'assigntrusty']);

	}
}

?>