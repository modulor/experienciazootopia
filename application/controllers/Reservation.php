<?php

class Reservation extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->load->model('Reservations_model');
    $this->load->model('Hours_available_model');
    $this->load->model('Dates_available_model');
  }

  public function visitor($visitors_id)
  {
    if ($this->visitor_can_not_create_a_reservation($visitors_id)) {
      redirect(base_url('reservation/reservation_visitor_invalid'), 'refresh');
    }

    $data = array(
      '_js' => array('js/reservation.js'),
      'content_view' => 'reservation/reservation_visitor_view',
      'dates_available' => $this->get_dates_available(),
      'visitors_id' => $visitors_id,
    );

    $this->load->view('base_view', $data);
  }

  public function reservation_visitor_invalid()
  {
    $data = array(
      'content_view' => 'reservation/reservation_visitor_invalid_view',
    );

    $this->load->view('base_view', $data);
  }

  public function reservation_no_enough_attendees($visitors_id)
  {
    $data = array(
      'visitors_id' => $visitors_id,
      'content_view' => 'reservation/reservation_no_enough_attendees_view',
    );

    $this->load->view('base_view', $data);
  }

  private function visitor_can_not_create_a_reservation($visitors_id)
  {
    if ($this->is_not_valid_visitor($visitors_id)) return true;

    if ($this->visitor_has_reservation($visitors_id)) return true;

    return false;
  }

  private function is_not_valid_visitor($visitors_id)
  {
    $this->load->model('Visitors_model');
    $visitor = $this->Visitors_model->get_by_id($visitors_id);

    if ($visitor) return false;

    return true;
  }

  private function visitor_has_reservation($visitors_id)
  {
    $reservation = $this->Reservations_model->get_by_visitors_id($visitors_id);

    if ($reservation) return true;

    return false;
  }

  private function get_dates_available()
  {
    return $this->Dates_available_model->get_all_available();
  }

  public function available_hours_by_date($dates_available_id)
  {
    $hours_available = $this->get_hours_available_by_date($dates_available_id);

    $data = array(
      'dates_available_id' => $dates_available_id,
      'hours_available' => $hours_available,
    );

    $this->load->view('reservation/hours_available_by_date_view', $data);
  }

  private function get_hours_available_by_date($dates_available_id)
  {
    return $this->Hours_available_model->get_by_dates_available_id(
      $dates_available_id
    );
  }

  public function available_attendees_by_hour($hours_available_id)
  {
    $hours_available = $this->get_hours_available_by_id($hours_available_id);

    $max_total_attendees = $this->get_max_total_attendees_by_hour(
      $hours_available
    );

    $data = array(
      'hours_available_id' => $hours_available_id,
      'hours_available' => $hours_available,
      'max_total_attendees' => $max_total_attendees,
    );

    $this->load->view('reservation/available_attendees_by_hour_view', $data);
  }

  private function get_hours_available_by_id($hours_available_id)
  {
    return $this->Hours_available_model->get_by_id($hours_available_id);
  }

  private function get_max_total_attendees_by_hour($hours_available)
  {
    $attendees_available = $hours_available->attendees_available;

    return $attendees_available >= 4 ? 4 : $attendees_available;
  }

  public function create()
  {
    if (!$this->input->post()) {
      redirect(base_url('register'), 'refresh');
    }

    $total_attendees = $_POST['total_attendees'] + 1;

    if ($this->hour_is_not_available($_POST['hours_available_id'])) {
      $url = "reservation/reservation_not_available/{$_POST['visitors_id']}";
      redirect(base_url($url), 'refresh');
    }

    if ($this->visitor_has_reservation($_POST['visitors_id'])) {
      redirect(base_url('reservation/reservation_visitor_invalid'), 'refresh');
    }

    if ($this->hour_has_no_enough_attendees(array(
      'total_attendees' => $total_attendees,
      'hours_available_id' => $_POST['hours_available_id'],
    ))) {
      redirect(base_url("reservation/reservation_no_enough_attendees/{$_POST['visitors_id']}"), 'refresh');
    }

    $params = array(
      'visitors_id' => $_POST['visitors_id'],
      'total_attendees' => $total_attendees,
      'dates_available_id' => $_POST['dates_available_id'],
      'hours_available_id' => $_POST['hours_available_id'],
      'created_at' => date('Y-m-d H:i:s'),
    );

    $this->Reservations_model->create($params);

    $reservations_id = $this->db->insert_id();

    $this->update_attendees_available_for_date_and_hour(
      array(
        'dates_available_id' => $_POST['dates_available_id'],
        'hours_available_id' => $_POST['hours_available_id'],
        'total_attendees' => $total_attendees,
      )
    );

    redirect(base_url("reservation/confirm/$reservations_id"), 'refresh');
  }

  private function hour_has_no_enough_attendees($params)
  {
    $hour = $this->Hours_available_model->get_by_id(
      $params['hours_available_id']
    );

    if ($hour->attendees_available < $params['total_attendees']) return true;

    return false;
  }

  private function update_attendees_available_for_date_and_hour($params)
  {
    $total_attendees = $params['total_attendees'];
    $hours_available_id = $params['hours_available_id'];
    $dates_available_id = $params['dates_available_id'];

    $hour = $this->get_hours_available_by_id($hours_available_id);
    $this->Hours_available_model->update(
      array(
        'id' => $hours_available_id,
        'attendees_available' => $hour->attendees_available - $total_attendees
      )
    );

    $date = $this->Dates_available_model->get_by_id($dates_available_id);
    $this->Dates_available_model->update(
      array(
        'id' => $dates_available_id,
        'attendees_available' => $date->attendees_available - $total_attendees
      )
    );
  }

  private function hour_is_not_available($hours_available_id)
  {
    $hour = $this->get_hours_available_by_id($hours_available_id);

    if ($hour->attendees_available > 0) return false;

    return true;
  }

  public function reservation_not_available($visitors_id)
  {
    $data = array(
      'content_view' => 'reservation/reservation_not_available_view',
      'visitors_id' => $visitors_id,
    );

    $this->load->view('base_view', $data);
  }

  public function remember($reservations_id)
  {
    $data = array(
      'content_view' => 'reservation/reservation_remember_view',
      'reservations_id' => $reservations_id,
    );

    $this->load->view('base_view', $data);
  }

  public function confirm($reservations_id)
  {
    $reservation = $this->Reservations_model->get_by_id($reservations_id);

    if (!$reservation) {
      redirect(base_url('register'), 'refresh');
    }

    $data = array(
      'content_view' => 'reservation/reservation_confirm_view',
      'reservations_id' => $reservations_id,
      'qr_image_url' => $this->get_qr_image_url($reservations_id),
      'reservation' => $reservation,
      '_js' => array('js/reservation_confirm.js'),
    );

    $this->load->view('base_view', $data);
  }

  private function get_qr_image_url($reservations_id)
  {
    $validation_url = urlencode(base_url("admin/qr/read/$reservations_id"));
    $qr_url = "https://qrcode.tec-it.com/API/QRCode?data={$validation_url}&backcolor=%23ffffff&size=small&quietzone=1&errorcorrection=H";

    return $qr_url;
  }

  private function send_email($params)
  {
    $config = $this->get_email_config();

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('noreply@cheesyverse.com', "Cheesyverse");
    $this->email->to($params['email_to']);
    $this->email->subject($params['email_subject']);

    $data = isset($params['email_data']) ? $params['email_data'] : array();

    $view = "email/{$params['email_view']}";

    $body = $this->load->view($view, $data, TRUE);

    $this->email->message($body);

    return array(
      'send' => $this->email->send(),
      'logs' => $this->email->print_debugger()
    );
  }

  private function get_email_config()
  {
    return array(
      'protocol' => 'smtp',
      'smtp_host' => 'smtp-relay.sendinblue.com',
      'smtp_port' => 587,
      'smtp_user' => 'noreply@cheesyverse.com',
      'smtp_pass' => '8F9DWUtBAEgPGqzZ',
      'mailtype' => 'html'
    );
  }

  public function test($reservations_id)
  {
    $reservation = $this->Reservations_model->get_by_id($reservations_id);

    echo '<pre>';
    print_r($reservation);
    echo '</pre>';

    $send_email = $this->send_email(
      array(
        'email_to' => $reservation->email,
        'email_subject' => "¡CHEESYVERSE - Confirmación! {$reservation->date_label}, {$reservation->hour_label}",
        'email_data' => array(
          'date' => $reservation->date_label,
          'hour' => $reservation->hour_label,
          'total_attendees' => $reservation->total_attendees,
          'email' => $reservation->email,
          'fullname' => $reservation->fullname,
          'image_qr_code' => $this->get_qr_image_url($reservations_id),
        ),
        'email_view' => 'email_reservation_view',
      )
    );

    echo '<pre>';
    print_r($send_email);
    echo '</pre>';
  }

  // public function increase()
  // {
  //   $params = array(
  //     'start_date' => '2022-10-07',
  //     'end_date' => '2022-10-08',
  //   );
  //   $hours = $this->Hours_available_model->get_by_date_range($params);

  //   foreach ($hours as $hour) {
  //     $attendees_available = $hour->attendees_available + 80;

  //     $data = array(
  //       'id' => $hour->id,
  //       'attendees_available' => $attendees_available,
  //     );

  //     $this->Hours_available_model->update($data);
  //   }

  //   $hours = $this->Hours_available_model->get_all();

  //   $data = array(
  //     'hours' => $hours,
  //   );

  //   $this->load->view('reservation/reservation_increase_view', $data);
  // }
}
