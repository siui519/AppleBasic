<?php
    include '../connection.php';
    session_start();
    // var_dump($_SESSION['username']);
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit(); // Terminate script execution after the redirect
    }

    $sql = "SELECT brg.*, stn1.KdMStn as KdMStn1, stn1.NmMStn as NmMStn1, stn2.KdMStn as KdMStn2, stn2.NmMStn as NmMStn2, " .
           "stn3.KdMStn as KdMStn3, stn3.NmMStn as NmMStn3, stn4.KdMStn as KdMStn4, stn4.NmMStn as NmMStn4, ".
           "stn5.KdMStn as KdMStn5, stn5.NmMStn as NmMStn5 ". 
           "FROM tblmbrg brg " . 
           "LEFT OUTER JOIN tblmstn stn1 ON(stn1.IdMStn = brg.IdMStn1) " . 
           "LEFT OUTER JOIN tblmstn stn2 ON(stn2.IdMStn = brg.IdMStn2) " . 
           "LEFT OUTER JOIN tblmstn stn3 ON(stn3.IdMStn = brg.IdMStn3) " . 
           "LEFT OUTER JOIN tblmstn stn4 ON(stn4.IdMStn = brg.IdMStn4) " . 
           "LEFT OUTER JOIN tblmstn stn5 ON(stn5.IdMStn = brg.IdMStn5) " . 
           "WHERE brg.IdMBrg='" . $_GET["dataid"] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' href='../CSS/Style-Input-Master.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class='clock' id='dc'></div>  
    <div class='dH' id='day_year'></div>    
    <h2><a href="Barang.php">Master Barang</a> / Master Input</h2>

    <div class="container">
    <form <?php if ($_GET["mode"] == "add"){?> action="insert_data.php?master=<?php echo "barang"; ?>&userid=<?php echo $_SESSION['idmuser']; ?>" <?php } else { ?> action="update_data.php?master=<?php echo "barang"; ?>&userid=<?php echo $_SESSION['idmuser']; ?>&dataid=<?php echo $_GET["dataid"]; ?>" <?php } ?> method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">Kode</label>
            </div>
            <div class="col-75">
            <input type="text" id="fname" name="KdMBrg" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Kode.."<?php } else { ?> value = "<?php print($row["KdMBrg"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Nama</label>
            </div>
            <div class="col-75">
                <input type="text" id="lname" name="NmMBrg" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Nama.."<?php } else { ?> value = "<?php print($row["NmMBrg"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lbarcode">Barcode</label>
            </div>
            <div class="col-75">
                <input type="text" id="lbarcode" name="Barcode" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Barcode.."<?php } else { ?> value = "<?php print($row["Barcode"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lsatuan1">Satuan1</label>
            </div>
            <div class="col-75">
                <select id="lsatuan1" name="Satuan1">
                    <option value="-1">Pilih Satuan1...</option>
                    <?php 
                        $sqlstn1 = "SELECT * FROM tblmstn WHERE Hapus = 0 and Aktif = 1";
                        $resultstn1 = mysqli_query($conn, $sqlstn1);
                        while($rowstn1 = mysqli_fetch_assoc($resultstn1)) {
                    ?>
                        <option value="<?php print($rowstn1["IdMStn"]);?>" <?php if ($rowstn1["IdMStn"] == $row["IdMStn1"]){ ?> Selected <?php } ?>><?php print($rowstn1["KdMStn"]);?></option>
                    <?php } ?>                 
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lnilai1">Nilai</label>
            </div>
            <div class="col-75">
                <input type="text" inputmode="numeric" id="lnilai1" name="Nilai1" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Nilai.."<?php } else { ?> value = "<?php print($row["IsiStn1"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lsatuan2">Satuan2</label>
            </div>
            <div class="col-75">
                <select id="lsatuan2" name="Satuan2">
                    <option value="-1">Pilih Satuan2...</option>
                    <?php 
                        $sqlstn2 = "SELECT * FROM tblmstn WHERE Hapus = 0 and Aktif = 1";
                        $resultstn2 = mysqli_query($conn, $sqlstn2);
                        while($rowstn2 = mysqli_fetch_assoc($resultstn2)) {
                    ?>
                        <option value="<?php print($rowstn2["IdMStn"]);?>" <?php if ($rowstn2["IdMStn"] == $row["IdMStn2"]){ ?> Selected <?php } ?>><?php print($rowstn2["KdMStn"]);?></option>
                    <?php } ?>                 
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lnilai2">Nilai</label>
            </div>
            <div class="col-75">
                <input type="text" inputmode="numeric" id="lnilai2" name="Nilai2" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Nilai.."<?php } else { ?> value = "<?php print($row["IsiStn2"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div><div class="row">
            <div class="col-25">
                <label for="lsatuan3">Satuan3</label>
            </div>
            <div class="col-75">
                <select id="lsatuan3" name="Satuan3">
                    <option value="-1">Pilih Satuan3...</option>
                    <?php 
                        $sqlstn3 = "SELECT * FROM tblmstn WHERE Hapus = 0 and Aktif = 1";
                        $resultstn3= mysqli_query($conn, $sqlstn3);
                        while($rowstn3 = mysqli_fetch_assoc($resultstn3)) {
                    ?>
                        <option value="<?php print($rowstn3["IdMStn"]);?>" <?php if ($rowstn3["IdMStn"] == $row["IdMStn3"]){ ?> Selected <?php } ?>><?php print($rowstn3["KdMStn"]);?></option>
                    <?php } ?>                 
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lnilai3">Nilai</label>
            </div>
            <div class="col-75">
                <input type="text" inputmode="numeric" id="lnilai3" name="Nilai3" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Nilai.."<?php } else { ?> value = "<?php print($row["IsiStn3"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div><div class="row">
            <div class="col-25">
                <label for="lsatuan4">Satuan1</label>
            </div>
            <div class="col-75">
                <select id="lsatuan4" name="Satuan4">
                    <option value="-1">Pilih Satuan4...</option>
                    <?php 
                        $sqlstn4 = "SELECT * FROM tblmstn WHERE Hapus = 0 and Aktif = 1";
                        $resultstn4= mysqli_query($conn, $sqlstn4);
                        while($rowstn4 = mysqli_fetch_assoc($resultstn4)) {
                    ?>
                        <option value="<?php print($rowstn4["IdMStn"]);?>" <?php if ($rowstn4["IdMStn"] == $row["IdMStn4"]){ ?> Selected <?php } ?>><?php print($rowstn4["KdMStn"]);?></option>
                    <?php } ?>                 
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lnilai4">Nilai</label>
            </div>
            <div class="col-75">
                <input type="text" inputmode="numeric" id="lnilai4" name="Nilai4" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Nilai.."<?php } else { ?> value = "<?php print($row["IsiStn4"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lsatuan5">Satuan5</label>
            </div>
            <div class="col-75">
                <select id="lsatuan5" name="Satuan5">
                    <option value="-1">Pilih Satuan5...</option>
                    <?php 
                        $sqlstn5 = "SELECT * FROM tblmstn WHERE Hapus = 0 and Aktif = 1";
                        $resultstn5= mysqli_query($conn, $sqlstn5);
                        while($rowstn5 = mysqli_fetch_assoc($resultstn5)) {
                    ?>
                        <option value="<?php print($rowstn5["IdMStn"]);?>" <?php if ($rowstn5["IdMStn"] == $row["IdMStn5"]){ ?> Selected <?php } ?>><?php print($rowstn5["KdMStn"]);?></option>
                    <?php } ?>                 
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="subject">Keterangan</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="Keterangan" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Keterangan.."<?php } ?> style="height:200px" <?php if ($_GET["mode"] == "view") {?> readonly <?php }?> ><?php if ($_GET["mode"] == "edit" OR $_GET["mode"] == "view"){  print($row["Keterangan"]); }?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            </div>
            <div class="col-75">
                <input type="hidden" name="Aktif" value=0 />
                <?php
                    if ($_GET["mode"] == "add"){ 
                ?>
                    <input type="checkbox" id="aktif" name="Aktif" value = 1 checked>
                <?php } else {?>
                    <?php
                        if ($row["Aktif"] == 1){
                    ?>
                        <input type="checkbox" id="aktif" name="Aktif" value = 1 checked>
                    <?php
                        } else {
                    ?>
                        <input type="checkbox" id="aktif" name="Aktif" value = 1 >
                    <?php }?>
                <?php } ?>
                
                <label for="aktif"> Aktif</label><br>
            </div>
        </div>
        <div class="row">
        <input <?php if ($_GET["mode"] == "view") {?> type="hidden" <?php } else {?> type="submit" <?php }?> value="Submit">
        </div>
    </form>
    </div>


    <script src="../scripts/Dropdown_Menu_Script.js"></script>
    <script src="../scripts/Digital_Time_Script.js"></script>
    <script src="../scripts/Table_Search_Script.js"></script>
    <script src="../scripts/Delete_Confirm.js"></script>
</body>
</html> 