<?php

class Reservations extends CI_Controller
{
  public function index()
  {
    $this->load->model('Reservations_model');
    $this->load->model('Dates_available_model');

    $total_visitors = $this->Reservations_model->get_total_attendees();
    $total_reservations = $this->Reservations_model->get_total_reservations();
    $dates_available = $this->Dates_available_model->get_all();
    $reservations = $this->Reservations_model->get_all();

    $data = array(
      'content_view' => 'admin/reservations/reservations_index_view',
      'total_visitors' => $total_visitors,
      'total_reservations' => $total_reservations,
      'dates_available' => $dates_available,
      'reservations' => $reservations,
    );

    $this->load->view('admin/reservations/reservations_base_view', $data);
  }

  public function date_details($id)
  {
    $this->load->model('Dates_available_model');
    $this->load->model('Hours_available_model');
    $this->load->model('Reservations_model');

    $date = $this->Dates_available_model->get_by_id($id);
    $hours = $this->Hours_available_model->get_all_by_dates_available_id($id);
    $reservations = $this->Reservations_model->get_by_dates_available_id($id);

    $data = array(
      'content_view' => 'admin/reservations/reservations_date_details_view',
      'date' => $date,
      'hours' => $hours,
      'reservations' => $reservations,
    );

    $this->load->view('admin/reservations/reservations_base_view', $data);
  }

  public function hour_details($id)
  {
    $this->load->model('Hours_available_model');
    $this->load->model('Reservations_model');

    $hour = $this->Hours_available_model->get_by_id($id);
    $reservations = $this->Reservations_model->get_by_hours_available_id($id);

    $data = array(
      'content_view' => 'admin/reservations/reservations_hour_details_view',
      'hour' => $hour,
      'reservations' => $reservations,
    );

    $this->load->view('admin/reservations/reservations_base_view', $data);
  }
}
