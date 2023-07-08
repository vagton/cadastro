<?php
use App\Controllers\Base;
session_start();
session_destroy();
require_once __DIR__ . '/../src/Controllers/Base.php';
unset($_SESSION);
$_SESSION = null;
Base::redirect("login");
?> 