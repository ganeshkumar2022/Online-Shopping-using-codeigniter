<?php
class User_model extends CI_Model
{
	public function add_user($data)
	{
		$this->db->insert("user",$data);
		return true;
	}
	public function get_password($name)
	{
		return $this->db->where("name",$name)->get("user")->row();
	}
	public function get_profile_picture($uid)
	{
		return $this->db->where("uid",$uid)->get("user")->row();
	}
	public function update_pro1($data,$id)
	{
		$this->db->where("uid",$id);
		$this->db->update("user",$data);
		return true;
	}
	public function delete_account($uid)
	{
		$this->db->where("uid",$uid);
		$this->db->delete("user");
	}
	public function get_category()
	{
		return $this->db->get("category")->result();
	}
	public function get_brand()
	{
		return $this->db->get("brand")->result();
	}
	public function get_products()
	{
		return $this->db->get("products")->result();
	}
	public function get_product($id)
	{
		$this->db->where("pid",$id);
		return $this->db->get("products")->result();
	}
	public function get_search_product($search)
	{
		$this->db->like("title",$search);
		$this->db->or_like("description",$search);
		return $this->db->get("products")->result();
	}
	public function get_category_product($category_id)
	{
		$this->db->where("category",$category_id);
		return $this->db->get("products")->result();	
	}
	public function get_brand_product($brand_id)
	{
		$this->db->where("brand",$brand_id);
		return $this->db->get("products")->result();	
	}
	public function add_cart($data)
	{
		$this->db->insert("cart",$data);
		return true;
	}
	public function check_exist_cart($pid,$uid)
	{
		$this->db->where("product_id",$pid);
		$this->db->where("user_id",$uid);
		return $this->db->get("cart")->result();
	}
	public function cart_count($uid)
	{
		$this->db->where("user_id",$uid);
		$query=$this->db->get("cart");
		return $query->num_rows();
	}
	public function get_cart($uid)
	{
		$this->db->where("user_id",$uid);
		return $this->db->get("cart")->result();

	}
	public function update_cart($cart_id,$price)
	{
		$this->db->where("cart_id",$cart_id);
		$this->db->update("cart",array("price"=>$price));
		return true;
	}
	public function delete_cart($cart_id)
	{
		$this->db->where("cart_id",$cart_id);
		$this->db->delete("cart");
		return true;
	}
	public function order_count()
	{
		$query=$this->db->get("orders");
		return $query->num_rows();
	}
	public function add_orders($data)
	{
		$this->db->insert("orders",$data);
		$insert_id=$this->db->insert_id();
		return $insert_id;
	}
	public function add_final($data2)
	{
		$this->db->insert("final",$data2);
	}
	public function delete_old_cart($uid)
	{
		$this->db->where("user_id",$uid);
		$this->db->delete("cart");
		return true;
	}
	public function contact($data)
	{
		$this->db->insert("contact",$data);
		return true;
	}
	public function order_by_user($uid)
	{
		$this->db->where("user_id",$uid);
		$this->db->where("status","Incomplete");
		$query=$this->db->get("orders");
		return $query->result();
	}
	public function order_by_users($uid)
	{
		$this->db->where("user_id",$uid);
		$query=$this->db->get("orders");
		return $query->result();
	}
	public function get_user_order($oid)
	{
		$this->db->where("oid",$oid);
		return $this->db->get("orders")->row();
	}
	
	public function add_payment($data)
	{
		$this->db->insert("payment",$data);
	}
	public function confirm_payment($oid)
	{
		$this->db->where("oid",$oid);
		$this->db->update("orders",array("status"=>"Complete"));
		return true;
	}
}
?>
