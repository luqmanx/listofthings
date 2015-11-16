<?php

namespace Apps\Model;

class WishDB extends Base
{
	public function savewishasset($data)
	{
		$this->db->table('wish')->insert($data);
	}

	public function getwishasset($userid)
	{
		$query = $this->db->table('wish')->where('wish.user_id',$userid);

		$row = $query->get();

		return $row;
	}

	public function updatewishasset($data)
	{
		$this->db->table('wish')->where('wish_id',$data['wish_id'])->update($data);
	}

	public function getwishperid($wish_id)
	{
		$query = $this->db->table('wish')->where('wish_id',$wish_id);

		$row = $query->get();

		return $row;
	}

	function updatewish($wish,$wid)
	{
		$this->db->table('wish')->where('wish_id',$wid)->update($wish);
	}
}

?>