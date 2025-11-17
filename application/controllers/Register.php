<?php

class Register extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array(
      '_js' => array('js/register.js'),
      '_css' => array('register.css'),
      'content_view' => 'register/register_index_view',
    );

    $this->load->view('base_view', $data);
  }

  public function create()
  {
    if (!$this->input->post()) {
      redirect(base_url('register'), 'refresh');
    }

    if ($this->registrationFormInValid()) {
      $this->showRegistrationError();
    }

    if ($this->emailAlreadyRegistered() && $this->emailHasAReservation()) {
      $this->redirectToReservationConfirmation();
    }

    if ($this->emailAlreadyRegistered() && !$this->emailHasAReservation()) {
      $this->redirectToReservation();
    }

    $data = array(
      'email' => $_POST['email'],
      'fullname' => $_POST['fullname'],
      'created_at' => date('Y-m-d H:i:s'),
    );
    $this->load->model('Visitors_model');
    $this->Visitors_model->create($data);
    $visitors_id = $this->db->insert_id();

    redirect(base_url("reservation/visitor/$visitors_id"), 'refresh');
  }

  public function email_registered()
  {
    $data['content_view'] = 'register/register_email_registered_view';

    $this->load->view('base_view', $data);
  }

  public function register_error()
  {
    $data['content_view'] = 'register/register_error_view';

    $this->load->view('base_view', $data);
  }

  private function emailAlreadyRegistered()
  {
    $this->load->model('Visitors_model');
    $email = $this->Visitors_model->get_by_email($_POST['email']);

    if ($email) return true;

    return false;
  }

  private function emailHasAReservation()
  {
    $this->load->model('Reservations_model');
    $reservation = $this->Reservations_model->get_by_email($_POST['email']);

    if ($reservation) return true;

    return false;
  }

  private function redirectToReservation()
  {
    $this->load->model('Visitors_model');
    $visitor = $this->Visitors_model->get_by_email($_POST['email']);

    redirect(base_url("reservation/visitor/{$visitor->id}"), 'refresh');
  }

  private function redirectToReservationConfirmation()
  {
    $this->load->model('Reservations_model');
    $reservation = $this->Reservations_model->get_by_email($_POST['email']);

    redirect(base_url("reservation/confirm/{$reservation->id}"), 'refresh');
  }

  private function registrationFormInValid()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email|max_length[300]');
    $this->form_validation->set_rules('fullname', 'Nombre completo', 'required|max_length[200]');
    $this->form_validation->set_rules('terms', 'Términos y Condiciones', 'required');
    $this->form_validation->set_rules('privacy', 'Aviso de Privacidad', 'required');
    $this->form_validation->set_rules('adult', 'Mayor de edad', 'required');

    if ($this->form_validation->run() == false) {
      return true;
    }

    return false;
  }

  private function showRegistrationError()
  {
    redirect(base_url('register/register_error'), 'refresh');
  }
}
