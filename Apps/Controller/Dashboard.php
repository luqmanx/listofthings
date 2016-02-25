<?php

namespace Apps\Controller;

class Dashboard extends BaseController
{
	public function maininterface(){

		return $this->render('Dashboard','maininterface', $data);
		

	}

	public function cash()
	{
		
		$getdatacash = $this->query->load('Cash');
		$getcash = $getdatacash->getcash($this->userid);

		if ($getcash) 
		{
			$data['cash'] = $getcash;
		}
		else
		{
			$data['cash'] = '';
		}

		return $this->render('My Cash','cash/cash',$data);
	}

	public function addnewcash()
	{

		return $this->render('My Cash','cash/addnew',$data);

	}

	public function savecash()
	{
       
            $data = array(
            	'userid' => $this->userid,
            	'account_type' => $this->exe->request->post('account_type'),
            	'bank_place' => $this->exe->request->post('bank_place'),
            	'account_no' => $this->exe->request->post('account_no'),
               	'balance' => $this->exe->request->post('balance'),
               	'name' => $this->exe->request->post('name'),
               	'phone' => $this->exe->request->post('phone'),
               	'email' => $this->exe->request->post('email'),
               	'next_email' => $this->exe->request->post('next_email')
            	);

            $savecashdata = $this->query->load('Cash');
            $new = $savecashdata->savecash($data);
            
            //insert new data to table wish
            $newcash = $this->query->load('Cash');
            $newcashdata = $newcash->newcash($new);

            foreach ($newcashdata as $newcashdata) 
        		{
        			$new = array(
             		'user_id' => $newcashdata->user_id,
				 	'asset_id' => '',
				 	'cash_id' => $newcashdata->cash_id,
				 	'wish_type' => $newcashdata->account_type,
					'wish_address' => $newcashdata->bank_place,
				 	'wish_acc' => $newcashdata->account_no
             	);

             	$savewish = $this->query->load('WishDB');
             	$savewish->savewishasset($new);
        		}
             
        	return $this->exe->redirect->to('default',['controller'=>'dashboard','action'=>'cash']);

	}	

	public function editcash()
	{

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

		$data['cashid'] = $cash_id;

		return $this->render('My Cash','cash/editcash',$data);


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