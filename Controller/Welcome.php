<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper(array('url','form'));
		$this->load->model('My_Model');
	}

	public function index()
	{
		$result['data']=$this->My_Model->displayItems();
		$this->load->view('index',$result);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome/index');
	}


	public function cart(){
		$cid = $this->session->userdata('c_id');
		$result['data']=$this->My_Model->displayCart($cid);
		$this->load->view('viewCart',$result);
	}


	public function AddCart($item_id = NULL){
		$cid = $this->session->userdata('c_id');
		if($cid){
			$que="insert into `cart` values('','$cid','$item_id')";
			$this->db->query($que);
			redirect('Welcome/index');
		}else{
			redirect('Welcome/login');
		}
		
	}

	public function RemoveCart($id = NULL){
		$que="delete from `cart` where id='".$id."'";
		$this->db->query($que);
		redirect('Welcome/cart');
	}

	public function Orders()
	{
		$rid = $this->session->userdata('r_id');
		$result['data']=$this->My_Model->displayOrder($rid);
		$this->load->view('orders',$result);
	}
	public function success(){
		$this->load->view('orderPlaced');
	}

	public function Order($item_id = NULL)
	{
		$c_id = $this->session->userdata('c_id');
		if($c_id){
			$status="Undelivered";
			$que="insert into `order` values('','$c_id','$item_id','$status')";
			$this->db->query($que);
			redirect('Welcome/success');
		}else{
			redirect('Welcome/login');
		}
	}

	public function AddItem()
	{
		$this->load->view('AddItem');
		if($this->input->post('add'))
		{
			$name=$this->input->post('name');
			$quantity=$this->input->post('quantity');
			$price=$this->input->post('price');
			$rid=$this->session->userdata('r_id');
			$r_name=$this->session->userdata('r_name');
			$item=$this->input->post('item');
			$que="insert into `menu_item` values('','$name','$quantity','$price','$rid','$r_name','$item')";
			$this->db->query($que);

			redirect('Welcome/AddItem');	
		}

	}

	public function login()
	{
		
		$this->load->view('login');
		if($this->input->post('loginC'))
		{	
			
			$email=$this->input->post('email');
			$pass=$this->input->post('pass');
			$que=$this->db->query("select * from `customer` where email='".$email."' and password='".$pass."'");
			$row = $que->row_array();
			if($row){
				$array = array(
					'c_id' => $row[cid],
					'c_name' => $row[name],
					'c_email' => $row[email],
					'r_id' => '',
					'r_name' => '',
					'r_email' => '',
					);
					$this->session->set_userdata($array);
				redirect('Welcome/index');
			}
		}
	}
	public function loginRest()
	{
		
		$this->load->view('loginRest');
		if($this->input->post('loginR'))
		{	
			
			$email=$this->input->post('email');
			$pass=$this->input->post('pass');
			
			$que=$this->db->query("select * from `restaurant` where email='".$email."' and password='".$pass."'");
			$row = $que->row_array();
			if($row){
				$array = array(
					'c_id' => '',
					'c_name' => '',
					'c_email' => '',
					'r_id' => $row[rid],
					'r_name' => $row[name],
					'r_email' => $row[email],
					);
					$this->session->set_userdata($array);
				redirect('Welcome/index');
			}
		}

	}




	public function register()
	{
		
		$this->load->view('registerCustomer');
		if($this->input->post('register'))
		{	
			
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$ph=$this->input->post('phone');
			$pass=$this->input->post('pass');
			$add=$this->input->post('address');
			$pref=$this->input->post('pref');
			
			if($this->My_Model->saverecords($name,$email,$ph,$pass,$add,$pref)){
				redirect('Welcome/login');
			}
		}
	}
	public function registerRest()
	{
		
		$this->load->view('registerRest');
		if($this->input->post('register'))
		{	
			
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$ph=$this->input->post('phone');
			$pass=$this->input->post('pass');
			$add=$this->input->post('address');
			$detail=$this->input->post('detail');
			
			if($this->My_Model->saverestaurant($name,$email,$ph,$pass,$add,$detail)){
				redirect('Welcome/loginRest');
			}
		}

	}
	public function Delivered($o_id=NULL){
			$status="Delivered";
			$que="update `order` SET status = '".$status."' WHERE o_id='".$o_id."'";
			$this->db->query($que);
			redirect('Welcome/Orders');
	}


}
