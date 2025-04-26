<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include('../includes/config.php');

function getUserIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'];
}

$ip_address = getUserIP();
$cookie_id = isset($_POST['cookie_id']) ? mysqli_real_escape_string($con, $_POST['cookie_id']) : '';

// Ambil data lama dulu (cek apakah sudah ada entri dari user ini)
$cek = mysqli_query($con, "SELECT * FROM tblvote WHERE ip_address='$ip_address' AND cookie_id='$cookie_id'");
$existing = mysqli_fetch_assoc($cek);
$response = [];

if ($existing) {
    // Cek dan update saran
    if (isset($_POST['saran'])) {
        $saran = mysqli_real_escape_string($con, $_POST['saran']);
        if (empty($existing['isi_saran'])) {
            $update = mysqli_query($con, "UPDATE tblvote SET isi_saran='$saran' WHERE id={$existing['id']}");
            $response['saran'] = $update ? "saran_success" : "saran_error";
        } else {
            $response['saran'] = "saran_already";
        }
    }

    // Cek dan update vote
    if (isset($_POST['vote_type'])) {
        $vote_type = mysqli_real_escape_string($con, $_POST['vote_type']);
        if (empty($existing['vote_type'])) {
            $update = mysqli_query($con, "UPDATE tblvote SET vote_type='$vote_type' WHERE id={$existing['id']}");
            $response['vote'] = $update ? "success" : "error";
        } else {
            $response['vote'] = "already_voted";
        }
    }
} else {
    // INSERT JIKA BELUM ADA RECORD
    $saran = isset($_POST['saran']) ? mysqli_real_escape_string($con, $_POST['saran']) : '';
    $vote_type = isset($_POST['vote_type']) ? mysqli_real_escape_string($con, $_POST['vote_type']) : '';

    if ($saran || $vote_type) {
        $insert = mysqli_query($con, "INSERT INTO tblvote(ip_address, cookie_id, vote_type, isi_saran) VALUES('$ip_address', '$cookie_id', '$vote_type', '$saran')");
        if (!$insert) {
            $response['saran'] = "saran_error";
            $response['error_msg'] = mysqli_error($con); // optional
        } else {
            $response['saran'] = "saran_success";
        }
    }
}

// Return respon
echo json_encode($response);
exit;
