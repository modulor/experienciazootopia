<?php

class Settings_model extends CI_Model
{
  public function get_by_name($name)
  {
    return $this->db->where('name', $name)->get('settings')->row();
  }
}
