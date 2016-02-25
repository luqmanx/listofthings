<?php

namespace Apps\Controller;

class Wish extends BaseController
{
	public function mainwish()
	{

		$getdatawish = $this->query->load('WishDB');
		$getwishasset = $getdatawish->getwishasset($this->userid);

		if($getwishasset)
		{
			$data['wish'] = $getwishasset;
		}
		else
		{	
			$data['wish'] = '';

		}

		return $this->render('My Wish','wish/mainwish',$data);
	}

	function addwish()
	{
		return $this->render('My Wish','wish/addwish',$data);
	}

	public function savewish()
	{

		$data = array(
		'user_id' => $this->userid,
		'wish_type' => $this->exe->request->post('wish_type'),
		'wish_address' => $this->exe->request->post('wish_address'),
		'wish_acc' => $this->exe->request->post('wish_account_no'),
		'wish_dolist' => $this->exe->request->post('wish_dolist'),
		'wish_notify' => $this->exe->request->post('wish_notify')
		);

		$savewishasset = $this->query->load('WishDB');
		$savewishasset->savewishasset($data);

		return $this->exe->redirect->to('default',['controller'=>'wish','action' => 'mainwish']);
		
	}

	public function editwish()
	{
	
		$data['title'] = 'Edit Wish';

		$wish_id = $this->exe->request->get('wid');

		$getwishperid = $this->query->load('WishDB');
		$getwish = $getwishperid->getwishperid($wish_id);

		if($getwish)
		{
			$data['wish'] = $getwish;
		}
		else
		{
			$data['wish'] = '';
		}

		$data['wishid'] = $wish_id;

		return $this->render('My Wish','wish/editwish',$data);
	}

	public function updatewish()
	{
		$wish_id = $this->exe->request->post('wid');
		$wish_type = $this->exe->request->post('wish_type');
		$wish_address = $this->exe->request->post('wish_address');
		$wish_acc = $this->exe->request->post('wish_acc');
		$wish_dolist = $this->exe->request->post('wish_dolist');
		$wish_notify = $this->exe->request->post('wish_notify');

		$wish = array(
			'wish_type' => $wish_type,
			'wish_address' => $wish_address,
			'wish_acc' => $wish_acc,
			'wish_dolist' => $wish_dolist,
			'wish_notify' => $wish_notify
			);

		$updatewish = $this->query->load('WishDB');
		$updatewish->updatewish($wish,$wish_id);

		return $this->exe->redirect->to('default',['controller' => 'wish', 'action'=> 'mainwish']);


	}


}

?>