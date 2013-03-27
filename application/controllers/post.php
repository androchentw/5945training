<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
	public function index() {
		$this->load->model("PostModel");
		$posts = $this->PostModel->find_all();

		$this->load->view('post', Array(
			"selector" => "post",
			"pageTitle" => "Post - Andro's 5945 Intern Training Tutorial",
			"posts" => $posts
		));
	}

	public function new_() {
		$this->load->view("new_", Array(
			"selector" => "new_",
			"pageTitle" => "New - Andro's 5945 Intern Training Tutorial"
		));
	}
	public function create() {
		$this->load->model("PostModel");

		$username = $this->input->post("new_username");
		$email = $this->input->post("new_email");
		$content = $this->input->post("new_content");

		if (empty($username) ||empty($content)) {
			$this->load->view("new_", Array(
				"errmsg" => "使用者名稱、發文內容不得為空",
				"username" => $username,
				"email" => $email,
				"content" => $content
			));
			return ;
		} 
		
		$this->PostModel->insert($username, $email, $content);
		redirect(site_url("post/index"));
	}

	public function edit($postid) {
		$this->load->model("PostModel");

		$post = $this->PostModel->find_by_id($postid);

		$this->load->view("edit", Array(
			"selector" => "edit",
			"pageTitle" => "Edit - Andro's 5945 Intern Training Tutorial",
			"postid" => $postid,
			"username" => $post->UserName,
			"email" => $post->UserEmail,
			"content" => $post->Content
		));
	}

	public function update() {
		$this->load->model("PostModel");

		$postid = $this->input->post("edit_postid");
		$username = $this->input->post("edit_username");
		$email = $this->input->post("edit_email");
		$content = $this->input->post("edit_content");

		if($username=="" || $content=="") {
			$this->load->view("edit", Array(
				"errmsg" => "使用者名稱、發文內容不得為空",
				"postid" => $postid,
				"username" => $username,
				"email" => $email,
				"content" => $content				
			));
			return ;
		}

		$this->PostModel->update($postid, $username, $email, $content);
		redirect(site_url("post/index"));
	}

	public function delete($postid) {
		$this->load->Model("PostModel");

		$this->PostModel->delete($postid);
		redirect(site_url("post/index"));
	}
}