<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
	public function index($categoryid) {
		$this->load->model("PostModel");
		$posts = $this->PostModel->find_by_category_id($categoryid);
		$categoryName = $this->PostModel->get_category_name_by_id($categoryid);

		$this->load->view('post', Array(
			"selector" => "post",
			"pageTitle" => $categoryName." - Andro's 5945 Intern Training Tutorial",
			"categoryid" => $categoryid,
			"posts" => $posts
		));
	}

	public function new_($categoryid) {
		$this->load->view("new_", Array(
			"selector" => "new_",
			"pageTitle" => "New - Andro's 5945 Intern Training Tutorial",
			"categoryid" => $categoryid
		));
	}
	public function create($categoryid) {
		$this->load->model("PostModel");

		$username = $this->input->post("username");
		$email = $this->input->post("email");
		$content = $this->input->post("content");

		if (empty($username) || empty($content)) {
			$this->load->view("new_", Array(
				"selector" => "create",
				"pageTitle" => "New - Andro's 5945 Intern Training Tutorial",
				"errmsg" => "使用者名稱、發文內容不得為空",
				"username" => $username,
				"email" => $email,
				"content" => $content
			));
			return ;
		} 
		
		$this->PostModel->insert($username, $email, $content, $categoryid);
		redirect(site_url("post/index/".$categoryid));
	}

	public function edit($postid) {
		$this->load->model("PostModel");

		$post = $this->PostModel->find_by_id($postid);

		$this->load->view("new_", Array(
			"selector" => "edit",
			"pageTitle" => "Edit - Andro's 5945 Intern Training Tutorial",
			"postid" => $postid,
			"username" => $post->UserName,
			"email" => $post->UserEmail,
			"content" => $post->Content
		));
	}

	public function update($postid) {
		$this->load->model("PostModel");
		$this->load->model("PostModel");

		$username = $this->input->post("username");
		$email = $this->input->post("email");
		$content = $this->input->post("content");
		$categoryid = $this->PostModel->get_cid_by_pid($postid);

		if($username=="" || $content=="") {
			$this->load->view("new_", Array(
				"selector" => "update",
				"pageTitle" => "Edit - Andro's 5945 Intern Training Tutorial",
				"errmsg" => "使用者名稱、發文內容不得為空",
				"username" => $username,
				"email" => $email,
				"content" => $content
			));
			return ;
		}

		$this->PostModel->update($postid, $username, $email, $content);
		redirect(site_url("post/index/".$categoryid));
	}

	public function delete($postid) {
		$this->load->Model("PostModel");

		$this->PostModel->delete($postid);
		redirect(site_url("category"));
	}
}