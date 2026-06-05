<?php

$koneksi = mysqli_connect("localhost", "root", "root", "ifpshweekly");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Informatika</title>
</head>
<body>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>

    <br>
    <hr>

    <h2>Data Mahasiswa</h2>

    <a href="tambahdata.php">
        <button>Tambah Data</button>
    </a>

    <br><br>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($mhs = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['nim']; ?></td>
                <td><?= $mhs['jurusan']; ?></td>
                <td><?= $mhs['email']; ?></td>
                <td><?= $mhs['no_hp']; ?></td>
                <td>
                    <img src="assets/img/<?= $mhs['foto']; ?>" alt="foto" width="60">
                </td>
                <td>
                    <a href="ubah.php?id=<?= $mhs['id']; ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

    <br>
    <hr>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td colspan="2" rowspan="2" align="center">?</td>
            <td>2,4</td>
        </tr>
        <tr>
            <td>3,1</td>
            <td>3,4</td>
        </tr>
        <tr>
            <td>4,1</td>
            <td>4,2</td>
            <td>4,3</td>
            <td>4,4</td>
        </tr>
    </table>

</body>
</html>