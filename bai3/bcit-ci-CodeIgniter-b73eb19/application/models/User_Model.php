<?php
class User_model extends CI_Model 
{
 
	function saverecords($data)
	{
        $this->db->insert('user',$data);
        return true;
	}
	// function add($usename,$password,$email){
	// 	$que=$this->db->query("select * from user where email='$email'");
	// 	$row = $que->num_rows();
	// 	if($row>0)
	// 	{
	// 	$data['error']="<h3 style='color:red'>Email id already exists</h3>";
	// 	}
	// 	else
	// 	{
	// 	$que=$this->db->query("insert into user values('','$usename','$password','$email')");
		
	// 	$data['error']="<h3 style='color:blue'>Your account created successfully</h3>";
	// 	}		
	// }
	function select($email,$password)
	{
		$que=$this->db->query("select * from user where email='$email' and password='$password'");
		$row = $que->num_rows();
		if($row>0)
		{
		//redirect('User/dashboard');
		echo '<script> alert("Đăng nhập thành công! "); </script>';
		}
		else
		{
			echo '<script> alert("Đăng nhập thất bại! "); </script>';	
		}
	}
}