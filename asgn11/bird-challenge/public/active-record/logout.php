<?php
require_once('../../private/initialize.php');

// Log out the admin
$session->logout($member);

redirect_to(url_for('/active-record/login.php'));
