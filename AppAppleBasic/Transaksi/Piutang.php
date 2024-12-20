<?php
    include '../connection.php';
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
    <link rel='stylesheet' type='text/css' href='../CSS/Style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="sidenav">
        <a href = '../Homepage.php'>Homepage</a>
        <button class="dropdown-btn">Master
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href = '../Master/Satuan.php'>Satuan</a>
            <a href = '../Master/Barang.php'>Barang</a>
            <a href = '../Master/Supplier.php'>Supplier</a>
            <a href = '../Master/Customer.php'>Customer</a>
        </div>
        <a href = 'Pembelian.php'>Pembelian</a>
        <a href = 'Hutang.php'>Hutang</a>
        <a href = 'Penjualan.php'>Penjualan</a>
        <a href = 'Piutang.php'>Piutang</a>
        <button class="dropdown-btn">Laporan
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href = '../Laporan/LStok.php'>Stok</a>
            <a href = '../Laporan/LBeli.php'>Pembelian</a>
            <a href = '../Laporan/LHutang.php'>Hutang</a>
            <a href = '../Laporan/LJual.php'>Penjualan</a>
            <a href = '../Laporan/LPiutang.php'>Piutang</a>
        </div>
        <button class="dropdown-btn">Setting
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href = '../System/Users.php'>Master User</a>
            <a href = '../System/LvlManager.php'>Level Manager</a>
        </div>
        <a href = '../Logout.php'>Log Out</a>
    </div>
    <div class="main-row">
        <p class = 'label_user'>Selamat Datang User <?php echo $_SESSION['username']?> </p>
        <div class='clock' id='dc'></div>  
        <div class='dH' id='day_year'></div>
    </div>
    <div class="main-row">
        <h1 class="aside-header-title">Piutang</h1> 
    </div>   
    <div class="main">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <a class="btn-add" href=""><img src="../CSS/add-icon.png"></a>
        <table id="myTable">
            <tr class="header">
                <th style="width:1%;">Aktif</th>
                <th style="width:25%;">No. Bukti</th>
                <th style="width:25%;">Tgl Transaksi</th>
                <th style="width:30%;">Total</th>
                <th style="width:11%;">Aksi</th>
            </tr>
            <?php
                $sql = "SELECT Aktif, KdMBrg, NmMBrg, Keterangan FROM tblmbrg";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    
            ?>
            <tr>
                <?php
                    if($row["Aktif"] = "1")
                    {
                ?>
                    <td><img src="../CSS/check-icon.png"></td>
                <?php
                    }
                    else 
                    {
                ?>
                    <td><img src="../CSS/cross-icon.png"></td>
                <?php 
                    }
                ?>
                
                <td><?php print($row["KdMBrg"]);?></td>
                <td><?php print($row["NmMBrg"]);?></td>
                <td><?php print($row["Keterangan"]);?></td>
                <td>
                    <a class="btn-edit" href=""><img src="../CSS/edit-icon.png"></a>
                    <a class="btn-delete" href=""><img src="../CSS/delete-icon.png"></a>
                    <a class="btn-view" href=""><img src="../CSS/view-icon.png"></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>   
    </div>

    <script src="../scripts/Dropdown_Menu_Script.js"></script>
    <script src="../scripts/Digital_Time_Script.js"></script>
    <script src="../scripts/Table_Search_Script.js"></script>
</body>
</html> 