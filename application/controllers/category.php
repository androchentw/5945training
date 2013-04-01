<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	public function index() {
		$this->load->model("CategoryModel");
		$categories = $this->CategoryModel->find_all_category();

		$this->load->view('category', Array(
			"selector" => "category",
			"title" => "Category - Andro's 5945 Intern Training Tutorial",
			"categories" => $categories
		));
	}

	
}