<?php

session_start();

$env = parse_ini_file('.env');

require('config.php');
require('functions.php');
require('routes.php');
require('execute_routes.php');