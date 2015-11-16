<?php

namespace Apps\Controller;

class Wish extends BaseController
{
	public function mainwish()
	{
		$data = array();
		$data['exe'] = $this->exe;

		$userid = $this->exe->session->get('user.userid');
		$getdatauser = $this->query->load('User');
		$getuser = $getdatauser->getuser($userid);

		if($getuser)
		{
			$data['name'] = $getuser->user_name;
		}
		else
		{
			$data['name'] = 'Anonymous';
		}

		$getdatawish = $this->query->load('WishDB');
		$getwishasset = $getdatawish->getwishasset($userid);

		if($getwishasset)
		{
			$data['wish'] = $getwishasset;
		}
		else
		{	
			$data['wish'] = '';

		}


		$data['assetUrl'] = $this->exe->url->asset();

		$this->layout->set($data);
		$this->layout->set("view",$this->view->create('wish/mainwish')->set($data));
		return $this->layout->render();
	}

	public function savewish()
	{
		
		$userid = $this->exe->session->get('user.userid');


			$asset = $this->exe->request->post('asset');
			
			if($asset)
			{
	
				foreach ($asset as $wishid => $valuewish) 
				{
				  foreach ($valuewish as $key => $value) {
				  	switch ($key) 
				  	{
				  	case '0':
				  		$wish_dolist = $value;
				  	break;
				  	case '1':
				  		$wish_notify = $value;
				  	break;
				 	 }

				 	 $data = array(
					'user_id' => $userid,
				  	'wish_id' => $wishid,
				  	'wish_dolist' => $wish_dolist,
				  	'wish_notify' => $wish_notify
				  	);

					$savewishassetupdate = $this->query->load('WishDB');
					$savewishassetupdate->updatewishasset($data);

				  }
				  
				 
				}


				
			}


		return $this->exe->redirect->to('default',['controller'=>'wish','action' => 'mainwish']);
		
	}

	public function editwish()
	{
		$data = array();
		$data['exe'] = $this->exe;

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

		$data['assetUrl'] = $this->exe->url->asset();
		$data['wishid'] = $wish_id;

		return $this->render('wish/editwish',$data);
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