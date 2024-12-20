<?php
    include '../connection.php';
    session_start();
    // var_dump($_SESSION['username']);
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit(); // Terminate script execution after the redirect
    }

    $sql = "SELECT * FROM tblmsupp WHERE IdMSupp='" . $_GET["dataid"] . "'";
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
    <h2><a href="Supplier.php">Master Supplier</a> / Master Input</h2>

    <div class="container">
    <form <?php if ($_GET["mode"] == "add"){?> action="insert_data.php?master=<?php echo "supplier"; ?>&userid=<?php echo $_SESSION['idmuser']; ?>" <?php } else { ?> action="update_data.php?master=<?php echo "supplier"; ?>&userid=<?php echo $_SESSION['idmuser']; ?>&dataid=<?php echo $_GET["dataid"]; ?>" <?php } ?> method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">Kode</label>
            </div>
            <div class="col-75">
            <input type="text" id="fname" name="KdMSupp" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Kode.."<?php } else { ?> value = "<?php print($row["KdMSupp"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Nama</label>
            </div>
            <div class="col-75">
                <input type="text" id="lname" name="NmMSupp" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Nama.."<?php } else { ?> value = "<?php print($row["NmMSupp"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="laddress">Alamat</label>
            </div>
            <div class="col-75">
                <input type="text" id="laddress" name="Alamat" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Alamat.."<?php } else { ?> value = "<?php print($row["Alamat"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="ltelp1">Telp1</label>
            </div>
            <div class="col-75">
                <input type="text" inputmode="numeric" id="ltelp1" name="Telp1" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Telp1.."<?php } else { ?> value = "<?php print($row["Telp1"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="ltelp2">Telp2</label>
            </div>
            <div class="col-75">
                <input type="text" inputmode="numeric" id="ltelp2" name="Telp2" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Telp2.."<?php } else { ?> value = "<?php print($row["Telp2"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lhp">HP</label>
            </div>
            <div class="col-75">
                <input type="text" inputmode="numeric" id="lhp" name="HP" <?php if ($_GET["mode"] == "add"){ ?> placeholder="HP.."<?php } else { ?> value = "<?php print($row["Hp"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lterm">Term</label>
            </div>
            <div class="col-75">
                <select id="lterm" name="Term">
                    <option value="-1">Pilih Term...</option>
                    <option value="30" <?php if ($row["Term"] == "30"){ ?> Selected <?php } ?>>30</option>
                    <option value="60" <?php if ($row["Term"] == "60"){ ?> Selected <?php } ?>>60</option>
                    <option value="90" <?php if ($row["Term"] == "90"){ ?> Selected <?php } ?>>90</option>
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