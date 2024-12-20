<?php
include_once '../connection.php';
$master = $_GET["master"];

date_default_timezone_set("Asia/Jakarta");

if ($master  == "satuan")  {
    $KdMStn =  $_REQUEST['KdMStn'];
    $NmMStn = $_REQUEST['NmMStn'];
    $IdMUserCreate =  $_GET["userid"];
    $TglCreate = date("Y-m-d h:i:s");
    $IdMUserUpdate =  -1;
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Hapus = 0;
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "INSERT INTO tblmstn (KdMStn, NmMStn, IdMUserCreate, TglCreate, IdMUserUpdate, TglUpdate, Aktif, Hapus, Keterangan)" .
           " VALUES ('$KdMStn','$NmMStn',$IdMUserCreate,'$TglCreate',$IdMUserUpdate,'$TglUpdate',$Aktif,$Hapus,'$Keterangan')";

    
} else if ($master  == "barang") {
    $KdMBrg =  $_REQUEST['KdMBrg'];
    $NmMBrg = $_REQUEST['NmMBrg'];
    $Barcode = $_REQUEST['Barcode'];
    $IdMStn1 = $_REQUEST['Satuan1'];
    if ($_REQUEST['Nilai1'] == ''){
        $IsiStn1 = 0;
    }else {
        $IsiStn1 = $_REQUEST['Nilai1'];
    }
    $IdMStn2 = $_REQUEST['Satuan2'];
    if ($_REQUEST['Nilai2'] == ''){
        $IsiStn2 = 0;
    }else {
        $IsiStn2 = $_REQUEST['Nilai2'];
    }
    $IdMStn3 = $_REQUEST['Satuan3'];
    if ($_REQUEST['Nilai3'] == ''){
        $IsiStn3 = 0;
    }else {
        $IsiStn3 = $_REQUEST['Nilai3'];
    }
    $IdMStn4 = $_REQUEST['Satuan4'];
    if ($_REQUEST['Nilai4'] == ''){
        $IsiStn4 = 0;
    }else {
        $IsiStn4 = $_REQUEST['Nilai4'];
    }
    $IdMStn5 = $_REQUEST['Satuan5'];
    $IdMUserCreate =  $_GET["userid"];
    $TglCreate = date("Y-m-d h:i:s");
    $IdMUserUpdate =  -1;
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Hapus = 0;
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "INSERT INTO tblmbrg (KdMBrg, NmMBrg, Barcode, IdMStn1, IsiStn1, IdMStn2, IsiStn2, IdMStn3, IsiStn3, IdMStn4, IsiStn4, IdMStn5, " . 
           "IdMUserCreate, TglCreate, IdMUserUpdate, TglUpdate, Aktif, Hapus, Keterangan)" .
           " VALUES ('$KdMBrg','$NmMBrg', $Barcode, $IdMStn1, $IsiStn1, $IdMStn2, $IsiStn2, $IdMStn3, $IsiStn3, " . 
           "$IdMStn4, $IsiStn4, $IdMStn5, $IdMUserCreate,'$TglCreate',$IdMUserUpdate,'$TglUpdate',$Aktif,$Hapus,'$Keterangan')";

    // var_dump($sql);
}else if ($master  == 'customer') {
    $KdMCust =  $_REQUEST['KdMCust'];
    $NmMCust = $_REQUEST['NmMCust'];
    $Alamat = $_REQUEST['Alamat'];
    $TglLahir = $_REQUEST['TglLahir'];
    $Telp1 = $_REQUEST['Telp1'];
    $Telp2 = $_REQUEST['Telp2'];
    $HP = $_REQUEST['HP'];
    $Term = $_REQUEST['Term'];
    $IdMUserCreate =  $_GET["userid"];
    $TglCreate = date("Y-m-d h:i:s");
    $IdMUserUpdate =  -1;
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Hapus = 0;
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "INSERT INTO tblmcust (KdMCust, NmMCust, Alamat, TglLahir,Telp1, Telp2, Hp, Term, IdMUserCreate, TglCreate, IdMUserUpdate, TglUpdate, Aktif, Hapus, Keterangan)" .
           " VALUES ('$KdMCust', '$NmMCust', '$Alamat', '$TglLahir', '$Telp1', '$Telp2', '$HP', $Term, $IdMUserCreate, '$TglCreate', $IdMUserUpdate, '$TglUpdate', $Aktif, $Hapus, '$Keterangan')";
    // var_dump($sql);
}else if ($master  == 'supplier') {
    $KdMSupp =  $_REQUEST['KdMSupp'];
    $NmMSupp = $_REQUEST['NmMSupp'];
    $Alamat = $_REQUEST['Alamat'];
    $Telp1 = $_REQUEST['Telp1'];
    $Telp2 = $_REQUEST['Telp2'];
    $HP = $_REQUEST['HP'];
    $Term = $_REQUEST['Term'];
    $IdMUserCreate =  $_GET["userid"];
    $TglCreate = date("Y-m-d h:i:s");
    $IdMUserUpdate =  -1;
    $TglUpdate = date("Y-m-d h:i:s");
    $Aktif = $_REQUEST['Aktif'];
    $Hapus = 0;
    $Keterangan = $_REQUEST['Keterangan'];

    $sql = "INSERT INTO tblmsupp (KdMSupp, NmMSupp, Alamat,Telp1, Telp2, Hp, Term, IdMUserCreate, TglCreate, IdMUserUpdate, TglUpdate, Aktif, Hapus, Keterangan)" .
           " VALUES ('$KdMSupp', '$NmMSupp', '$Alamat', '$Telp1', '$Telp2', '$HP', $Term, $IdMUserCreate, '$TglCreate', $IdMUserUpdate, '$TglUpdate', $Aktif, $Hapus, '$Keterangan')";
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