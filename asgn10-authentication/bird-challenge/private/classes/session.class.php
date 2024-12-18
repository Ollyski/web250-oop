<?php

class Session
{
  private $member_id;
  public $username;
  public function __construct()
  {
    session_start(); // turn on sessions if needed
    $this->check_stored_login();
  }

  public function login($member)
  {
    if ($member) {
      //prevent session fixation attacks
      session_regenerate_id();
      $_SESSION['member_id'] = $member->id; // Store member ID in the session
      $_SESSION['username'] = $member->username; // Store username in the session

      // Assign to the class properties
      $this->member_id = $member->id;
      $this->username = $member->username;
    }
    return true;
  }

  public function is_logged_in()
  {
    return isset($this->member_id);
  }

  public function logout()
  {
    unset($_SESSION['member_id']);
    unset($_SESSION['username']);
    unset($this->member_id);
    unset($this->username);
    return true;
  }

  private function check_stored_login()
  {
    if (isset($_SESSION['member_id'])) { // Check for 'member_id'
      $this->member_id = $_SESSION['member_id'];
      $this->username = $_SESSION['username'] ?? null; // Use null coalescing to avoid warnings
    } else {
      $this->member_id = null;
      $this->username = null; // Clear username if session key is missing
    }
  }
}
