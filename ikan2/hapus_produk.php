<?php
include('koneksi.php'); // Hubungkan ke database

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan ID adalah angka
    if (!is_numeric($id)) {
        die("ID tidak valid.");
    }

    // Query untuk mengambil data produk berdasarkan ID
    $sql = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    // Cek apakah query berhasil dijalankan
    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    // Ambil data produk
    $row = mysqli_fetch_assoc($result);

    // Jika data tidak ditemukan
    if (!$row) {
        die("Produk dengan ID $id tidak ditemukan.");
    }

    // Hapus produk dari database
    $sql_hapus = "DELETE FROM produk WHERE id = $id";
    if (mysqli_query($koneksi, $sql_hapus)) {
        // Hapus file gambar terkait
        if (file_exists("uploads/" . $row['gambar'])) {
            unlink("uploads/" . $row['gambar']);
        }

        echo "Produk berhasil dihapus.";
        header("Location: index.php"); // Redirect ke halaman daftar produk setelah penghapusan
        exit;
    } else {
        die("Error: " . mysqli_error($koneksi));
    }
} else {
    die("ID tidak ditemukan.");
}
?>
