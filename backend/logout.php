<?php
namespace Tester;
require 'config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");