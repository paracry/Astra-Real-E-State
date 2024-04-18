<?php
session_start();
$agent_id = $_SESSION['agent_id'];
$_SESSION[$agent_id . 'full_name'] = $_POST['full_name'];
$_SESSION[$agent_id . 'email'] = $_POST['email'];
$_SESSION[$agent_id . 'phone_number'] = $_POST['phone_number'];
$_SESSION[$agent_id . 'state'] = $_POST['state'];
$_SESSION[$agent_id . 'area'] = $_POST['area'];
$_SESSION[$agent_id . 'website'] = $username = isset($_POST['website']) ? $_POST['website'] : 'Not Available';
$_SESSION[$agent_id . 'experience'] = $_POST['experience'];
$_SESSION[$agent_id . 'image'] = file_get_contents($_FILES['image']['tmp_name']);

header("Location: agent password.html");
?>