<?php 
include ('../koneksi/koneksi.php');

$nim=$_GET ["nim"];
$nip=$_GET ["nip"]; 
$delnilai ="DELETE FROM nilai WHERE nim='$nim' and nip='$nip'"; 
$resultnilai =mysqli_query($koneksi, $delnilai); 
if($resultnilai) 
{
    echo"<script>alert ('Data Nilai Berhasil Dihapus') </script>"; 
    echo"<script type='text/javascript'>window.location='./?adm=nilai'</script>"; 
}

else
{
    echo"<script>alert ('Dat Nilai Gagal Dihapus') </script>"; 
    echo"<script type='text/javascript'>window.location='./?adm=nilai'</script>"; 
} 
?>