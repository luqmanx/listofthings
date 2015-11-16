<?php

namespace Apps\Controller;

class Dashboard extends BaseController
{
	public function maininterface(){

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

		$data['assetUrl'] = $this->exe->url->asset();

		return $this->render('maininterface',$data);
		

	}

	public function cash()
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

		$getdatacash = $this->query->load('Cash');
		$getcash = $getdatacash->getcash($userid);

		if ($getcash) 
		{
			$data['cash'] = $getcash;
		}
		else
		{
			$data['cash'] = '';
		}

		$data['assetUrl'] = $this->exe->url->asset();

		$this->layout->set($data);
		$this->layout->set("view",$this->view->create('cash/cash')->set($data));
		return $this->layout->render();
	}

	public function savecash()
	{
		$userid = $this->exe->session->get('user.userid');
       

        for ($i=0; $i < 10 ; $i++) { 
        	
        	$cash = $this->exe->request->post('cash'.$i);
           
            
            if($cash){
        	foreach ($cash as $no => $value) 
        	{
        		switch ($no) 
        		{
        			case '0':
        				$account_type = $value;
        			break;

        			case '1':
        				$bank_place = $value;

        			break;

        			case '2':
        				$account_no = $value;
        			break;

        			case '3':
        				$balance = $value;
        			break;

        			case '4':
        				$name = $value;
        			break;

        			case '5':
        				$phone = $value;
        			break;

        			case '6':
        				$email = $value;
        			break;
        			
        			case '7';
        				$next_email = $value;
        			break;
        		}


        		
        	}

        	$data = array(
               	'userid' => $userid,
               	 'account_type' => $account_type,
               	 'bank_place' => $bank_place,
               	 'account_no' => $account_no,
               	 'balance' => $balance,
               	 'name' => $name,
               	 'phone' => $phone,
               	 'email' => $email,
               	 'next_email' => $next_email
               	);
              
               
               $savecashdata = $this->query->load('Cash');
               $savecashdata->savecash($data);

            }
            
        }  

        	$getcashdata = $this->query->load('Cash');
        	$getcash = $getcashdata->getcash($userid);

        	if($getcash)
        	{
        		foreach ($getcash as $getcash) 
        		{
        			$new = array(
             		'user_id' => $getcash->user_id,
				 	'asset_id' => '',
				 	'cash_id' => $getcash->cash_id,
				 	'wish_type' => $getcash->account_type,
					'wish_address' => $getcash->bank_place,
				 	'wish_acc' => $getcash->account_no
             	);

             	$savewish = $this->query->load('WishDB');
             	$savewish->savewishasset($new);
        		}
        	}
             
        	return $this->exe->redirect->to('default',['controller'=>'dashboard','action'=>'cash']);

        

	}	

	public function editcash()
	{
		$data = array();
		$data['exe'] = $this->exe;

		$data['title'] = 'Edit Cash';

		$cash_id = $this->exe->request->get('cid');

		$geteditcashdata = $this->query->load('Cash');
		$getedit = $geteditcashdata->editcash($cash_id);

		if($getedit)
		{
			$data['cashdata'] = $getedit;
		}
		else
		{
			$data['cashdata'] = '';
		}

		$data['assetUrl'] = $this->exe->url->asset();
		$data['cashid'] = $cash_id;

		return $this->render('cash/editcash',$data);


	}

	public function saveeditcash()
	{
		$cash_id = $this->exe->request->post('cid');
		$account_type = $this->exe->request->post('acc_type');
		$bank_place = $this->exe->request->post('bank_place');
		$acc_no = $this->exe->request->post('acc_no');
		$balance = $this->exe->request->post('bal');
		$name = $this->exe->request->post('name');
		$phone = $this->exe->request->post('phone');
		$email = $this->exe->request->post('email');
		$next_email = $this->exe->request->post('next_email');

		$data = array(
			'account_type' => $account_type,
			'bank_place' => $bank_place,
			'account_no' => $acc_no,
			'balance' => $balance,
			'name' => $name,
			'phone' => $phone,
			'email' => $email,
			'next_email' => $next_email
			);

		$saveedit = $this->query->load('Cash');
		$saveedit->saveeditcash($data, $cash_id);

		return $this->exe->redirect->to('default',['controller'=>'dashboard','action'=>'cash']);

	}

	public function deletecash()
	{
		$cash_id = $this->exe->request->get('cid');

		$delcashdata = $this->query->load('Cash');
		$delcashdata->deletecash($cash_id);

		return $this->exe->redirect->to('default',['controller'=>'dashboard','action'=>'cash']);

	}

	public function signout()
	{
		$this->exe->session->destroy('user');

		return $this->exe->redirect->to('@main.index');
	}
}
?>