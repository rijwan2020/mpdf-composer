<?php
$db = new mysqli('localhost', 'root', '', 'latihan_composer');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }