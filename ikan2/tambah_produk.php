<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Jual Beli Ikan Hias</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            text-transform: uppercase;
            color: #2E5077;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .base {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #2E5077;
            outline: none;
        }

        button {
            background-color: #2E5077;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #ff7f7f;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Tambah Produk Ikan Hias</h1>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        <section class="base">
            <div>
                <label>Nama Ikan</label>
                <input type="text" name="nama_ikan" placeholder="Contoh: Ikan Cupang" required>
            </div>
            <div>
                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="Air Tawar">Air Tawar</option>
                    <option value="Air Laut">Air Laut</option>
                </select>
            </div>
            <div>
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" placeholder="Masukkan harga beli" required>
            </div>
            <div>
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" placeholder="Masukkan harga jual" required>
            </div>
            <div>
                <label>Gambar Produk</label>
                <input type="file" name="gambar_ikan" accept=".jpg,.jpeg,.png" required>
            </div>
            <div>
                <button type="submit">Simpan Produk</button>
            </div>
        </section>
    </form>
</body>
</html>
