<?php
class Crud_model extends CI_Model {
	function saverecords($name, $email, $password, $phone, $city) {
		$query = "INSERT INTO `crud`( `name`, `email`, `password`, `phone`, `city`)
		VALUES ('$name','$email', '$password','$phone','$city')";
		$this->db->query($query);
	}
}