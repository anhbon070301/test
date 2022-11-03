<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

  public function index(){
  	$this->load->model("student_model");
  	$data["list"] = $this->student_model->getList();
    $this->load->view("student/index", $data);
  }

  public function add(){
  	if ($this->input->post("btnadd")) {
      $data["name"] = $this->input->post("name");
      $data["age"] = $this->input->post("age");

      if (!empty($_FILES['picture']['name'])) {
        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['picture']['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('picture')) {
          $uploadData = $this->upload->data();
          $data["image"] = $uploadData['file_name'];
        } else{
          $data["image"] = '';
        }
      }else{
        $data["image"] = '';
      }

      $this->form_validation->set_rules("name", "Tên sinh viên", "required|min_length[3]");
      $this->form_validation->set_rules("age", "Tuổi", "required|is_numeric");

      if ($this->form_validation->run() == TRUE) {
        $this->db->insert("students", $data);
        header('Location: '.BASE_URL.'/student');
      }
  	}
    $this->load->view("student/add");
  }
}
