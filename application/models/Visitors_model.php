<?php

class Visitors_model extends CI_Model
{
  public function create($data)
  {
    $this->db->insert('visitors', $data);
  }

  public function get_by_email($email)
  {
    return $this->db->where('email', $email)
      ->get('visitors')
      ->row();
  }

  public function get_by_id($id)
  {
    return $this->db->where('id', $id)
      ->get('visitors')
      ->row();
  }

  public function get_total_visitors()
  {
    return $this->db->count_all('visitors');
  }
}
