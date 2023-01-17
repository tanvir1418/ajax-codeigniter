<?php
class Crud extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Crud_model');
	}

	// public function register() {
	public function index() {
		$this->load->view('register');
	}
    
	public function savedata() {
		if ($this->input->post('type') == 1) {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$phone = $this->input->post('phone');
			$city = $this->input->post('city');

			$this->Crud_model->saverecords($name, $email, $password, $phone, $city);

			echo json_encode(array(
				"statusCode" => 200,
			));
		}
	}
}