<?php
require_once 'vendor/autoload.php';
require 'config.php';

$faker = Faker\Factory::create('id_ID');

$db->query('TRUNCATE members');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faker</title>
</head>
<body>
    <h3>Daftar Member</h3>
    <a href="cetak.php" target="_blank">Cetak</a>
    <ul>
        <?php
        for ($i=1; $i <= 10; $i++) { 
            $name = $faker->name;
            $email = $faker->email;
            $address = $faker->address;
            $query = "INSERT INTO members (name, email, address) values ('$name', '$email', '$address')";
            $db->query($query)
            ?>
            <li><?= $name ?> - <?= $email ?></li>
            <?php
        }
        ?>
    </ul>
</body>
</html>