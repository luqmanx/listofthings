<?php

namespace Apps\Model;


class User
{
  
  public function __construct($db)
  {

    $this->db = $db;
  }
  
  public function validate($data)
  {
    $user_name = $data['username'];

    $query = $this->db->table('user')->where('user_name' , 'LIKE' , $user_name)->orWhere('user_email' , 'LIKE', $data['email']);

    $row = $query->get();

    return $row;

  }

  public function register($data)
  {
    $register = array(
    	'user_name' => $data['username'],
    	'user_email' => $data['email'],
    	'user_password' => $data['password'],
      'updated_at' => $data['updated_at']
    	);

     $query = $this->db->table('user')->insert($register);

     return $query;
  }

  public function validatelogin($data)
  {
    $login_name = $data['login_name'];
    $login_password = $data['login_password'];

    $query = $this->db->table('user')->where('user_name' , '=' , $login_name)->where('user_password', '=' , $login_password);

    $row = $query->get();

    return $row;
  }

  public function getuser($userid)
  {
    $query = $this->db->table('user')->where('user_id','=',$userid);

    $row = $query->first();

    return $row;
  }

  function getemail($email)
  {
    $query = $this->db->table('user')->where('user_email',$email);

    $row = $query->first();

    return $row;
  }

  function reset_password($data)
  {
    $this->db->table('user')->where('user_id',$data['user_id'])->update($data);
  }
	
}