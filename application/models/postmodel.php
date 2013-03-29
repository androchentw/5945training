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

    function insert($username, $email, $content) {
        $datetime = date("Y-m-d H:i:s");

        $this->db->insert("5945post", Array(
            "UserName" => $username, 
            "UserEmail" => $email,
            "Content" => $content,
            "ModifyDate" => $datetime
        ));
        return $this->db->insert_id();
    }

    function update($postid, $username, $email, $content) {
        $datetime = date("Y-m-d H:i:s");

        $this->db->where("PostID", $postid);
        $this->db->update("5945post", Array(
            "UserEmail" => $username,
            "UserEmail" => $email,
            "Content" => $content
        ));
    }

    function delete($postid) {
        $this->db->where("PostID", $postid);
        $this->db->delete("5945post");
    }
} 