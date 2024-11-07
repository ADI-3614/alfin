<?php
include "../koneksi.php";

// Pastikan bahwa metode pengiriman adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nm_lengkap = mysqli_real_escape_string($koneksi, $_POST['nm_lengkap']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tanggal = date('Y-m-d H:i:s');

$kirim_form = mysqli_query($koneksi, "INSERT INTO pesan (nm_lengkap, email, pesan, tanggal) VALUES ('$nm_lengkap', '$email', '$pesan', '$tanggal')");

    if ($kirim_form) {
        echo "<script>
        alert('Pesan Berhasil Dikirim');
        window.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Pesan Gagal Dikirim: " . mysqli_error($koneksi) . "');
        window.location.href='kirim_form.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Metode pengiriman tidak valid.');
    window.location.href='kirim_form.php';
    </script>";
}
?>