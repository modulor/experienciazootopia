<?php

class Qr extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->load->model('Reservations_model');
  }

  public function read($reservations_id, $check_in = '')
  {
    if (!$this->session->userdata('login')) {
      redirect(base_url("admin/login?reservations_id=$reservations_id"), 'refresh');
    }

    if ($check_in == 'OK') $this->check_in($reservations_id);

    $data = array(
      'reservation' => $this->Reservations_model->get_by_id($reservations_id),
    );

    $this->load->view('admin/qr/qr_read_view', $data);
  }

  private function check_in($reservations_id)
  {
    $data = array(
      'id' => $reservations_id,
      'qr_code' => 'OK',
    );

    $this->Reservations_model->update($data);
  }
}
