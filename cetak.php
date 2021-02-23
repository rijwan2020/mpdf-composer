<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'config.php';

$data = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="print.css">
    <title>Daftar Member</title>
</head>
<body>
    <h1>Daftar Member</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
        </tr>';
$query = $db->query("SELECT * FROM members");
$no = 1;
while ($row = $query->fetch_object()) {
    $data .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . $row->name . '</td>
        <td>' . $row->address . '</td>
        <td>' . $row->email . '</td>
    </tr>
    ';
}

$data .= ' </table>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($data);
$mpdf->Output('Daftar-Member.pdf', \Mpdf\Output\Destination::INLINE);
?>

