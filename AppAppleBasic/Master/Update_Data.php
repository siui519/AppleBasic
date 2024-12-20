<?php
include_once '../connection.php';

$master = $_GET["master"];
$dataid = $_GET["dataid"];

date_default_timezone_set("Asia/Jakarta");

if ($master  == 'satuan')  {
    $KdMStn =  $_REQUEST['KdMStn'];
    $NmMStn = $_REQUEST['NmMStn'];
    $IdMUserUpdate =  $_GET["userid"];
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "UPDATE tblmstn Set KdMStn = '" . $KdMStn . "', NmMStn = '" . $NmMStn . "'" .
           ", IdMUserUpdate = " . $IdMUserUpdate . ", TglUpdate =  '" . $TglUpdate . "'" .
           ", Aktif = " . $Aktif . ", Keterangan = '" . $Keterangan . "'" .
           " WHERE IdMStn = " . $dataid;

} else if ($master  == 'barang') {
    $KdMBrg =  $_REQUEST['KdMBrg'];
    $NmMBrg = $_REQUEST['NmMBrg'];
    $Barcode = $_REQUEST['Barcode'];
    $IdMStn1 = $_REQUEST['Satuan1'];
    $IsiStn1 = $_REQUEST['Nilai1'];
    $IdMStn2 = $_REQUEST['Satuan2'];
    $IsiStn2 = $_REQUEST['Nilai2'];
    $IdMStn3 = $_REQUEST['Satuan3'];
    $IsiStn3 = $_REQUEST['Nilai3'];
    $IdMStn4 = $_REQUEST['Satuan4'];
    $IsiStn4 = $_REQUEST['Nilai4'];
    $IdMStn5 = $_REQUEST['Satuan5'];
    $IdMUserUpdate =  $_GET["userid"];
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Hapus = 0;
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "UPDATE tblmbrg Set KdMBrg = '" . $KdMBrg . "', NmMBrg = '" . $NmMBrg . "'" .
           ", IdMStn1 = " . $IdMStn1 . ", IsiStn1 =  '" . $IsiStn1 . "'" . ", IdMStn2 =  '" . $IdMStn2 . "'" . ", IsiStn2 =  '" . $IsiStn2 . "'" .
           ", IdMStn3 = " . $IdMStn3 . ", IsiStn3 =  '" . $IsiStn3 . "'" . ", IdMStn4 =  '" . $IdMStn4 . "'" . ", IsiStn4 =  '" . $IsiStn4 . "'" .
           ", IdMStn5 = " . $IdMStn5 . ", IdMUserUpdate = " . $IdMUserUpdate . ", TglUpdate =  '" . $TglUpdate . "'" .
           ", Aktif = " . $Aktif . ", Keterangan = '" . $Keterangan . "'" .
           " WHERE IdMBrg = " . $dataid;
    var_dump($sql);
}else if ($master  == 'customer') {
    $KdMCust =  $_REQUEST['KdMCust'];
    $NmMCust = $_REQUEST['NmMCust'];
    $Alamat = $_REQUEST['Alamat'];
    $TglLahir = $_REQUEST['TglLahir'];
    $Telp1 = $_REQUEST['Telp1'];
    $Telp2 = $_REQUEST['Telp2'];
    $HP = $_REQUEST['HP'];
    $Term = $_REQUEST['Term'];
    $IdMUserUpdate =  $_GET["userid"];
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "UPDATE tblmcust Set KdMCust = '" . $KdMCust . "', NmMCust = '" . $NmMCust . "'" . ", Alamat = '" . $Alamat . "'" .
           ", TglLahir = '" . $TglLahir . "', Telp1 =  '" . $Telp1 . "'" .", Telp2 =  '" . $Telp2 . "'" .
           ", HP = '" . $HP . "', Term =  '" . $Term . "'" .
           ", IdMUserUpdate = " . $IdMUserUpdate . ", TglUpdate =  '" . $TglUpdate . "'" .
           ", Aktif = " . $Aktif . ", Keterangan = '" . $Keterangan . "'" .
           " WHERE IdMCust = " . $dataid;
    var_dump ($sql);
}else if ($master  == 'supplier') {
    $KdMSupp =  $_REQUEST['KdMSupp'];
    $NmMSupp = $_REQUEST['NmMSupp'];
    $Alamat = $_REQUEST['Alamat'];
    $Telp1 = $_REQUEST['Telp1'];
    $Telp2 = $_REQUEST['Telp2'];
    $HP = $_REQUEST['HP'];
    $Term = $_REQUEST['Term'];
    $IdMUserUpdate =  $_GET["userid"];
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "UPDATE tblmsupp Set KdMSupp = '" . $KdMSupp . "', NmMSupp = '" . $NmMSupp . "'" .
           ", Alamat = '" . $Alamat . "', Telp1 =  '" . $Telp1 . "'" .", Telp2 =  '" . $Telp2 . "'" .
           ", HP = " . $HP . ", Term =  '" . $Term . "'" .
           ", IdMUserUpdate = " . $IdMUserUpdate . ", TglUpdate =  '" . $TglUpdate . "'" .
           ", Aktif = " . $Aktif . ", Keterangan = '" . $Keterangan . "'" .
           " WHERE IdMSupp = " . $dataid;
}

if (mysqli_query($conn, $sql)) {
    echo "Record insert successfully";
} else {
    echo "Error insert record: " . mysqli_error($conn);
}
mysqli_close($conn);

if ($master  == 'satuan')  {
    header("Location: Satuan.php");
} else if ($master  == 'barang') {
    header("Location: Barang.php");
}else if ($master  == 'customer') {
    header("Location: Customer.php");
}else if ($master  == 'supplier') {
    header("Location: Supplier.php");
}
?>