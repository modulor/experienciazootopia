<?php

class Hours_available_model extends CI_Model
{
  public function get_by_dates_available_id($dates_available_id)
  {
    return $this->db->where('dates_available_id', $dates_available_id)
      ->where('available', 1)
      ->where('attendees_available >', 0)
      ->get('hours_available')
      ->result();
  }

  public function get_all_by_dates_available_id($dates_available_id)
  {
    return $this->db->where('dates_available_id', $dates_available_id)
      ->where('available', 1)
      ->get('hours_available')
      ->result();
  }

  public function get_by_id($id)
  {
    return $this->db->where('id', $id)->get('hours_available')->row();
  }

  public function update($data)
  {
    $this->db->where('id', $data['id'])->update('hours_available', $data);
  }

  public function get_all()
  {
    return $this->db->get('hours_available')->result();
  }

  public function get_by_date_range($params)
  {
    return $this->db->select('ha.*')
      ->from('hours_available ha')
      ->join('dates_available da', 'da.id = ha.dates_available_id')
      ->where('da.date >=', $params['start_date'])
      ->where('da.date <=', $params['end_date'])
      ->get()
      ->result();
  }
}
