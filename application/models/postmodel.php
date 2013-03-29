<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class PostModel extends CI_Model {  
    function __construct() {  
        parent::__construct();  
    }  
    function find_all() {
        $query = $this->db->get("5945post");

        return $query->result();
    }

    function find_by_id($postid) {
        $this->db->select("*");
        $this->db->from("5945post");
        $this->db->where("PostID", $postid);
        $query = $this->db->get();

        if($query->num_rows() <= 0) {
            return null;
        }
        return $query->row();
    }
    
    function find_all_category() {
        $query = $this->db->get("category");

        return $query->result();
    }

    function find_by_category_id($categoryid) {
        $this->db->select("*");
        $this->db->from("5945post");
        $this->db->where("Category", $categoryid);
        $query = $this->db->get();

        if($query->num_rows() <= 0) {
            return null;
        }
        return $query->result();
    }

    function get_category_name_by_id($categoryid) {
        $this->db->select("*");
        $this->db->from("category");
        $this->db->where("CategoryID", $categoryid);
        $query = $this->db->get();

        if($query->num_rows() <= 0) {
            return null;
        }
        return $query->row()->Name;
    }

    function get_cid_by_pid($postid) {
        $this->db->select("*");
        $this->db->from("5945post");
        $this->db->where("PostID", $postid);
        $query = $this->db->get();

        if($query->num_rows() <= 0) {
            return null;
        }
        return $query->row()->Category;
    }    

    function insert($username, $email, $content, $categoryid) {
        $datetime = date("Y-m-d H:i:s");

        $this->db->insert("5945post", Array(
            "UserName" => $username, 
            "UserEmail" => $email,
            "Content" => $content,
            "Category" => $categoryid,
            "ModifyDate" => $datetime
        ));
        return $this->db->insert_id();
    }

    function update($postid, $username, $email, $content) {
        $datetime = date("Y-m-d H:i:s");

        $this->db->where("PostID", $postid);
        $this->db->update("5945post", Array(
            "UserName" => $username,
            "UserEmail" => $email,
            "Content" => $content
        ));
    }

    function delete($postid) {
        $this->db->where("PostID", $postid);
        $this->db->delete("5945post");
    }
} 