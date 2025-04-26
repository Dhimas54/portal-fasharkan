<?php
header('Content-Type: application/json');
include('../includes/config.php');

// Inisialisasi
$total = 0;
$data = [
    'puas' => 0,
    'cukup' => 0,
    'tidak' => 0
];

// Ambil data dari DB
$query = mysqli_query($con, "SELECT vote_type, COUNT(*) as jumlah FROM tblvote WHERE vote_type IS NOT NULL GROUP BY vote_type");

while ($row = mysqli_fetch_assoc($query)) {
    $type = $row['vote_type'];
    $count = (int)$row['jumlah'];
    if (isset($data[$type])) {
        $data[$type] = $count;
        $total += $count;
    }
}

// Hitung persen
$percentages = [
    'total' => $total,
    'puas' => $total > 0 ? round(($data['puas'] / $total) * 100) : 0,
    'cukup' => $total > 0 ? round(($data['cukup'] / $total) * 100) : 0,
    'tidak' => $total > 0 ? round(($data['tidak'] / $total) * 100) : 0,
];

echo json_encode($percentages);
exit;
