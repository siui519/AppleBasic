<?php
    session_start();
    // var_dump($_SESSION['username']);
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit(); // Terminate script execution after the redirect
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='CSS/Style.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="sidenav">
        <a href = 'Homepage.php'>Homepage</a>
        <button class="dropdown-btn">Master
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href = 'Master/Satuan.php'>Satuan</a>
            <a href = 'Master/Barang.php'>Barang</a>
            <a href = 'Master/Supplier.php'>Supplier</a>
            <a href = 'Master/Customer.php'>Customer</a>
        </div>
        <a href = 'Transaksi/Pembelian.php'>Pembelian</a>
        <a href = 'Transaksi/Hutang.php'>Hutang</a>
        <a href = 'Transaksi/Penjualan.php'>Penjualan</a>
        <a href = 'Transaksi/Piutang.php'>Piutang</a>
        <button class="dropdown-btn">Laporan
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href = 'Laporan/LStok.php'>Stok</a>
            <a href = 'Laporan/LBeli.php'>Pembelian</a>
            <a href = 'Laporan/LHutang.php'>Hutang</a>
            <a href = 'Laporan/LJual.php'>Penjualan</a>
            <a href = 'Laporan/LPiutang.php'>Piutang</a>
        </div>
        <button class="dropdown-btn">Setting
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href = 'System/Users.php'>Master User</a>
            <a href = 'System/LvlManager.php'>Level Manager</a>
        </div>
        <a href = 'Logout.php'>Log Out</a>
    </div>
    <div class="main-row">
        <p class = 'label_user'>Selamat Datang User <?php echo $_SESSION['username']?> </p>
        <div class='clock' id='dc'></div>  
        <div class='dH' id='day_year'></div>
    </div>
    <div class="main-row">
        <h1 class="aside-header-title">Dashboard</h1> 
    </div>   
    <div class="main">
        <div class="flex-container">
            <div>1</div>
            <div>2</div>
            <div>3</div>  
            <div>4</div>
        </div>
    </div>

    <script src="scripts/Dropdown_Menu_Script.js"></script>
    <script src="scripts/Digital_Time_Script.js"></script>
</body>
</html> 