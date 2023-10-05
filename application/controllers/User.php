<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("form","url"));
		$this->load->model("user_model");

		if($this->session->has_userdata("uid"))
		{
			$uid=$this->session->userdata("uid");
			$count=$this->user_model->cart_count($uid);
		}
		else
		{
			$uid=0;
			$count=$this->user_model->cart_count($uid);
		}
		$cart=$this->user_model->get_cart($uid);
		$amount=0;
		foreach($cart as $cart)
		{
			$amount+=$cart->price;
		}
		$GLOBALS['amount']=$amount;
	}
	public function login()
	{
		if($this->session->has_userdata("uid"))
		{
			redirect("user/dashboard");
		}
		else
		{
			if($this->session->has_userdata("uid"))
			{
				$uid=$this->session->userdata("uid");
				$count=$this->user_model->cart_count($uid);
			}
			else
			{
				$uid=0;
				$count=$this->user_model->cart_count($uid);
			}
		$this->load->view("header",array("count"=>$count,"amount"=>$GLOBALS['amount']));
		$this->load->view("login_form");
		$this->load->view("footer");
		}
	}
	public function register()
	{
		if($this->session->has_userdata("uid"))
		{
			$uid=$this->session->userdata("uid");
			$count=$this->user_model->cart_count($uid);
		}
		else
		{
			$uid=0;
			$count=$this->user_model->cart_count($uid);
		}
		$this->load->view("header",array("count"=>$count,"amount"=>$GLOBALS['amount']));
		$this->load->view("register_form");
		$this->load->view("footer");	
	}
	public function add_user()
	{
		$data["name"]=$this->input->post("name");
		$data["email"]=$this->input->post("email");
		$data["password"]=password_hash($this->input->post("password"),PASSWORD_DEFAULT);
		$data["address"]=$this->input->post("address");
		$data["contact"]=$this->input->post("contact");
		$data["ip_address"]=$_SERVER["REMOTE_ADDR"];
		$config["upload_path"]="./profile_pictures/";
		$config["allowed_types"]="jpg|png";
		$config["max_type"]=2048;
		$this->load->library("upload",$config);

		$success=$error=null;
		if($this->upload->do_upload("myimage"))
		{
			$data2=$this->upload->data();
			$data["myimage"]=$data2["file_name"];
			$response=$this->user_model->add_user($data);
			if($response==true)
			{
				$success="User Registered successfully";
				$this->session->set_flashdata("success",$success);
				redirect("user/register");
				echo $success;
			}
			else
			{
				$error="Error to register";
				$this->session->set_flashdata("error",$error);
				redirect("user/register");
				echo $error;
			}
		}
		else
		{
			$error=$this->upload->display_errors();
			$this->session->set_flashdata("error",$error);
			redirect("user/register");
		}
		

	}
	public function check_login()
	{
		$name=$this->input->post("name");
		$password=$this->input->post("password");
		if($user=$this->user_model->get_password($name))
		{
			if(password_verify($password,$user->password))
			{
				$success="<script>alert('Login successfully');</script>";
				$this->session->set_flashdata("success",$success);
				$this->session->set_userdata("uid",$user->uid);
				redirect("user/dashboard");
			}
			else
			{
				$success="<script>alert('Name or password not match');</script>";
				$this->session->set_flashdata("success",$success);
				redirect("user/login");
			}
		}
		else
		{
			
			$success="<script>alert('Name or password not match');</script>";
			$this->session->set_flashdata("success",$success);
			redirect("user/login");
		}

	}
	public function dashboard()
	{
		if($this->session->has_userdata("uid"))
		{
			if($this->session->has_userdata("uid"))
			{
				$uid=$this->session->userdata("uid");
				$count=$this->user_model->cart_count($uid);
			}
			else
			{
				$uid=0;
				$count=$this->user_model->cart_count($uid);
			}
			$uid=$this->session->userdata("uid");
			$get_profile=$this->user_model->get_profile_picture($uid);
			$this->load->view("header",array("count"=>$count,"amount"=>$GLOBALS['amount']));
			$this->load->view("user_dashboard",array("get_profile"=>$get_profile));
		}
		else
		{
			redirect("user/login");
		}
		
	}
	public function logout()
	{
		$this->session->unset_userdata("uid");
		redirect("user/login");
	}
	
	public function edit_account()
	{
		if($this->session->has_userdata("uid"))
		{
			if($this->session->has_userdata("uid"))
			{
				$uid=$this->session->userdata("uid");
				$count=$this->user_model->cart_count($uid);
			}
			else
			{
				$uid=0;
				$count=$this->user_model->cart_count($uid);
			}
		$uid=$this->session->userdata("uid");
		$get_profile=$this->user_model->get_profile_picture($uid);
		$this->load->view("header",array("count"=>$count,"amount"=>$GLOBALS['amount']));
		$this->load->view("edit_account",array("get_profile"=>$get_profile));
		}
		else
		{
			redirect("user/login");
		}
	}
	public function update_profile()
	{
		$data["name"]=$this->input->post("name");
		$data["email"]=$this->input->post("email");
		$data["address"]=$this->input->post("address");
		$data["contact"]=$this->input->post("contact");
		$id=$this->session->userdata("uid");
		
		$config["upload_path"]="./profile_pictures/";
		$config["allowed_types"]="jpg|png";
		$config["max_type"]=2048;
		$this->load->library("upload",$config);
		if($_FILES["myimage"]["name"]=="")
		{

		}
		else
		{
			if($this->upload->do_upload("myimage"))
			{
				$data2=$this->upload->data();
				$data["myimage"]=$data2["file_name"];
			}
		}
		if($this->user_model->update_pro1($data,$id))
		{
			$this->session->set_flashdata("success","Profile updated successfully");
			redirect("user/edit_account");
		}
		else
		{
			$this->session->set_flashdata("error","Error to update a profile");
			redirect("user/edit_account");
		}
	}
	public function delete_account()
	{
		if($this->session->has_userdata("uid"))
		{
			if($this->session->has_userdata("uid"))
			{
				$uid=$this->session->userdata("uid");
				$count=$this->user_model->cart_count($uid);
			}
			else
			{
				$uid=0;
				$count=$this->user_model->cart_count($uid);
			}
		$uid=$this->session->userdata("uid");
		$get_profile=$this->user_model->get_profile_picture($uid);
		$this->load->view("header",array("count"=>$count,"amount"=>$GLOBALS['amount']));
		$this->load->view("delete_account",array("get_profile"=>$get_profile));
		}
		else
		{
			redirect("user/login");
		}
	}
	public function confirm_delete()
	{
		if($this->session->has_userdata("uid"))
		{
		$uid=$this->session->userdata("uid");
		$this->user_model->delete_account($uid);
	    redirect("user/logout");
		}
		else
		{
			redirect("user/login");
		}
	}
	public function pending_orders()
	{
		if($this->session->has_userdata("uid"))
		{
			if($this->session->has_userdata("uid"))
			{
				$uid=$this->session->userdata("uid");
				$count=$this->user_model->cart_count($uid);
			}
			else
			{
				$uid=0;
				$count=$this->user_model->cart_count($uid);
			}
		$uid=$this->session->userdata("uid");
		$get_profile=$this->user_model->get_profile_picture($uid);
		$order=$this->user_model->order_by_user($uid);
		$this->load->view("header",array("count"=>$count,"amount"=>$GLOBALS['amount']));
		$this->load->view("pending_orders",array("get_profile"=>$get_profile,"order"=>$order));
		}
		else
		{
			redirect("user/login");
		}
	}
	public function my_orders()
	{
		if($this->session->has_userdata("uid"))
		{
			if($this->session->has_userdata("uid"))
			{
				$uid=$this->session->userdata("uid");
				$count=$this->user_model->cart_count($uid);
			}
			else
			{
				$uid=0;
				$count=$this->user_model->cart_count($uid);
			}
		$uid=$this->session->userdata("uid");
		$get_profile=$this->user_model->get_profile_picture($uid);
		$order=$this->user_model->order_by_users($uid);
		$this->load->view("header",array("count"=>$count,"amount"=>$GLOBALS['amount']));
		$this->load->view("my_orders",array("get_profile"=>$get_profile,"order"=>$order));
		}
		else
		{
			redirect("user/login");
		}
	}
	public function confirm_payment()
	{
		
		if($this->session->has_userdata("uid"))
		{
		$oid=$this->input->get("id");
		$order=$this->user_model->get_user_order($oid);
		$this->load->view("confirm_payment",array("order"=>$order));
			if($this->input->post("confirm"))
			{
				$data["order_id"]=$this->input->post("order_id");
				$data["invoice_no"]=$this->input->post("invoice_no");
				$data["user_id"]=$this->input->post("user_id");
				$data["amount"]=$this->input->post("amount");
				$data["payment_mode"]=$this->input->post("payment_mode");
				$this->user_model->add_payment($data);
				$response=$this->user_model->confirm_payment($oid);
				if($response==true)
				{
					echo "<script>alert('Payment Completed successfully');</script>";
				}
				else
				{
					
					echo "<script>alert('Error in a payment work');</script>";
				}
			}
		}
		else
		{
			redirect("user/login");
		}
	}
}
?>
