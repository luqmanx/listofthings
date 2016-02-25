<?php

namespace Apps\Model;


class QB
{

	public function __construct(array $config)
	{
		$this->config = array(
			'driver' => 'mysql',
			'host'  => 'localhost',
			'database' => $config['database'],
			'username' => $config['username'],
			'password' => $config['password'],
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci'
			);

		$connection = new \Pixie\Connection('mysql', $this->config);
		$this->db = new \Pixie\QueryBuilder\QueryBuilderHandler($connection);
	}
	
	public function load($model)
	{
		$model = str_replace('/', '\\', $model);
		$model = '\Apps\Model\\'.$model;
         
		return new $model($this->db);
	}

}

			

?>