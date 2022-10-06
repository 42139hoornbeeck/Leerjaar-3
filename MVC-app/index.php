<?php
session_start();

error_reporting(E_ERROR);

require_once('config/config.php');
require_once('config/database.php');
require_once('route.php');

// start routing
$route = new Route();
$route->start();
