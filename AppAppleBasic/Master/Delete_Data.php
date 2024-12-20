<?php
include_once '../connection.php';
//var_dump($_GET["master"]);
$master = $_GET["master"];

date_default_timezone_set("Asia/Jakarta");

if ($master  == 'satuan')  {
    $sql = "UPDATE tblmstn SET Hapus = 1, IdMUserUpdate = '" . $_GET["userid"] . "', TglUpdate = '" .date("Y-m-d h:i:s"). "' " .
           "WHERE IdMStn='" . $_GET["dataid"] . "'";
} else if ($master  == 'barang') {
    $sql = "UPDATE tblmbrg SET Hapus = 1, IdMUserUpdate = '" . $_GET["userid"] . "', TglUpdate = '" .date("Y-m-d h:i:s"). "' " .
           "WHERE IdMBrg='" . $_GET["dataid"] . "'";
}else if ($master  == 'customer') {
    $sql = "UPDATE tblmcust SET Hapus = 1, IdMUserUpdate = '" . $_GET["userid"] . "', TglUpdate = '" .date("Y-m-d h:i:s"). "' " .  
           "WHERE IdMCust='" . $_GET["dataid"] . "'";
}else if ($master  == 'supplier') {
    $sql = "UPDATE tblmsupp SET Hapus = 1, IdMUserUpdate = '" . $_GET["userid"] . "', TglUpdate = '" .date("Y-m-d h:i:s"). "' " .
           "WHERE IdMSupp='" . $_GET["dataid"] . "'";
    // var_dump($sql);
}

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

if ($master  == 'satuan')  {
    header("Location: Satuan.php");
} else if ($master  == 'barang') {
    header("Location: Barang.php");
}else if ($master  == 'customer') {
    header("Location: Customer.php");
}else if ($master  == 'supplier') {
    // header("Location: Supplier.php");
}
?>