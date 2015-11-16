<?php

namespace Apps\Model;

class Cash extends Base
{
	public function savecash($data)
	{
    
      
  $new = array(
    'user_id' => $data['userid'],
    'account_type' => $data['account_type'],
    'bank_place' => $data['bank_place'],
    'account_no' => $data['account_no'],
    'balance' => $data['balance'],
    'name' => $data['name'],
    'phone' => $data['phone'],
    'email' => $data['email'],
    'next_email' => $data['next_email']
    );

    $this->db->table('cash')->insert($new);
       
	}

  public function getcash($userid)
  {
    $query = $this->db->table('cash')->where('user_id','=', $userid);

    $row = $query->get();

    return $row;
  }

  public function editcash($cash_id)
  {
    $query = $this->db->table('cash')->where('cash_id','=', $cash_id);

    $row = $query->get();

    return $row;
  }

  public function saveeditcash($data, $cash_id)
  {
    $this->db->table('cash')->where('cash_id',$cash_id)->update($data);
  }

  public function deletecash($cash_id)
  {
    $this->db->table('Cash')->where('cash_id', '=', $cash_id)->delete();
  }


	
}