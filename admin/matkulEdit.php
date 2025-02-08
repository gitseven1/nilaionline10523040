<?php 
    include('../koneksi/koneksi.php');
    
$getkode = $_GET["kode_matkul"]; 
$editmatkul = "SELECT * FROM matakuliah WHERE kode_matkul='$getkode'";
$resultmatkul = mysqli_query ($koneksi,$editmatkul); 
$datamatkul = mysqli_fetch_array ($resultmatkul) ; 
?>

<h3>TAMBAH DATA MATA KULIAH</h3>
<br /><hr /><br />
<p> 
<?php
    if (!isset($_POST['submit']))
    {
?>

    <form enctype = "multipart/form-data" method="post">
        <table width="100%" border="0">
        <tr>
            <td width="27%">KODE MATA KULIAH</td>
            <td width="4%">:</td>
            <td width="69%"><input type="text" name="kode_matkul" size="30" value="<?php echo $datamatkul[0] ?>" readonly="readonly" ></td>
        </tr>
        
        <tr>
        <td height="50">NAMA MATA KULIAH</td>
        <td>:</td>
        <td><label>
            <select name="nama_matkul">
                <option value="">-PILIH-</option>
                <option value="algoritma"> ALGORITMA</option>
                <option valu="matematika"> MATEMATIKA</option> 
                <option valus="akuntansi">AKUNTANSI</option>
                <option valus="pemrograman web">PEMROGRAMAN WEB</option>
                <option valus="javascript">JAVASCRIPT</option>
                <option valus="bisnis manajemen">BISNIS MANAJEMEN</option>
                <option valus="bahasa inggris">BAHASA INGGRIS</option>
                <option valus="konsep sistem informasi">KONSEP SISTEM INFORMASI</option>
            </select> </label><br /></td>
</tr>
        <td>
        <input id="submit" name="submit" type="submit" value="UBAH"></td>
        </tr>
    </table>
</form>

<?php
}
    else
    {
        $kode_matkul =$_POST["kode_matkul"];
        $nama_matkul =$_POST["nama_matkul"];

//input Data Mata kuliah
$updatematkul="UPDATE matakuliah SET nama_matkul='$nama_matkul' WHERE kode_matkul='$kode_matkul'";
$querymatkul=mysqli_query($koneksi, $updatematkul);
    
    if ($querymatkul){
            echo"<script>alert ('Daftar Barhasil Disimpan !') </script>";
            echo"<script type='text/javascript'>window.location='./?adm=matkul'</script>";
        }else{
            echo"<script>alert('Daftar Gagal Disimpan !') </script>";
            echo "<script type='text/javascript'>window.location='./?adm=matkul'</script>";
        }
}

?>


<a href="./?adm=matkul">&raquo:KEMBALI </a>