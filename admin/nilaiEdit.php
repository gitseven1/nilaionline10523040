<?php
    include('../koneksi/koneksi.php');

$getNim = $_GET["nim"]; 
$editnilai = "SELECT * FROM nilai WHERE nim='$getNim'";
$resultnilai = mysqli_query ($koneksi,$editnilai); 
$datanilai = mysqli_fetch_array ($resultnilai) ; 
?>

<h3>TAMBAH DATA NILAI</h3>
<br/><hr/><br/>
<p>

<?php
    if(!isset($_POST['submit']))
    {
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
        <tr>
                <td height="50">NAMA MAHASISWA</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="mhs" class='form-control'>
                        <option value="">-=PILIH=-</option>
                        <?php
                        $queryMhs   ="select nim, nama from mahasiswa";
                        $resultMhs  =mysqli_query($koneksi, $queryMhs);
                        while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)){
                            $selected = ($dataMhs[0] == $nim) ? "selected" : "";
                            echo "<option value='$dataMhs[0]' $selected>$dataMhs[1]</option>";
                        }
                        ?>  
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td height="50">NAMA DOSEN</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="dosen" class='form-control'>
                        <option value="">-=PILIH=-</option>
                        <?php
                        $querymhs   ="select nip, nama from dosen";
                        $resultmhs  =mysqli_query($koneksi, $querymhs);
                        while ($datamhs = mysqli_fetch_array($resultmhs, MYSQLI_NUM)){
                            $selected = ($datamhs[0] == $nip) ? "selected" : "";
                            echo "<option value='$datamhs[0]' $selected>$datamhs[1]</option>";
                        }
                        ?>  
                        </select>
                    </label><br/>
                </td>
            </tr>
            <tr>
                <td>NILAI TUGAS</td>
                <td>:</td>
                <td>
                   <input type="text" id="tugas" name="tugas" size="30" value="<?php echo $datanilai [0] ?>" >
                </td>
            </tr>
            <tr>
                <td>NILAI UTS</td>
                <td>:</td>
                <td>
                   <input type="text" id="uts" name="uts" size="30" value="<?php echo $datanilai [1] ?>">
                </td>
            </tr>
            <tr>
                <td>NILAI UAS</td>
                <td>:</td>
                <td>
                   <input type="text" id="uas" name="uas" size="30" value="<?php echo $datanilai [2] ?>">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                <input id="submit" name="submit" type="submit" value="UBAH"></td>
            </tr>
        </table>
    </form>
    </td>
</tr>

<?php
    }
    else
    {
        $mhs        =$_POST["mhs"];
        $dosen      =$_POST["dosen"];
        $tugas      =$_POST["tugas"];
        $uts        =$_POST["uts"];
        $uas        =$_POST["uas"];


        $updatenilai="UPDATE nilai SET nl_tugas='$tugas',nl_uts='$uts',nl_uas='$uas',nip='$dosen' WHERE nim='$mhs'";
        $querynilai=mysqli_query($koneksi, $updatenilai);
        
        if($querynilai){
            echo "<script>alert('Data Nilai Berhasil Disimpan !') </script>";
            echo "<script type ='text/javascript'>window.location='./?adm=nilai'</script>"; 
        }
        else {
            echo "<script>alert('Data Nilai Gagal Disimpan !') </script>";
            echo "<script type ='text/javascript'>window.location='./?adm=nilai'</script>";
        }
    }
?>
<a href="./?adm=nilai">&raquo;Kembali</a>
</p>