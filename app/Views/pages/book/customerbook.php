<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecoland</title>
</head>

<body>
    <table border="1">
        <thead>
            <th>Nama Items</th>
            <th>Tanggal Start</th>
            <th>Tanggal End</th>
            <th>Status Booking</th>
        </thead>
        <tbody>
            <?php foreach ($booking as $booking) : ?>
                <tr>
                    <td><?= $booking['items_name'] ?></td>
                    <td><?= $booking['booking_date_start'] ?></td>
                    <td><?= $booking['booking_date_stop'] ?></td>
                    <td><?= $booking['booking_status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url() ?>">Halaman Utama</a>
</body>

</html>