<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_post extends CI_Model
{
    private $table="content_post";

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $this->db->select('content_post.*, ref_post_category.title as category');
        $this->db->join('ref_post_category', 'ref_post_category.id = content_post.post_category_id');
        $this->db->order_by('content_post.date', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function add($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function add_batch($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    public function get($id)
    {
		$this->db->select('content_post.*, ref_post_category.title as category');
        $this->db->join('ref_post_category', 'ref_post_category.id = content_post.post_category_id');
        $this->db->where($id);
        return $this->db->get($this->table)->row();
    }

    public function result($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->result();
    }

    public function update($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table,$data);
    }

    public function delete($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }

    public function check($data)
    {
        $this->db->where($data);
        $data = $this->db->get($this->table)->row();

        if($data){
            return true;
        } else{
            return false;
        }
    }
    
}
