<?php

namespace Apps\Model;

class TrustyDB extends Base
{
	function gettrusty($userid)
	{
		$query = $this->db->table('trusty')->where('user_id',$userid);
		$row = $query->get();

		return $row;
	}

	function inserttrusty($data)
	{
		$this->db->table('trusty')->insert($data);
	}

	function deletetrusty($tid)
	{
		$this->db->table('trusty')->where('trusty_id',$tid)->delete();
	}

	function edittrusty($tid)
	{
		$query = $this->db->table('trusty')->where('trusty_id',$tid);
		$row = $query->get();

		return $row;
	}

	function saveedittrusty($data,$tid)
	{
		$this->db->table('trusty')->where('trusty_id',$tid)->update($data);
	}
}

?>