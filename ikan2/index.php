<?php
include('koneksi.php'); // Hubungkan ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Jual Beli Ikan Hias</title>
    <style>
        * {
            font-family: "Helvetica", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f4f7fc;
            color: #333;
        }

        h1 {
            text-transform: uppercase;
            color: #2E5077;
            margin-top: 30px;
            text-align: center;
            font-size: 2.5rem;
        }

        .container {
            width: 85%;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table thead th {
            background-color: #2E5077;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 1rem;
        }

        table tbody td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 1rem;
            color: #555;
        }

        table tbody td img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        a {
            display: inline-block;
            background-color: #2E5077;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #ff7f7f;
        }

        .add-button {
            margin: 20px auto;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Produk Ikan Hias</h1>

        <div class="add-button">
            <a href="tambah_produk.php">Tambah Produk</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ikan</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data produk dari database
                    $sql = "SELECT * FROM produk";
                    $result = mysqli_query($koneksi, $sql);

                    // Periksa apakah query berhasil
                    if (!$result) {
                        die("Query Error: " . mysqli_error($koneksi));
                    }

                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama_ikan'] . "</td>";
                        echo "<td>" . $row['kategori'] . "</td>";
                        echo "<td>Rp " . number_format($row['harga_beli'], 0, ',', '.') . "</td>";
                        echo "<td>Rp " . number_format($row['harga_jual'], 0, ',', '.') . "</td>";
                        echo "<td><img src='uploads/" . $row['gambar'] . "' alt='" . $row['nama_ikan'] . "'></td>";
                        echo "<td>
                                <a href='edit_produk.php?id=" . $row['id'] . "'>Edit</a> | 
                                <a href='hapus_produk.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus produk ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
