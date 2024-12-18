<?php

class Session
{
  private $member_id;
  public $username;
  public $last_login;
  public $user_level;

  public const MAX_LOGIN_AGE = 60 * 60 * 24;

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
      $_SESSION['last_login'] = $member->last_login; // Store username in the session
      $_SESSION['user_level'] = $member->user_level; // Store username in the session


      // Assign to the class properties
      $this->member_id = $member->id;
      $this->username = $member->username;
      $this->last_login = $member->last_login;
      $this->user_level = $member->user_level;
    }
    return true;
  }

  public function is_logged_in()
  {
    return isset($this->member_id) && $this->last_login_is_recent();
  }

  public function is_admin_logged_in()
  {
    return $this->is_logged_in() && $this->user_level == 'a';
  }


  public function logout()
  {
    unset($_SESSION['member_id']);
    unset($_SESSION['username']);
    unset($_SESSION['last_login']);
    unset($_SESSION['user_level']);
    unset($this->member_id);
    unset($this->username);
    unset($this->last_login);
    unset($this->user_level);
    return true;
  }

  private function check_stored_login()
  {
    if (isset($_SESSION['member_id'])) { // Check for 'member_id'
      $this->member_id = $_SESSION['member_id'];
      $this->username = $_SESSION['username'] ?? null; // Use null coalescing to avoid warnings
      $this->last_login = $_SESSION['last_login'];
      $this->user_level = $_SESSION['user_level'];
    } else {
      $this->member_id = null;
      $this->username = null; // Clear username if session key is missing
      $this->last_login = null;
      $this->user_level = null;
    }
  }

  private function last_login_is_recent()
  {
    if (!isset($this->last_login)) {
      return false;
    } elseif (($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  public function message($msg = "")
  {
    if (!empty($msg)) {
      // Then this is a "set" message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      // Then this is a "get" message
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message()
  {
    unset($_SESSION['message']);
  }
}
