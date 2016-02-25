<?php

namespace Apps\Controller;

class Asset extends BaseController
{
	function addasset()
	{
		return $this->render('My Asset','asset/addasset',$data);
	}

	public function saveasset()
	{
        $data['user_id'] = $this->userid;
		$data['type'] = $this->exe->request->post('asset_type');
		$data['address'] = $this->exe->request->post('asset_address');
		$data['developer'] = $this->exe->request->post('asset_dev');

		$status = serialize($this->exe->request->post('status'));
		$data['status'] = $status;

		$financing = serialize($this->exe->request->post('financing'));
		$data['financing'] = $financing;

		$data['notes'] = $this->exe->request->post('notes');

		//legal information - asset_legal
		$sp_name = $this->exe->request->post('sp_name');
		$sp_phone = $this->exe->request->post('sp_phone');
		$sp_email = $this->exe->request->post('sp_email');
		$finance_name = $this->exe->request->post('finance_name');
		$finance_phone = $this->exe->request->post('finance_phone');
		$finance_email = $this->exe->request->post('finance_email');
        
        if(($sp_name || $sp_phone || $sp_email ||$finance_name ||$finance_phone ||$finance_email)!= '')
        {
        	$legal = array(
        		'sp_name' => $sp_name,
        		'sp_phone' => $sp_phone,
        		'sp_email' => $sp_email,
        		'finance_name' => $finance_name,
        		'finance_phone' => $finance_phone,
        		'finance_email' => $finance_email
        		);

        }
        else
        {
        	$legal = '';
        }
		
		//asset_finance
		$bank = $this->exe->request->post('bank');
		$acc_no = $this->exe->request->post('acc_no');
		$monthly_payment = $this->exe->request->post('monthly_payment');
		$MRTA = $this->exe->request->post('MRTA');
		$loan_amount = $this->exe->request->post('loan_amount');
		$doc_path = $this->exe->request->post('doc_path');
        
        $financeinfo = unserialize($data['financing']);

        if(in_array('yes', $financeinfo))
        {
        	$financeasset = array(
        		'bank' => $bank,
        		'acc_no' => $acc_no,
        		'monthly_payment' => $monthly_payment,
        		'MRTA' => $MRTA,
        		'loan_amount' => $loan_amount,
        		'doc_path' => $doc_path
        		);

        }
        else
        {
        	$financeasset = '';
        }

        //asset_transaction
        $buyer_seller = $this->exe->request->post('buysellname');
        $buyer_seller_contact = $this->exe->request->post('buysellcont');
        $lawyer = $this->exe->request->post('lawyername');
        $lawyer_contact = $this->exe->request->post('lawyercont');
        $price = $this->exe->request->post('price');
        $status = $this->exe->request->post('statusfin');

        if(($buyer_seller || $buyer_seller_contact || $lawyer ||$lawyer_contact ||$price ||$status)!= '')
        {
        	$transaction = array(
        		'buyer_seller' => $buyer_seller,
        		'buyer_seller_contact' => $buyer_seller_contact,
        		'lawyer' => $lawyer,
        		'lawyer_contact' => $lawyer_contact,
        		'price' => $price,
        		'status' => $status
        		);
        }
        else
        {
        	$transaction = '';
        }

        //save all asset data
		$saveassetdata = $this->query->load('AssetDB');
		$newasset = $saveassetdata->saveasset($data,$legal,$financeasset,$transaction);
		
		//get latest asset data insert
		$getnewasset = $this->query->load('AssetDB');
		$getasset = $getnewasset->getnewasset($newasset);

		foreach ($getasset as $getasset) 
			{
				$financing = unserialize($getasset->financing);

				$newwish = array(
					'user_id' => $getasset->user_id,
				  	'asset_id' => $getasset->asset_id,
				  	'cash_id' => '',
				  	'wish_type' => $getasset->type,
				  	'wish_address' => $getasset->address
				);
				
				if(in_array('yes', $financing))
				{
					$acc_no = $this->query->load('AssetDB');
					$getacc_no = $acc_no->acc_no($getasset->asset_id);

					$newwish['wish_acc'] = $getacc_no->acc_no;
				}
				else
				{
					$newwish['wish_acc'] = '';
				}

				//insert to wish table
				$savewishasset = $this->query->load('WishDB');
				$savewishasset->savewishasset($newwish);
			}

			
		return $this->exe->redirect->to('default',['controller'=>'asset','action' => 'viewasset']);

	}

	function viewasset()
	{
		$getviewasset = $this->query->load('AssetDB');
		$getview = $getviewasset->getviewasset($this->userid);

		if($getview)
		{
			$data['viewasset'] = $getview;
		}
		else
		{
			$data['viewasset'] = '';
		}

		return $this->render('My Asset','asset/viewasset',$data);
	}

	function editasset()
	{
		
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

		return $this->render('My Asset','asset/editasset',$data);
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

		$aid = $this->exe->request->get('aid');

		$deleteasset = $this->query->load('AssetDB');
		$deleteasset->deleteasset($aid);

		return $this->exe->redirect->to('default',['controller'=>'asset','action' => 'addasset']);


	}
}

?>