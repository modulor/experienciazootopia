<?php

class Dates_available_model extends CI_Model
{
  public function get_all_available()
  {
    return $this->db->where('available', 1)
      ->where('date >=', date('Y-m-d'))
      ->where('date !=', '2022-10-21')
      ->where('attendees_available >', 0)
      ->order_by('date', 'asc')
      ->get('dates_available')
      ->result();
  }

  public function get_by_id($id)
  {
    return $this->db->where('id', $id)
      ->get('dates_available')
      ->row();
  }

  public function update($data)
  {
    $this->db->where('id', $data['id'])->update('dates_available', $data);
  }

  public function get_all()
  {
    return $this->db->get('dates_available')->result();
  }
}
