<?php
class My_Model extends CI_Model 
{
	function saverecords($name,$email,$ph,$pass,$add,$pref)
	{
		$que=$this->db->query("select * from customer where email='".$email."'");
		$row = $que->num_rows();
		if($row)
		{
			return false;
		}
		else
		{
			$que="insert into customer values('','$name','$email','$ph','$pass','$add','$pref')";
			$this->db->query($que);
			return true;
		}
	}
	function saverestaurant($name,$email,$ph,$pass,$add,$detail)
	{

		$que=$this->db->query("select * from `restaurant` where email='".$email."'");
		$row = $que->num_rows();
		if($row){
			return false;
		}
		else{
			$que="insert into `restaurant` values('','$name','$email','$ph','$pass','$add','$detail')";
			$this->db->query($que);
			return true;
		}
	}
	
	function displayItems()
	{
		$query=$this->db->query("select * from  `menu_item`");
		return $query->result();
	}
	function displayCart($cid){
		$query=$this->db->query("select * from  `cart` , `menu_item` where cid='".$cid."' and cart.item_id=menu_item.item_id");
		return $query->result();
	}
	function displayOrder($rid){
		$query=$this->db->query("select * from  `order` , `menu_item`,`customer` where order.item_id=menu_item.item_id and order.c_id=customer.cid and menu_item.r_id='".$rid."'");
		return $query->result();
	}


}