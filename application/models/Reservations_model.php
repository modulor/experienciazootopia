<?php

class Reservations_model extends CI_Model
{
  public function get_by_visitors_id($visitors_id)
  {
    return $this->db->where('visitors_id', $visitors_id)
      ->get('reservations')
      ->row();
  }

  public function create($data)
  {
    $this->db->insert('reservations', $data);
  }

  public function get_by_id($id)
  {
    return $this->db->select('r.id, da.date_label, da.date, ha.hour, ha.hour_label, 
      r.total_attendees, v.email, v.fullname, v.gender, v.age, v.phone, r.qr_code')
      ->from('reservations r')
      ->join('dates_available da', 'da.id = r.dates_available_id')
      ->join('hours_available ha', 'ha.id = r.hours_available_id')
      ->join('visitors v', 'v.id = r.visitors_id')
      ->where('r.id', $id)
      ->get()
      ->row();
  }

  public function get_all()
  {
    return $this->db->select('r.id, da.date_label, da.date, ha.hour, ha.hour_label, 
      r.total_attendees, v.email, v.fullname, v.gender, v.age, v.phone, r.qr_code,r.created_at')
      ->from('reservations r')
      ->join('dates_available da', 'da.id = r.dates_available_id')
      ->join('hours_available ha', 'ha.id = r.hours_available_id')
      ->join('visitors v', 'v.id = r.visitors_id')
      ->order_by('r.id', 'desc')
      ->get()
      ->result();
  }

  public function update($data)
  {
    $this->db->where('id', $data['id'])->update('reservations', $data);
  }

  public function get_by_email($email)
  {
    return $this->db->select('r.*')
      ->from('reservations r')
      ->join('visitors v', 'v.id = r.visitors_id')
      ->where('v.email', $email)
      ->get()
      ->row();
  }

  public function get_total_reservations()
  {
    return $this->db->count_all('reservations');
  }

  public function get_by_dates_available_id($dates_available_id)
  {
    return $this->db->select('r.id, da.date_label, da.date, ha.hour, ha.hour_label, 
      r.total_attendees, v.email, v.fullname, v.gender, v.age, v.phone, r.qr_code,r.created_at')
      ->from('reservations r')
      ->join('dates_available da', 'da.id = r.dates_available_id')
      ->join('hours_available ha', 'ha.id = r.hours_available_id')
      ->join('visitors v', 'v.id = r.visitors_id')
      ->where('r.dates_available_id', $dates_available_id)
      ->get()
      ->result();
  }

  public function get_total_attendees()
  {
    return $this->db->select('SUM(total_attendees) as total_attendees')
      ->from('reservations')
      ->get()
      ->row()
      ->total_attendees;
  }

  public function get_by_hours_available_id($hours_available_id)
  {
    return $this->db->select('r.id, da.date_label, da.date, ha.hour, ha.hour_label, 
      r.total_attendees, v.email, v.fullname, v.gender, v.age, v.phone, r.qr_code,r.created_at')
      ->from('reservations r')
      ->join('dates_available da', 'da.id = r.dates_available_id')
      ->join('hours_available ha', 'ha.id = r.hours_available_id')
      ->join('visitors v', 'v.id = r.visitors_id')
      ->where('r.hours_available_id', $hours_available_id)
      ->get()
      ->result();
  }
}
