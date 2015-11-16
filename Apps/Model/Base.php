<?php

namespace Apps\Model;

class Base

{
	public function __construct($db)
	{
		$this->db = $db;
	}
}

?>