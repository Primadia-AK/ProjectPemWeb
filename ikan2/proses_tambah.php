<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_ikan = $_POST['nama_ikan'];
    $kategori = $_POST['kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $gambar = $_FILES['gambar_ikan']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);
    $uploadOk = 1;

    // Validasi gambar
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Hanya file JPG, JPEG, & PNG yang diizinkan.";
        $uploadOk = 0;
    }

    if ($_FILES["gambar_ikan"]["size"] > 2000000) { // Maksimal 2MB
        echo "Ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar_ikan"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO produk (nama_ikan, kategori, harga_beli, harga_jual, gambar) 
                    VALUES ('$nama_ikan', '$kategori', '$harga_beli', '$harga_jual', '$gambar')";
            if (mysqli_query($koneksi, $sql)) {
                echo "Produk berhasil ditambahkan!";
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Terjadi kesalahan saat mengupload file.";
        }
    }
}
?>
