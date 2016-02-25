<?php

namespace Apps\Model;

class AssetDB extends Base
{

	public function getasset($userid)
	{
		$query = $this->db->table('asset')->join('asset_finance','asset_finance.asset_id','=','asset.asset_id')->where('user_id',$userid);
		$row = $query->get();

		return $row;
	}

  function getnewasset($asset_id)
  {
    $query = $this->db->table('asset')->where('asset.asset_id',$asset_id);
    $row = $query->get();

    return $row;
  }

  function acc_no($asset_id)
  {
    $query = $this->db->table('asset_finance')->where('asset_id',$asset_id);
    $row = $query->first();

    return $row;
  }
	public function saveasset($data,$legal,$financeasset,$transaction)
	{
		$query = $this->db->table('asset')->insert($data);

		$asset_id = $query;

        if($financeasset)
        {
        	$financeasset['asset_id'] = $asset_id;
			    $this->db->table('asset_finance')->insert($financeasset); 
        }
		
        if($legal)
        {
        	$legal['asset_id'] = $asset_id;
       		$this->db->table('asset_legal')->insert($legal);
        }
       	
        if($transaction)
        {
        	$transaction['asset_id'] = $asset_id;
       		$this->db->table('asset_transaction')->insert($transaction);
        }
       	
      return $asset_id;

	}

  function getviewasset($userid)
  {
    $query = $this->db->table('asset')->where('user_id',$userid);
    $row = $query->get();

    return $row;
  }

  function editasset($aid)
  {
    $query = $this->db->table('asset')->where('asset_id',$aid);
    $row = $query->get();

    return $row;
  }

  function assetfinance($aid)
  {
    $query = $this->db->table('asset_finance')->where('asset_id',$aid);
    $row = $query->get();

    return $row;
  }

  function assetlegal($aid)
  {
        $query = $this->db->table('asset_legal')->where('asset_id',$aid);
        $row = $query->get();

        return $row;
  }

  function assettrans($aid)
  {
        $query = $this->db->table('asset_transaction')->where('asset_id',$aid);
        $row = $query->get();

        return $row;
  }

  function deleteasset($aid)
  {
    $this->db->table('asset')->where('asset_id',$aid)->delete();
    $this->db->table('asset_finance')->where('asset_id',$aid)->delete();
    $this->db->table('asset_legal')->where('asset_id',$aid)->delete();
    $this->db->table('asset_transaction')->where('asset_id',$aid)->delete();
  }

  function editdata($main,$aid)
  {
    $this->db->table('asset')->where('asset_id',$aid)->update($main);
  }

  function saveeditfinanceasset($financeasset,$aid)
  {
    $this->db->table('asset_finance')->where('asset_id',$aid)->update($financeasset);
  }

  function editlegal($legal,$aid)
  {
    $this->db->table('asset_legal')->where('asset_id',$aid)->update($legal);
  }

  function edittrans($trans,$aid)
  {
    $this->db->table('asset_transaction')->where('asset_id',$aid)->update($trans);
  }

}

?>