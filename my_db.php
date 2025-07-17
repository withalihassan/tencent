<?php
// File: my_db.php

// Database connection settings
define('DB_HOST', 'database-1.ct22ws4u0c7g.me-central-1.rds.amazonaws.com');
define('DB_USER', 'admin');
define('DB_PASS', 'sLoGMCVfEo4TpMGOEm18');
define('DB_NAME', 'tencent_mine');

// Create connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}
?>