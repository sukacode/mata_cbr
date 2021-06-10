<?php 
include "../koneksi.php";
$kdsakit = $_REQUEST['CmbPenyakit'];
$sqlp = "SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kdsakit' ";
$qryp = mysql_query($sqlp);
$datap= mysql_fetch_array($qryp);
$sakit = $datap['nama_penyakit'];
?>
<html>
<head>
<title>Tampilan Data Gejala Penyakit</title>
<link href="../images/favicon.png" rel="shortcut icon" />
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
</head>
<body>
<p></p>
<table width="650" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#99CC99">
  <tr bgcolor="#CCCC99"> 
    <td colspan="3"><b>Daftar Gejala Per Penyakit</b> <br>
      <br></td>
  </tr>
  <tr bgcolor="#CCCC99"> 
    <td width="39" align="center"><b>No</b></td>
    <td width="84"><b>Kode</b></td>
    <td width="361"><b>Nama Gejala</b></td>
  </tr>
  <?php 
	$sqlg  = "SELECT gejala.* FROM gejala,relasi ";
	$sqlg .= "WHERE gejala.kd_gejala=relasi.kd_gejala ";
	$sqlg .= "AND  relasi.kd_penyakit='$kdsakit' ";
	$sqlg .= "ORDER BY gejala.kd_gejala";
	$qryg = mysql_query($sqlg, $koneksi)or die ("SQL Error".mysql_error());
	$no=0;
	while ($datag=mysql_fetch_array($qryg)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $datag['kd_gejala']; ?></td>
    <td><?php echo $datag['gejala']; ?></td>
  </tr>
  <?php
  }
  ?>
   <tr>
  <td colspan="3" bgcolor="#CCCC99"><div align="right"><a href="haladmin.php?top=lapgejala.php">&laquo;&laquo;Kembali</a></div> </td>
</tr>
</table>

</body>
</html>
