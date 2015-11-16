<?php

namespace Apps\Controller;

class Asset extends BaseController
{

	public function mainasset()
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

		$data['assetUrl'] = $this->exe->url->asset();

		return $this->render('asset/mainasset',$data);
	}

	public function saveasset()
	{
		$data = array();

		$data['user_id'] = $this->exe->session->get('user.userid');
		$data['type'] = $this->exe->request->post('asset_type');
		$data['address'] = $this->exe->request->post('asset_address');
		$data['developer'] = $this->exe->request->post('asset_dev');

		$status = serialize($this->exe->request->post('status'));
		$data['status'] = $status;

		$financing = serialize($this->exe->request->post('financing'));
		$data['financing'] = $financing;

		$data['notes'] = $this->exe->request->post('notes');

		$legal = array();

		if($this->exe->request->post('sp_name'))
		{
			$legal['sp_name'] = $this->exe->request->post('sp_name');
		}
		if ($this->exe->request->post('sp_phone')) 
		{
			$legal['sp_phone'] = $this->exe->request->post('sp_phone');
		}
		if($this->exe->request->post('sp_email'))
		{
			$legal['sp_email'] = $this->exe->request->post('sp_email');
		}
		if($this->exe->request->post('finance_name'))
		{
			$legal['finance_name'] = $this->exe->request->post('finance_name');
		}
		if($this->exe->request->post('finance_phone'))
		{
			$legal['finance_phone'] = $this->exe->request->post('finance_phone');
		}
		if ($this->exe->request->post('finance_email')) {
			$legal['finance_email'] = $this->exe->request->post('finance_email');
		}
	

		$financeasset = array();

		if($this->exe->request->post('bank'))
		{
			$financeasset['bank'] = $this->exe->request->post('bank');
		}
		if($this->exe->request->post('acc_no'))
		{
			$financeasset['acc_no'] = $this->exe->request->post('acc_no');
		}
		if($this->exe->request->post('monthly_payment'))
		{
			$financeasset['monthly_payment'] = $this->exe->request->post('monthly_payment');
		}
		if($this->exe->request->post('MRTA'))
		{
			$financeasset['MRTA'] = $this->exe->request->post('MRTA');
		}
		if ($this->exe->request->post('loan_amount')) 
		{

			$financeasset['loan_amount'] = $this->exe->request->post('loan_amount');
		}
		if($this->exe->request->post('doc_path'))
		{
			$financeasset['doc_path'] = $this->exe->request->post('doc_path');
		}
		

		$transaction = array();

		$transaction['buyer_seller'] = $this->exe->request->post('buysellname');
		$transaction['buyer_seller_contact'] = $this->exe->request->post('buysellcont');
		$transaction['lawyer'] = $this->exe->request->post('lawyername');
		$transaction['lawyer_contact'] = $this->exe->request->post('lawyercont');
		$transaction['price'] = $this->exe->request->post('price');
		$transaction['status'] = $this->exe->request->post('statusfin');

		$saveassetdata = $this->query->load('AssetDB');
		$saveassetdata->saveasset($data,$legal,$financeasset,$transaction);

		
		$getassetdata = $this->query->load('AssetDB');
		$getasset = $getassetdata->getasset($data['user_id']);

		if($getasset)
		{   
			foreach ($getasset as $getasset) 
			{
				$newwish = array(
					'user_id' => $getasset->user_id,
				  	'asset_id' => $getasset->asset_id,
				  	'cash_id' => '',
				  	'wish_type' => $getasset->type,
				  	'wish_address' => $getasset->address,
				  	'wish_acc' => $getasset->acc_no
			);
			$savewishasset = $this->query->load('WishDB');
			$savewishasset->savewishasset($newwish);
			}
			
		}

		return $this->exe->redirect->to('default',['controller'=>'asset','action' => 'mainasset']);

	}

	function viewasset()
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

		$getviewasset = $this->query->load('AssetDB');
		$getview = $getviewasset->getviewasset($userid);

		if($getview)
		{
			$data['viewasset'] = $getview;
		}
		else
		{
			$data['viewasset'] = '';
		}

		$data['assetUrl'] = $this->exe->url->asset();

		$this->layout->set($data);
		$this->layout->set("view",$this->view->create('asset/viewasset')->set($data));
		return $this->layout->render();
	}

	function editasset()
	{
		$data = array();
		$data['exe'] = $this->exe;

		$userid = $this->exe->session->get('user.userid');
		
		$aid = $this->exe->request->get('aid');

		$edit = $this->query->load('AssetDB');
		$editasset = $edit->editasset($aid);

		if($editasset)
		{
			$data['asset'] = $editasset;
		}
		else
		{
			$data['asset'] = '';
		}

		$assetfinance = $this->query->load('AssetDB');
		$finance = $assetfinance->assetfinance($aid);

		if($finance)
		{
			$data['finance'] = $finance;
		}
		else
		{
			$data['finance'] = '';
		}

		$assetlegal = $this->query->load('AssetDB');
		$legal = $assetlegal->assetlegal($aid);

		if($legal)
		{
			$data['legal'] = $legal;
		}
		else
		{
			$data['legal'] = '';
		}

		$assettrans = $this->query->load('AssetDB');
		$transaction = $assettrans->assettrans($aid);

		if($transaction)
		{
			$data['transaction'] = $transaction;
		}
		else
		{
			$data['transaction'] = '';
		}

		$data['assetUrl'] = $this->exe->url->asset();
		$data['title'] = 'Edit Asset Data';
		$data['aid'] = $aid;

		return $this->render('asset/editasset',$data);
	}

	function saveeditasset()
	{

		$aid = $this->exe->request->post('aid');
		
		$type = $this->exe->request->post('type');
		$address = $this->exe->request->post('address');
		$developer = $this->exe->request->post('developer');
		$status = serialize($this->exe->request->post('status'));
		$financing = serialize($this->exe->request->post('financing'));
		$notes = $this->exe->request->post('notes');

		$main = array(
			'type' =>$type,
			'address' => $address,
			'developer' => $developer,
			'status' => $status,
			'financing' => $financing,
			'notes' => $notes
			);

		$editdata = $this->query->load('AssetDB');
		$editdata->editdata($main,$aid);

		$bank = $this->exe->request->post('bank');
		$monthly_payment = $this->exe->request->post('monthly_payment');
		$acc_no = $this->exe->request->post('acc_no');
		$MRTA = $this->exe->request->post('MRTA');
		$loan_amount = $this->exe->request->post('loan_amount');
		
		$file = $_FILES['doc_path']['name'];

		$target = 'C:\xampp\htdocs\will-list\assets\image';
		$filetarget = $target.'/'.$file;
		$tempfile = $_FILES['doc_path']['tmp_name'];
		
		$result = move_uploaded_file($tempfile, $filetarget);
		
		$doc_path = $file;

		$financeasset = array(
			'bank' => $bank,
			'monthly_payment' => $monthly_payment,
			'acc_no' => $acc_no,
			'MRTA' => $MRTA,
			'loan_amount' => $loan_amount,
			'doc_path' => $doc_path
			);

		$saveeditfinanceasset = $this->query->load('AssetDB');
		$saveeditfinanceasset->saveeditfinanceasset($financeasset,$aid);

		$sp_name = $this->exe->request->post('sp_name');
		$sp_phone = $this->exe->request->post('sp_phone');
		$sp_email = $this->exe->request->post('sp_email');
		$finance_name = $this->exe->request->post('finance_name');
		$finance_phone = $this->exe->request->post('finance_phone');
		$finance_email = $this->exe->request->post('finance_email');

		$legal = array(
			'sp_name' => $sp_name,
			'sp_phone' => $sp_phone,
			'sp_email' => $sp_email,
			'finance_name' => $finance_name,
			'finance_phone' => $finance_phone,
			'finance_email' => $finance_email
			);

		$editlegal = $this->query->load('AssetDB');
		$editlegal->editlegal($legal,$aid);

		$buyer_seller = $this->exe->request->post('buyer_seller');
		$buyer_seller_contact = $this->exe->request->post('buyer_seller_contact');
		$lawyer = $this->exe->request->post('lawyer');
		$lawyer_contact = $this->exe->request->post('lawyer_contact');
		$price = $this->exe->request->post('price');
		$status_trans = $this->exe->request->post('status_trans');

		$trans = array(
			'buyer_seller' => $buyer_seller,
			'buyer_seller_contact' => $buyer_seller_contact,
			'lawyer' => $lawyer,
			'lawyer_contact' => $lawyer_contact,
			'price' => $price,
			'status' => $status_trans
			);

		$edittrans = $this->query->load('AssetDB');
		$edittrans->edittrans($trans,$aid);

		return $this->exe->redirect->to('default',['controller'=>'asset','action' => 'viewasset']);

	}

	function deleteasset()
	{
		$data = array();
		$data['exe'] = $this->exe;

		$aid = $this->exe->request->get('aid');

		$deleteasset = $this->query->load('AssetDB');
		$deleteasset->deleteasset($aid);

		return $this->exe->redirect->to('default',['controller'=>'asset','action' => 'mainasset']);


	}
}

?>