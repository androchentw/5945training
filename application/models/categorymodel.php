<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class CategoryModel extends CI_Model {  
    function __construct() {  
        parent::__construct();  
    }  
    function find_all_category() {
        $query = $this->db->get("category");

        return $query->result();
    }
} 