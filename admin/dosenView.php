<?php
include "../koneksi/koneksi.php";
 
$queryDsn= "SELECT * FROM dosen"; 
$resultDsn = mysqli_query ($koneksi, $queryDsn); 
$countDsn = mysqli_num_rows ($resultDsn); 
?>

<h3> DATA DOSEN </h3> 
<hr/><br/>
<a href="./?adm=dosenAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA DOSEN"/></a> 
<br> 
<br> 
<table border="1" id="boxtable"> 
    <!-- TABEL MASTER DOSEN --> 
    <tr class="odd"> 
        <th>NIP</th> 
        <th>NAMA</th> 
        <th>KODE MATKUL</th>  
        <th>PASSWORD</th> 
        <th>AKSI</th> 
    </tr> 
<?php 
if ($countDsn > 0) 
{
    while($dataDsn=mysqli_fetch_array($resultDsn, MYSQLI_NUM))
    {
?>        
<tr class="add"> 
    <td class="value"><?php echo"$dataDsn[0]"; ?></td> 
    <td class="value"><?php echo"$dataDsn[1]"; ?></td> 
    <td class="value"><?php echo"$dataDsn[2]"; ?></td> 
    <td class="value"><?php echo"$dataDsn[3]"; ?></td>  
    <td class="value">
        <a href="./?adm=dosenEdit&nip=<?php echo"$dataDsn[0]"; ?>">Edit</a> |
        <a href="./?adm=dosenDelete&nip=<?php echo"$dataDsn[0]"; ?>">Hapus</a>
    </td> 
    <tr> </tr> 
<?php 
        }
    }
else
{ 
    echo"<tr> 
        <td colspan='9' align='center' height='20'> 
        <div> Belum ada Data Dosen</div></td> 
        </tr>";
}         
echo" </table>";