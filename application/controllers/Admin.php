<?php
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin_model");
	}
	public function index()
	{
		$this->load->view("admin/login");
	}
	public function check_login()
	{
		$name=$this->input->post("name");
		$password=$this->input->post("password");
		if($user=$this->admin_model->get_password($name))
		{
			if(password_verify($password,$user->password))
			{
				$success="<script>alert('Login successfully');</script>";
				$this->session->set_flashdata("success",$success);
				$this->session->set_userdata("aid",$user->aid);
				redirect("admin/dashboard");
			}
			else
			{
				$success="<script>alert('Name or password not match');</script>";
				$this->session->set_flashdata("success",$success);
				redirect("admin");
			}
		}
		else
		{
			
			$success="<script>alert('Name or password not match');</script>";
			$this->session->set_flashdata("success",$success);
			redirect("admin");
		}

	}
	public function dashboard()
	{
		if($this->session->has_userdata("aid"))
		{
			$this->load->view("admin/header");
			$this->load->view("admin/dashboard");
		}
		else
		{
			redirect("admin");
		}
	}
/* add products start */
	public function add_products()
	{
		if($this->session->has_userdata("aid"))
		{
			$category=$this->admin_model->get_categories();
			$brand=$this->admin_model->get_brands();
			$this->load->view("admin/header");
			$this->load->view("admin/add_products",array("category"=>$category,"brand"=>$brand));
		}
		else
		{
			redirect("admin");
		}
	}
	public function add_new_products()
	{
	  $data["title"]=$this->input->post("title");
	  $data["description"]=$this->input->post("description");
	  $data["price"]=$this->input->post("price");
	  $data["keyword"]=$this->input->post("keyword");
	  $data["category"]=$this->input->post("category");
	  $data["brand"]=$this->input->post("brand");
	  
	  $config["upload_path"]="./products/";
	  $config["allowed_types"]="jpg|png";
	  $config["max_size"]=12048;
	  $this->load->library("upload",$config);
	  if($this->upload->do_upload("product_image1"))
	  {
		$d=$this->upload->data();
		$data["product_image1"]=$d["file_name"];
	  }
	  if($this->upload->do_upload("product_image2"))
	  {
		$d2=$this->upload->data();
		$data["product_image2"]=$d2["file_name"];
	  }
	  if($this->upload->do_upload("product_image3"))
	  {
		$d3=$this->upload->data();
		$data["product_image3"]=$d3["file_name"];
	  }
	  $response=$this->admin_model->add_products($data);
	  if($response==true)
	  {
		$success="<script>alert('Products added successfully');</script>";
		$this->session->set_flashdata("success",$success);
		redirect("admin/add_products");
	  }
	  else
	  {
		$success="<script>alert('Error to add a product');</script>";
		$this->session->set_flashdata("success",$success);
		redirect("admin/add_products");
	  }

	}

/* add products end */
	public function add_category()
	{
		if($this->session->has_userdata("aid"))
		{
			$this->load->view("admin/header");
			$this->load->view("admin/add_category");
		}
		else
		{
			redirect("admin");
		}
	}
	public function edit_category($id)
	{
		if($this->session->has_userdata("aid"))
		{
			$category=$this->admin_model->get_category($id);
			$this->load->view("admin/header");
			$this->load->view("admin/edit_category",array("category"=>$category));
			if($this->input->post("edit"))
			{
				$cname=$this->input->post("cname");
				if($this->admin_model->edit_category($cname,$id))
				{
					echo "<script>alert('category update successfully');window.location.replace(window.location.href);</script>";
				}
				else
				{
					echo "<script>alert('Error to update a category');window.location.replace(window.location.href);</script>";
				}
			}
		}
		else
		{
			redirect("admin");
		}
	}

	public function edit_brand($id)
	{
		if($this->session->has_userdata("aid"))
		{
			$category=$this->admin_model->get_brand($id);
			$this->load->view("admin/header");
			$this->load->view("admin/edit_brand",array("brand"=>$category));
			if($this->input->post("edit"))
			{
				$bname=$this->input->post("bname");
				if($this->admin_model->edit_brand($bname,$id))
				{
					echo "<script>alert('Brand update successfully');window.location.replace(window.location.href);</script>";
				}
				else
				{
					echo "<script>alert('Error to update a brand');window.location.replace(window.location.href);</script>";
				}
			}
		}
		else
		{
			redirect("admin");
		}
	}

	public function delete_category($id)
	{
		$this->admin_model->delete_category($id);
		redirect("admin/all_category");
	}
	public function delete_user($id)
	{
		$this->admin_model->delete_user($id);
		redirect("admin/list_users");
	}
	public function delete_products($id)
	{
		$this->admin_model->delete_products($id);
		redirect("admin/all_products");
	}
	public function delete_brand($id)
	{
		$this->admin_model->delete_brand($id);
		redirect("admin/all_brand");
	}

	public function verify_add_category()
	{
		$data["cname"]=$this->input->post("cname");
		$response=$this->admin_model->add_category($data);
		if($response==true)
		{
			$success="<script>alert('category added successfully');</script>";
			$this->session->set_flashdata("success",$success);
			redirect("admin/add_category");
		}
		else
		{
			$success="<script>alert('Error to add Category');</script>";
			$this->session->set_flashdata("success",$success);
			redirect("admin/add_category");
		}
	}
	public function add_brand()
	{
		if($this->session->has_userdata("aid"))
		{
			$this->load->view("admin/header");
			$this->load->view("admin/add_brand");
		}
		else
		{
			redirect("admin");
		}
	}
	
	public function verify_add_brand()
	{
		$data["bname"]=$this->input->post("bname");
		$response=$this->admin_model->add_brand($data);
		if($response==true)
		{
			$success="<script>alert('Brand added successfully');</script>";
			$this->session->set_flashdata("success",$success);
			redirect("admin/add_brand");
		}
		else
		{
			$success="<script>alert('Error to add brand');</script>";
			$this->session->set_flashdata("success",$success);
			redirect("admin/add_brand");
		}
	}
	public function all_category()
	{
		if($this->session->has_userdata("aid"))
		{
			$category=$this->admin_model->get_categories();
			$this->load->view("admin/header");
			$this->load->view("admin/all_category",array("category"=>$category));
		}
		else
		{
			redirect("admin");
		}
	}
	public function all_products()
	{
		if($this->session->has_userdata("aid"))
		{
			$product=$this->admin_model->get_products();
			$this->load->view("admin/header");
			$this->load->view("admin/all_products",array("product"=>$product));
		}
		else
		{
			redirect("admin");
		}
	}
	public function all_orders()
	{
		if($this->session->has_userdata("aid"))
		{
			$users=$this->admin_model->get_users();
			$orders=$this->admin_model->get_orders();
			$this->load->view("admin/header");
			$this->load->view("admin/all_orders",array("orders"=>$orders,"users"=>$users));
		}
		else
		{
			redirect("admin");
		}
	}
	public function all_notifications()
	{
		if($this->session->has_userdata("aid"))
		{
			$users=$this->admin_model->get_users();
			$notifications=$this->admin_model->get_notifications();
			$this->load->view("admin/header");
			$this->load->view("admin/all_notifications",array("notifications"=>$notifications,"users"=>$users));
		}
		else
		{
			redirect("admin");
		}
	}
	public function all_payments()
	{
		if($this->session->has_userdata("aid"))
		{
			$payment=$this->admin_model->get_payments();
			$this->load->view("admin/header");
			$this->load->view("admin/all_payments",array("payment"=>$payment));
		}
		else
		{
			redirect("admin");
		}
	}

	public function edit_products($id)
	{
		if($this->session->has_userdata("aid"))
		{
			$category=$this->admin_model->get_categories();
			$brand=$this->admin_model->get_brands();
			$product=$this->admin_model->get_product($id);
			$this->load->view("admin/header");
			$this->load->view("admin/edit_products",array("product"=>$product,"brand"=>$brand,'category'=>$category));
			if($this->input->post("update"))
			{
				$data["title"]=$this->input->post("title");
				$data["description"]=$this->input->post("description");
				$data["keyword"]=$this->input->post("keyword");
				$data["price"]=$this->input->post("price");
				$data["category"]=$this->input->post("category");
				$data["brand"]=$this->input->post("brand");

				$config["upload_path"]="./products/";
				$config["allowed_types"]="jpg|png";
				$config["max_size"]=12048;
				$this->load->library("upload",$config);
				if($_FILES["product_image1"]["name"]!="")
				{
					if($this->upload->do_upload("product_image1"))
					{
					  $d=$this->upload->data();
					  $data["product_image1"]=$d["file_name"];
					}
				}
				if($_FILES["product_image2"]["name"]!="")
				{
					if($this->upload->do_upload("product_image2"))
					{
					$d2=$this->upload->data();
					$data["product_image2"]=$d2["file_name"];
					}
				}
				
				if($_FILES["product_image1"]["name"]!="")
				{
					if($this->upload->do_upload("product_image3"))
				    {
				    $d3=$this->upload->data();
				    $data["product_image3"]=$d3["file_name"];
				    }
				}
				
				if($this->admin_model->edit_prodcts($data,$id))
				{
					echo "<script>alert('Products update successfully');window.location.replace(window.location.href);</script>";
				}
				else
				{
					echo "<script>alert('Error to update a product');window.location.replace(window.location.href);</script>";
				}
			}
		}
		else
		{
			redirect("admin");
		}
	}
	public function all_brand()
	{
		if($this->session->has_userdata("aid"))
		{
			$category=$this->admin_model->get_brands();
			$this->load->view("admin/header");
			$this->load->view("admin/all_brand",array("brand"=>$category));
		}
		else
		{
			redirect("admin");
		}
	}
	public function logout()
	{
		$this->session->unset_userdata("aid");
		redirect("admin");
	}
	public function list_users()
	{
		
		if($this->session->has_userdata("aid"))
		{
			$users=$this->admin_model->get_users();
			$this->load->view("admin/header");
			$this->load->view("admin/list_users",array("users"=>$users));
		}
		else
		{
			redirect("admin");
		}
	}

}
?>
