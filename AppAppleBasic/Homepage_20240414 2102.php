<?php
session_start();
if(!$_SESSION['isLogged']) {
  header("location:login.php"); 
  die(); 
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='CSS/Style.css'>
</head>
<body>
    <ul class = 'side-menu '>
        <li class="dropdown">
            <a href = 'Homepage.php' class="dropbtn">Homepage</a>
        </li>
        <li class="dropdown">
            <a class="dropbtn">Master</a>
            <div class="dropdown-content">
            <a href = 'Master/Satuan.php'>Satuan</a>
            <a href = 'Master/Barang.php'>Barang</a>
            <a href = 'Master/Supplier.php'>Supplier</a>
            <a href = 'Master/Customer.php'>Customer</a>
            </div>
        </li>
        <li class="dropdown">
            <a href = 'Transaksi/Pembelian.php' class="dropbtn">Pembelian</a>
        </li>
        <li class="dropdown">
            <a href = 'Transaksi/Hutang.php' class="dropbtn">Hutang</a>
        </li>
        <li class="dropdown">
            <a href = 'Transaksi/Penjualan.php' class="dropbtn">Penjualan</a>
        </li>
        <li class="dropdown">
            <a href = 'Transaksi/Piutang.php' class="dropbtn">Piutang</a>
        </li>
        <li class="dropdown">
            <a class="dropbtn">Laporan</a>
            <div class="dropdown-content">
            <a href = 'Laporan/LStok.php'>Stok</a>
            <a href = 'Laporan/LBeli.php'>Pembelian</a>
            <a href = 'Laporan/LHutang.php'>Hutang</a>
            <a href = 'Laporan/LJual.php'>Penjualan</a>
            <a href = 'Laporan/LPiutang.php'>Piutang</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn">Setting</a>
            <div class="dropdown-content">
            <a href = 'System/Users.php'>Master User</a>
            <a href = 'System/LvlManager.php'>Level Manager</a>
            </div>
        </li>
        <li class="dropdown">
            <a href = 'Login.php' class="dropbtn">Log Out</a>
        </li>
    </ul>
    <div class = 'main'>
        <div class = 'notif-top-left'>
        </div>
        <div class = 'notif-top-right'>
        </div>
        <div class = 'notif-down-left'>
        </div>
        <div class = 'notif-down-right'>
        </div>
    </div>  
</body>
</html> 