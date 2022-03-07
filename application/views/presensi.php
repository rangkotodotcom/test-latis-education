<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Guru</th>
                            <th>Tanggal Presensi</th>
                            <th>Detail Hari</th>
                            <th>Total Hari Mengajar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        if (!empty($presensi)) : foreach ($presensi as $row) : ?>

                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['name_siswa']; ?></td>
                                    <td><?= $row['name_guru']; ?></td>
                                    <td><?= $row['created_at']; ?></td>
                                    <td>
                                        <?php foreach ($row['total_hari'] as $total_hari) : ?>

                                            <?= $total_hari['tgl_ajar']; ?>,

                                        <?php endforeach; ?>
                                    </td>
                                    <td><?= $row['jumlah_hari']; ?></td>
                                </tr>

                        <?php endforeach;
                        endif; ?>
                    <tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>