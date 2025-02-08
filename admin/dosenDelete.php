<?php 
include ('../koneksi/koneksi.php');

$nip=$_GET ["nip"]; 
$delDsn ="DELETE FROM dosen WHERE nip='$nip'"; 
$resultDsn =mysqli_query($koneksi, $delDsn); 
if($resultDsn) 
{
    echo"<script>alert ('Data Dosen Berhasil Dihapus') </script>"; 
    echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>"; 
}

else
{
    echo"<script>alert ('Data Dosen gagal Dihapus') </script>"; 
    echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>"; 
} 
?>