<?php
require_once 'Baju.php';

session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        new Baju("P001", "Sweater Hewan", 89000, 15, "sweater.jpg", "Pakaian", "Wol", "Merah", "Anjing", "S", "PettyPaw"),
        new Baju("P002", "Jaket Musim Dingin", 120000, 10, "jaket.jpg", "Pakaian", "Katun", "Biru", "Kucing", "M", "CatStyle"),
        new Baju("P003", "Kostum Halloween", 75000, 20, "kostum.jpg", "Kostum", "Polyester", "Hitam", "Anjing", "L", "DoggyFashion"),
        new Baju("P004", "Raincoat", 95000, 12, "raincoat.jpg", "Pakaian", "Waterproof", "Kuning", "Anjing", "M", "PettyPaw"),
        new Baju("P005", "Tuxedo Hewan", 150000, 8, "tuxedo.jpg", "Formal", "Satin", "Hitam", "Kucing", "S", "LuxPet")
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    $foto_produk = "default.jpg"; 
    
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    if (isset($_FILES["foto_produk"]) && $_FILES["foto_produk"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
        if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
            $foto_produk = basename($_FILES["foto_produk"]["name"]);
        }
    }
    
    $newProduct = new Baju(
        $_POST['id'],
        $_POST['nama_produk'],
        (double)$_POST['harga_produk'],
        (int)$_POST['stok_produk'],
        $foto_produk,
        $_POST['jenis'],
        $_POST['bahan'],
        $_POST['warna'],
        $_POST['untuk'],
        $_POST['size'],
        $_POST['merk']
    );

    $_SESSION['products'][] = $newProduct;

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1, h2 {
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .product-table th {
            background-color:rgb(233, 150, 189);
            color: white;
        }
        .product-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .product-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: rgb(233, 150, 189);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(233, 150, 189);
        }
        .product-image {
            max-width: 100px;
            max-height: 100px;
        }
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            margin-bottom: 20px;
        }
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }
        .tab button:hover {
            background-color: #ddd;
        }
        .tab button.active {
            background-color: rgb(233, 150, 189);
            color: white;
        }
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
        .active-tab {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PET SHOP MANAGEMENT SYSTEM</h1>
        
        <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'ProductList')">Daftar Produk</button>
            <button class="tablinks" onclick="openTab(event, 'AddProduct')">Tambah Produk</button>
        </div>
        
        <div id="ProductList" class="tabcontent active-tab">
            <h2>DAFTAR PRODUK BAJU HEWAN</h2>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Jenis</th>
                        <th>Bahan</th>
                        <th>Warna</th>
                        <th>Untuk</th>
                        <th>Size</th>
                        <th>Merk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $product): ?>
                    <tr>
                        <td><?php echo $product->get_id(); ?></td>
                        <td>
                            <img src="uploads/<?php echo $product->get_foto_produk(); ?>" 
                                 alt="<?php echo $product->get_nama_produk(); ?>" 
                                 class="product-image">
                        </td>
                        <td><?php echo $product->get_nama_produk(); ?></td>
                        <td>Rp <?php echo number_format($product->get_harga_produk(), 2, ',', '.'); ?></td>
                        <td><?php echo $product->get_stok_produk(); ?></td>
                        <td><?php echo $product->get_jenis(); ?></td>
                        <td><?php echo $product->get_bahan(); ?></td>
                        <td><?php echo $product->get_warna(); ?></td>
                        <td><?php echo $product->get_untuk(); ?></td>
                        <td><?php echo $product->get_size(); ?></td>
                        <td><?php echo $product->get_merk(); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div id="AddProduct" class="tabcontent">
            <h2>TAMBAH PRODUK BARU</h2>
            <form class="product-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" id="id" name="id" required>
                </div>
                
                <div class="form-group">
                    <label for="nama_produk">Nama Produk:</label>
                    <input type="text" id="nama_produk" name="nama_produk" required>
                </div>
                
                <div class="form-group">
                    <label for="harga_produk">Harga Produk:</label>
                    <input type="number" id="harga_produk" name="harga_produk" min="0" step="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="stok_produk">Stok Produk:</label>
                    <input type="number" id="stok_produk" name="stok_produk" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="foto_produk">Foto Produk:</label>
                    <input type="file" id="foto_produk" name="foto_produk" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label for="jenis">Jenis:</label>
                    <input type="text" id="jenis" name="jenis" required>
                </div>
                
                <div class="form-group">
                    <label for="bahan">Bahan:</label>
                    <input type="text" id="bahan" name="bahan" required>
                </div>
                
                <div class="form-group">
                    <label for="warna">Warna:</label>
                    <input type="text" id="warna" name="warna" required>
                </div>
                
                <div class="form-group">
                    <label for="untuk">Untuk:</label>
                    <input type="text" id="untuk" name="untuk" required>
                </div>
                
                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" id="size" name="size" required>
                </div>
                
                <div class="form-group">
                    <label for="merk">Merk:</label>
                    <input type="text" id="merk" name="merk" required>
                </div>
                
                <button type="submit">Tambah Produk</button>
            </form>
        </div>
    </div>
    
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                tabcontent[i].classList.remove("active-tab");
            }
            
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            
            document.getElementById(tabName).style.display = "block";
            document.getElementById(tabName).classList.add("active-tab");
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>