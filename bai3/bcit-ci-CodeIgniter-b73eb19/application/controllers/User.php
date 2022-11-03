<?php 
class User extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('User_model');
	}
        /*Insert*/
	public function dangki()
	{
		/*load registration view form*/
		$this->load->view('insertUser');
	
		/*Check submit button */
		if($this->input->post('dangky'))
		{
			$data['username']=$this->input->post('username');
			$data['password']=$this->input->post('password');
			$data['email']=$this->input->post('email');
			$nhaplai =$this->input->post('nhaplai');
			if($data['username'] === "" || $data['password'] ==="" || $data['email'] === "" || $nhaplai ===""){
				echo '<script> alert("Thông tin chưa được điền đầy đủ! "); </script>';
			}else{
				$email=$this->input->post('email');
				$que=$this->db->query("select * from user where email='$email'");
				$row = $que->num_rows();
				if($row>0)
				{
				echo '<script> alert("Gmail đã được sử dụng! "); </script>';
				}
				else
				{
					$response=$this->User_model->saverecords($data);
					if($response==true){
					//redirect('User/dangnhap');
					echo '<script> alert("Đăng kí thành công! "); </script>';	
					}
					else{
							echo "Insert error !";
					}
					
				}		
			}
				
		   
		}
	}
	
	
	public function ltrangchu()
	{
		$this->load->view('trangchu');
	}

	public function dangnhap()
	{
			
		/*load registration view form*/
		$this->load->view('login_view');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		/*Check submit button */
		if($email === "" ||$password ==="" ){
			echo '<script> alert("Thông tin chưa được điền đầy đủ! "); </script>';
		}else{
				$this->User_model->select($email,$password);
				// if($response==true){
				// redirect('User/dangnhap');
				// echo '<script> alert("Đăng kí thành công! "); </script>';	
				// }
				// else{
				// 		echo "Insert error !";
				// }
				
					
		}
	}
}
?>