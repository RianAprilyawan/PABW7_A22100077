<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'data mahasiswa');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['Nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['Jurusan']);
  $gambar = htmlspecialchars($data['Gambar']);
  $query = "INSERT INTO
              mahasiswa
            VALUES
            (null '$nama', '$nim', '$email', '$jurusan' '$gambar');
          ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
