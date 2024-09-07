<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Laporan Peminjaman Buku</title>
</head>
<body>
  <h3><center>DAFTAR LAPORAN BUKU</center></h3>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Judul Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggat Pengembalian</th>
        <th>Tanggal Dikembalikan</th>
        <th>Satus Buku</th>
      </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($peminjaman as $row){?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row['nama_lengkap']?></td>
            <td><?= $row['judul']?></td>
            <td><?= $row['tgl_peminjaman']?></td>
            <td><?= $row['lama_pinjam']?></td>
            <td><?= $row['tgl_pengembalian']?></td>
            <td><?= $row['status']?></td>
        </tr>
        <?php $no++; } ?>
    </tbody>
  </table>
</body>
</html>