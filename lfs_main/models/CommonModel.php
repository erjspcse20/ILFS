<?php
class CommonModel extends CI_Model
{
	public function create($Qry)
	{
		$this->db->trans_start();
		$this->db->query($Qry);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		        // generate an error... or use the log_message() function to log your error
		}
		else
		{
			return 1;
		}
	}
    public function createmultiquery($Qry)
    {
        $this->db->trans_start();
        for($i=0;$i<count($Qry);$i++)
        {
            $this->db->query($Qry[$i]);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return 0;
            // generate an error... or use the log_message() function to log your error
        }
        else
        {
            return 1;
        }
    }
	public function createprepare($Qry,$arr)
	{
		$this->db->trans_start();
		//$this->db->query($Qry, $arr);
        for($i=0;$i<count($Qry);$i++)
        {
            $this->db->query($Qry[$i], $arr);
        }
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		        // generate an error... or use the log_messae() function to log your error
		}
		else
		{
			return 1;
		}
	}
    public function createpreparemul($Qry,$arr)
    {
        $this->db->trans_start();
        //$this->db->query($Qry, $arr);
        for($i=0;$i<count($Qry);$i++)
        {
            $this->db->query($Qry[$i], $arr[$i]);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return 0;
            // generate an error... or use the log_messae() function to log your error
        }
        else
        {
            return 1;
        }
    }
    public function createpreparesingle($Qry,$arr)
    {
        $this->db->trans_start();
        //$this->db->query($Qry, $arr);
        /*for($i=0;$i<count($Qry);$i++)
        {*/
            $this->db->query($Qry, $arr);
        //}
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return 0;
            // generate an error... or use the log_messae() function to log your error
        }
        else
        {
            return 1;
        }
    }
	public function ExecuteDirectQry($Qry,$row=0)
	{
		$res=$this->db->query($Qry);
		$datarr=array();	
		if ($res)
		{
			$datarr=($row==0)?$res->result_array():$res->row_array();
		}

		return $datarr;
	}
	public function getDataFromJoinQry($cols,$baseTable,$joinArr,$whereArr,$orderByArr,$row=0)
	{
		$this->db->select($cols);
		$this->db->from($baseTable);
		for($i=0;$i<count($joinArr);$i++)
		{
			$this->db->join($joinArr[$i]["tbl"],$joinArr[$i]["onBehalf"],$joinArr[$i]["JoinType"]);
		}
		$this->db->where($whereArr);
		for($i=0;$i<count($orderByArr);$i++)
		{
			$this->db->order_by($orderByArr[$i][0],$orderByArr[$i][1]);
		}
		$DataArr=$this->db->get();
		if($row==1)
		{
			return $DataArr->row_array();
		}
		else
		{
			return $DataArr->result_array();
		}	
	}
	public function getDataFromJoinQryStringWhere($cols,$baseTable,$joinArr,$whereArr,$orderByArr,$row=0)
	{
		$this->db->select($cols);
		$this->db->from($baseTable);
		for($i=0;$i<count($joinArr);$i++)
		{
			$this->db->join($joinArr[$i]["tbl"],$joinArr[$i]["onBehalf"],$joinArr[$i]["JoinType"]);
		}
		$this->db->where($whereArr);
		for($i=0;$i<count($orderByArr);$i++)
		{
			$this->db->order_by($orderByArr[$i][0],$orderByArr[$i][1]);
		}
		$DataArr=$this->db->get();
		if($row==1)
		{
			return $DataArr->row_array();
		}
		else
		{
			return $DataArr->result_array();
		}	
	}
	public function getDataFromJoinQryStringWherelimit($cols,$baseTable,$joinArr,$whereArr,$orderByArr,$row=0,$limit)
	{
		$this->db->select($cols);
		$this->db->limit($limit);
		$this->db->from($baseTable);
		for($i=0;$i<count($joinArr);$i++)
		{
			$this->db->join($joinArr[$i]["tbl"],$joinArr[$i]["onBehalf"],$joinArr[$i]["JoinType"]);
		}
		$this->db->where($whereArr);
		for($i=0;$i<count($orderByArr);$i++)
		{
			$this->db->order_by($orderByArr[$i][0],$orderByArr[$i][1]);
		}
		$DataArr=$this->db->get();
		if($row==1)
		{
			return $DataArr->row_array();
		}
		else
		{
			return $DataArr->result_array();
		}	
	}
	public function getDataFromJoinQryStringWheregroup($cols,$baseTable,$joinArr,$whereArr,$orderByArr,$groupByArr,$row=0)
	{
		$this->db->select($cols);
		$this->db->from($baseTable);
		for($i=0;$i<count($joinArr);$i++)
		{
			$this->db->join($joinArr[$i]["tbl"],$joinArr[$i]["onBehalf"],$joinArr[$i]["JoinType"]);
		}
		$this->db->where($whereArr);
		for($i=0;$i<count($orderByArr);$i++)
		{
			$this->db->order_by($orderByArr[$i][0],$orderByArr[$i][1]);
		}
		$this->db->group_by($groupByArr);
		$DataArr=$this->db->get();
		if($row==1)
		{
			return $DataArr->row_array();
		}
		else
		{
			return $DataArr->result_array();
		}	
	}
	public function getDataFromNormalSelect($cols,$Table,$whereArr,$orderByArr,$row=0)
	{
		/*echo $cols;
		echo $Table;
		print_r($whereArr);
		print_r($orderByArr);
		echo $row;*/
		$this->db->select($cols);
		$this->db->from($Table);
		$this->db->where($whereArr);
		for($i=0;$i<count($orderByArr);$i++)
		{
			$this->db->order_by($orderByArr[$i][0],$orderByArr[$i][1]);
		}
		$DataArr=$this->db->get();
		if($row==1)
		{
			return $DataArr->row_array();
		}
		else
		{
			return $DataArr->result_array();
		}
	}
}
?>