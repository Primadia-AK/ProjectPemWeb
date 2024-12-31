<?php
include('koneksi.php'); // Hubungkan ke database
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Beli Ikan Hias</title>
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

        header {
            background: linear-gradient(to right, #2E5077, #4A90E2);
            color: white;
            padding: 50px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        header:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30px;
            background: white;
            clip-path: ellipse(150% 50% at 50% 100%);
        }

        header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        header p {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .btn-start {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff7f7f;
            color: white;
            font-size: 1.2rem;
            border-radius: 25px;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .btn-start:hover {
            background-color: #ff4f4f;
        }

        footer {
            background-color: #2E5077;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
        }

        footer p {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang di Jual Beli Ikan Hias</h1>
        <p>Temukan ikan hias terbaik untuk memperindah akuarium Anda</p>
        <!-- Tombol Lihat Produk mengarah ke index.php -->
        <a href="index.php" class="btn-start">Lihat Produk</a>
    </header>

    <footer>
        <p>&copy; 2024 Jual Beli Ikan Hias. Semua hak dilindungi punya jihan ga usah.</p>
    </footer>
</body>
</html>
