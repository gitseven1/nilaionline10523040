<?php 
include ('../koneksi/koneksi.php');

$kode_matkul=$_GET ["kode_matkul"]; 
$delmatkul ="DELETE FROM matakuliah WHERE kode_matkul='$kode_matkul'"; 
$resultmatkul =mysqli_query($koneksi, $delmatkul); 
if($resultmatkul) 
{
    echo"<script>alert ('Data Matkul Berhasil Dihapus') </script>"; 
    echo"<script type='text/javascript'>window.location ='./?adm=matkul'</script>"; 
}

else
{
    echo"<script>alert ('Data Matkul gagal Dihapus') </script>"; 
    echo"<script type='text/javascript'>window.location='./?adm=matkul'</script>"; 
} 
?>