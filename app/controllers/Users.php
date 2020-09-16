<?php
class Users extends Controller
{
  public function __construct()
  {
    
  }

  public function register()
  {
    // Check for POST
    if($_SERVER['request_method'] == 'POST') {
      // Process the form
    } else {
      // Init data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }
}