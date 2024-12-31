<?php
include('koneksi.php'); // Hubungkan ke database

// Cek jika parameter id ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan ID valid (misalnya harus angka)
    if (!is_numeric($id)) {
        die("ID tidak valid.");
    }

    // Query untuk mendapatkan data produk berdasarkan ID
    $sql = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    // Cek jika query berhasil dijalankan
    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    // Ambil data produk jika ada
    $row = mysqli_fetch_assoc($result);

    // Jika data tidak ditemukan
    if (!$row) {
        die("Produk dengan ID $id tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan.");
}

// Proses jika form disubmit (untuk update data)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_ikan = $_POST['nama_ikan'];
    $kategori = $_POST['kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $foto_lama = $_POST['foto_lama'];

    // Jika ada gambar baru yang diupload
    if ($_FILES["gambar"]["name"]) {
        // Hapus foto lama jika ada
        if (file_exists("uploads/" . $foto_lama)) {
            unlink("uploads/" . $foto_lama);
        }

        // Upload gambar baru
        $gambar = time() . "_" . basename($_FILES["gambar"]["name"]);
        $target = "uploads/" . $gambar;
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target);
    } else {
        $gambar = $foto_lama; // Gunakan gambar lama jika tidak ada upload baru
    }

    // Update produk di database
    $sql_update = "UPDATE produk SET nama_ikan = '$nama_ikan', kategori = '$kategori', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar = '$gambar' WHERE id = $id";

    if (mysqli_query($koneksi, $sql_update)) {
        echo "Produk berhasil diupdate.";
        header("Location: index.php"); // Redirect ke halaman utama
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk Ikan Hias</h1>
    <form action="edit_produk.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <label>Nama Ikan:</label><br>
        <input type="text" name="nama_ikan" value="<?php echo $row['nama_ikan']; ?>" required><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>" required><br><br>

        <label>Harga Beli:</label><br>
        <input type="number" name="harga_beli" value="<?php echo $row['harga_beli']; ?>" required><br><br>

        <label>Harga Jual:</label><br>
        <input type="number" name="harga_jual" value="<?php echo $row['harga_jual']; ?>" required><br><br>

        <label>Gambar Lama:</label><br>
        <img src="uploads/<?php echo $row['gambar']; ?>" width="100"><br><br>
        <input type="hidden" name="foto_lama" value="<?php echo $row['gambar']; ?>">

        <label>Ganti Gambar (Opsional):</label><br>
        <input type="file" name="gambar"><br><br>

        <input type="submit" value="Update Produk">
    </form>
</body>
</html>
