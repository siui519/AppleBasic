<?php
    include '../connection.php';
    session_start();
    // var_dump($_SESSION['username']);
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit(); // Terminate script execution after the redirect
    }

    $sql = "SELECT * FROM tblmstn WHERE IdMStn='" . $_GET["dataid"] . "'";
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
    <h2><a href="Satuan.php">Master Satuan</a> / Master Input</h2>

    <div class="container">
    <form <?php if ($_GET["mode"] == "add"){?> action="insert_data.php?master=<?php echo "satuan"; ?>&userid=<?php echo $_SESSION['idmuser']; ?>" <?php } else { ?> action="update_data.php?master=<?php echo "satuan"; ?>&userid=<?php echo $_SESSION['idmuser']; ?>&dataid=<?php echo $_GET["dataid"]; ?>" <?php } ?> method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">Kode</label>
            </div>
            <div class="col-75">
            <input type="text" id="fname" name="KdMStn" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Kode.."<?php } else { ?> value = "<?php print($row["KdMStn"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Nama</label>
            </div>
            <div class="col-75">
                <input type="text" id="lname" name="NmMStn" <?php if ($_GET["mode"] == "add"){ ?> placeholder="Nama.."<?php } else { ?> value = "<?php print($row["NmMStn"]);?>" <?php }?> <?php if ($_GET["mode"] == "view") {?> readonly <?php }?>>
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