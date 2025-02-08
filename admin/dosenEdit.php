<?php 
    include('../koneksi/koneksi.php');

$getnip = $_GET["nip"]; 
$editDsn = "SELECT * FROM dosen WHERE nip='$getnip'";
$resultDsn = mysqli_query ($koneksi,$editDsn); 
$dataDsn = mysqli_fetch_array ($resultDsn) ; 

?>

<h3>TAMBAH DATA DOSEN</h3>
<br /><hr /><br />
<p> 
<?php
    if (!isset($_POST['submit']))
    {
?>

    <form enctype = "multipart/form-data" method="post">
        <table width="100%" border="0">
        <tr>
            <td width="27%">NIP</td>
            <td width="4%">:</td>
            <td width="69%"><input type="text" name="nip" size="30" value="<?php echo $dataDsn[0] ?>" readonly="readonly"></td>
            
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><input name="nama" type="text" id="nama" size="30" placeholder="NAMA"/></td>
        </tr>
        <tr>
            <td>KODE MATKUL</td>
            <td>:</td>
            <td><input name="kode_matkul" type="text" id="kode_matkul" size="30" placeholder="KODE MATKUL" /></td>
        </tr>
        <tr>
        <td>PASSWORD</td>
        <td>:</td> <td><input name="password" type="text" id="password" size="30" placeholder="PASSWORD"></td>
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

<?php
}
    else
    {
        $nip =$_POST["nip"];
        $nama =$_POST["nama"];
        $kode_matkul =$_POST["kode_matkul"];
        $password =md5($_POST["password"]);

//input Data Mahasiawa


$updateDsn="UPDATE dosen SET nama='$nama',kode_matkul='$kode_matkul',password='$password' WHERE nip='$nip'";
$queryDsn=mysqli_query($koneksi, $updateDsn);


        if ($queryDsn){
            echo"<script>alert ('Daftar Barhasil Disimpan !') </script>";
            echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>";
        }else{
            echo"<script>alert('Daftar Gagal Disimpan !') </script>";
            echo "<script type='text/javascript'>window.location='./?adm=dosen'</script>";
        }
}

?>


<a href="./?adm=dosen">&raquo:KEMBALI </a>