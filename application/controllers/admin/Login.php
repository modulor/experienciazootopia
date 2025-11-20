<?php

class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->is_user_login())
      redirect(base_url('admin/reservations'), 'refresh');

    if ($this->input->post('email'))
      $this->try_to_login();
    else {
      $data['reservations_id'] = isset($_GET['reservations_id']) ? $_GET['reservations_id'] : '';
      $this->load->view('admin/login_view', $data);
    }
  }

  private function is_user_login()
  {
    $user_session = $this->session->all_userdata();

    if (isset($user_session['login']) && $user_session['login'] == TRUE)
      return true;

    return false;
  }

  public function try_to_login()
  {
    if ($this->is_login_form_valid()) {
      $login = $this->validate_login_credentials($this->input->post());

      if ($login['success'])
        $this->grant_access_to_application($login);
      else
        $this->display_error_access_not_allowed($login);
    } else
      $this->load->view('admin/login_view');
  }

  private function is_login_form_valid()
  {
    $login_rules = $this->config_login_rules();

    $this->form_validation->set_rules($login_rules);

    return $this->form_validation->run();
  }

  private function validate_login_credentials($form)
  {
    $user_session = array(
      'success' => false,
      'message' => 'Correo electrónico y/o contraseña incorrecto(s)'
    );

    if ($form['email'] == 'privacidad@experienciazootopia.com' && $form['password'] == '1q2w3e') {
      $user_session = array(
        'login' => true,
        'success' => true
      );
    }

    return $user_session;
  }

  private function config_login_rules()
  {
    $config = array(
      array(
        'field' => 'email',
        'label' => 'Correo electrónico',
        'rules' => 'trim|required',
        'errors' => array('required' => '%s es obligatorio')
      ),
      array(
        'field' => 'password',
        'label' => 'Contraseña',
        'rules' => 'trim|required',
        'errors' => array('required' => '%s es obligatorio')
      )
    );

    return $config;
  }

  private function grant_access_to_application($login)
  {
    $this->session->set_userdata($login);

    if ($_POST['reservations_id'] != '') {
      redirect(base_url("admin/qr/read/{$_POST['reservations_id']}"));
    }
    redirect(base_url('admin/reservations'));
  }

  private function display_error_access_not_allowed($login)
  {
    $data['error_login'] = $login['message'];

    $this->load->view('admin/login_view', $data);
  }
}
