<html>
<head>
<title>Tampilan Data Penyakit</title>
<script type="text/javascript">
function konfirmasi(id_user){
	var kd_hapus=id_user;
	var url_str;
	url_str="hapus_user.php?id_user="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
</head>
<body>
<h2>Daftar Pengguna</h2>
<div class="CSSTableGenerator">
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#22B5DD">
  <tr style="background:linear-gradient(to top, #9CF, #9FF);"> 
    <td colspan="11"><div align="center"><strong>Laporan Pengguna </strong></div></td>
  </tr>
  <tr style="background:linear-gradient(to top, #9CF, #9FF);"> 
    <td width="28"><div align="center"><strong>No</strong></div></td>
    <td width="137"><div align="center"><b>Nama</b></div></td>
    <td width="139"><strong>Kelamin</strong></td>
    <td width="140"><strong>Umur</strong></td>
    <td width="70"><div align="center"><strong>Email</strong></div></td>
    <td width="155" align="center"><div align="center"><strong>Alamat</strong></div></td>
    <td width="251" align="center"><div align="center"><strong>Penyakit Yang diderita </strong></div></td>
    <td width="115" align="center"><strong>Tanggal Diagnosa</strong> </td>
  </tr>
  <?php 
  include "../koneksi.php";
	$sql = "SELECT * FROM pasien ORDER BY idpasien DESC";
	$qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
	$no=0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td><?php echo $no; ?></td>
    <td><?php echo $data['nama'];?></td>
    <td><?php echo $data['kelamin'];?></td>
    <td><?php echo $data['umur'];?></td>
    <td><?php echo $data['email'];?></td>
    <td><?php echo $data['alamat'];?></td>
    <td><?php
	$id_pasien=$data['idpasien'];
    $strHasil=mysql_query("SELECT * FROM analisa_hasil,penyakit_solusi WHERE analisa_hasil.idpasien='$id_pasien' AND analisa_hasil.kd_penyakit=penyakit_solusi.kd_penyakit ORDER BY analisa_hasil.persentase DESC ");
	while($dataHasil=mysql_fetch_array($strHasil)){
		echo "(".$dataHasil['kd_penyakit'].")"." ".$dataHasil['nama_penyakit']."(".$dataHasil['persentase'].")<br>";
		}
	?></td>
    <td><?php echo $data['tanggal']; ?>&nbsp;|<a title="hapus pengguna" style="cursor:pointer;" onClick="return konfirmasi('<?php echo $data['idpasien'];?>')"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  }
  ?>
</table>
</div>
</body>
</html>
