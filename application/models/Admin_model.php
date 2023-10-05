<?php
class Admin_model extends CI_Model
{
	public function get_password($name)
	{
		return $this->db->where("name",$name)->get("admin")->row();
	}
	public function add_category($data)
	{
		$this->db->insert("category",$data);
		return true;
	}
	public function add_brand($data)
	{
		$this->db->insert("brand",$data);
		return true;
	}
	public function get_categories()
	{
		$query=$this->db->get("category");
		return $query->result();
	}
	public function get_category($id)
	{
		return $this->db->where("cid",$id)->get("category")->row();
	}
	public function edit_category($cname,$id)
	{
		$this->db->where("cid",$id);
		$this->db->update("category",array("cname"=>$cname));
		return true;
	}
	public function edit_brand($bname,$id)
	{
		$this->db->where("bid",$id);
		$this->db->update("brand",array("bname"=>$bname));
		return true;
	}
	public function delete_category($id)
	{
		$this->db->where("cid",$id);
		$this->db->delete("category");
	}
	public function delete_brand($id)
	{
		$this->db->where("bid",$id);
		$this->db->delete("brand");
	}
	public function get_brands()
	{
		$query=$this->db->get("brand");
		return $query->result();
	}
	public function get_brand($id)
	{
		return $this->db->where("bid",$id)->get("brand")->row();
	}
	public function get_users()
	{
		$this->db->order_by("uid","desc");
		return $this->db->get("user")->result();
	}
	public function delete_user($id)
	{
		$this->db->where("uid",$id);
		$this->db->delete("user");
	}
	public function add_products($data)
	{
		$this->db->insert("products",$data);
		return true;
	}
	public function get_products()
	{
		$query=$this->db->get("products");
		return $query->result();
	}
	public function get_product($id)
	{
		return $this->db->where("pid",$id)->get("products")->row();
	}
	public function edit_prodcts($data,$id)
	{
		$this->db->where("pid",$id);
		$this->db->update("products",$data);
		return true;
	}
	public function delete_products($id)
	{
		$this->db->where("pid",$id);
		$this->db->delete("products");
	}
	public function get_orders()
	{
		return $this->db->get("orders")->result();
	}
	public function get_payments()
	{
		$this->db->select('*');
		$this->db->from("payment");
		$this->db->join("user","payment.user_id=user.uid");
		$query=$this->db->get();
		return $query->result();
	}
	public function get_notifications()
	{
		return $this->db->get("contact")->result();
	}
}

?>
