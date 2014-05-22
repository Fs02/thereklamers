<?php
if (isset($_GET['pemohon']) && isset($_GET['perusahaan']) && isset($_GET['reklame'])) {
	$data = true;
	include 'koneksi.php';
 
	/*
	 * Ambil data pemohon
	 */
	$id_pemohon = $_GET['pemohon'];
	$sql = "SELECT * FROM pemohon WHERE no_ktp='$id_pemohon'";
	$query = mysql_query($sql);
	$row = mysql_fetch_assoc($query);
	$nama = $row['nama'];
	$no_ktp = $row['no_ktp'];
	$no_telp_pemohon = $row['no_telp'];
	$alamat = $row['alamat'];

	/*
	 * Ambil data perusahaan
	 */
	$id_perusahaan = $_GET['perusahaan'];
	$sql = "SELECT * FROM perusahaan WHERE id_perusahaan='$id_perusahaan'";
	$query = mysql_query($sql);
	$row = mysql_fetch_assoc($query);
	$nama_perusahaan = $row['nama_perusahaan'];
	$no_telp_perusahaan = $row['no_telp'];
	$npwp = $row['NPWP'];
	$jenis_perusahaan = $row['jenis_perusahaan'];
	$jenis_usaha = $row['jenis_usaha'];

	/*
	 * Ambil data perusahaan
	 */
	$id_reklame = $_GET['reklame'];
	$sql = "SELECT * FROM reklame WHERE id_reklame='$id_reklame'";
	$query = mysql_query($sql);
	$row = mysql_fetch_assoc($query);
	$merek = $row['merek'];
	$jenis_reklame = $row['jenis'];
	$ukuran = $row['ukuran'];
	
	/*
	 * Ambil data dipasang
	 */
	$sql = "SELECT * FROM dipasang WHERE id_reklame='$id_reklame'";
	$query = mysql_query($sql);
	$row = mysql_fetch_assoc($query);
	$tanggal_awal = $row['tanggal_awal'];
	$tanggal_akhir = $row['tanggal_akhir'];
	
	/*
	 * Submit
	 */
	if (isset($_POST['submit'])){
		$id_petugas = $_POST['id_petugas'];
		$nama_petugas = $_POST['nama_petugas'];
		$status_pemohon = $_POST['status_pemohon'];
		$status_perusahaan = $_POST['status_perusahaan'];
		$status_reklame = $_POST['status_reklame'];
		
		$sql = "SELECT * FROM petugas where id_petugas = '$id_petugas' AND nama_petugas='$nama_petugas'";
		$query = mysql_query($sql);
		if (!empty(mysql_fetch_array($query, MYSQL_ASSOC))){
			//update status pemohon
			$sql = "UPDATE pemohon SET status='$status_pemohon' WHERE no_ktp='$no_ktp'";
			$query = mysql_query($sql);
			if (!$query) { echo "ERROR : Kesalahan saat memperbarui status pemohon"; }
			
			//update status perusahaan
			$sql = "UPDATE perusahaan SET status='$status_perusahaan' WHERE id_perusahaan='$id_perusahaan'";
			$query = mysql_query($sql);
			if (!$query) { echo "ERROR : Kesalahan saat memperbarui status perusahaan"; }
			
			//update status reklame
			$sql = "UPDATE reklame SET status='$status_reklame' WHERE id_reklame='$id_reklame'";
			$query = mysql_query($sql);
			if (!$query) { echo "ERROR : Kesalahan saat memperbarui status reklame"; }
			
			echo "Validasi Berhasil!";
	    } else {
			echo "ERROR : Petugas tidak terdaftar";
		}
	}
}
?>
<style type="text/css">
<!--
.style6 {font-size: 14px}
.style16 {font-family: "Times New Roman", Times, serif; font-size: 16; }
.style17 {font-size: 16}
-->
</style>
<FORM METHOD="POST" NAME="input" enctype="multipart/form-data">
<table width="100%" border="0" align="center" valign="middle" cellpadding="0" cellspacing="0">
		<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">FORM VALIDASI</th>
		</tr>
</table>
<form id="form2" name="form2" method="post" action="">
  <table width="772" border="0">
    <tr>
      <td width="57">&nbsp;</td>
      <td width="157">&nbsp;</td>
      <td width="10">&nbsp;</td>
      <td width="377">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">ID Petugas</span></td>
      <td>:</td>
      <td><label>
        <input type="text" name="id_petugas" id="id_ptg" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">Nama Petugas</span></td>
      <td>:</td>
      <td><label>
        <input type="text" name="nama_petugas" id="nama_ptg" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">DATA PEMOHON</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style17"></span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">Nama Perusahaan</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $nama_perusahaan; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">No. KTP</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $no_ktp; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">No. Telepon</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $no_telp_pemohon; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">Alamat</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $alamat; } ?></td>
    </tr>
  </table>
  
  <label><br />
  </label>

  <table width="438" border="0">
    <tr>
      <td width="63">&nbsp;</td>
      <td width="144"><span class="style6">Status Validasi</span></td>
      <td width="101"><select name="status_pemohon" id="validasi" onchange="MM_jumpMenu('parent',this,0)">
        <option>Valid</option>
        <option>Tidak Valid</option>
      </select></td>
    </tr>
    <tr>
    </tr>
  </table>
  
 <table width="770" border="0" bordercolor="#000000">
    <tr>
      <td width="57">&nbsp;</td>
      <td width="154">&nbsp;</td>
      <td width="11">&nbsp;</td>
      <td width="375">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">DATA PERUSAHAAN</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style17"></span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">Nama Perusahaan</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $nama_perusahaan; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">No. Telepon</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $no_telp_perusahaan; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">NPWP</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $npwp; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Jenis Perusahaan</td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $jenis_perusahaan; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Jenis Usaha</td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $jenis_usaha; } ?></td>
    </tr>
  </table>
  </br>
  <table width="438" border="0">
    <tr>
      <td width="63">&nbsp;</td>
      <td width="144"><span class="style6">Status Validasi</span></td>
      <td width="101"><select name="status_perusahaan" id="validasi" onchange="MM_jumpMenu('parent',this,0)">
        <option>Valid</option>
        <option>Tidak Valid</option>
      </select></td>
    </tr>
    <tr>
    </tr>
  </table>
  </br>
  <table width="770" border="0">
    <tr>
      <td width="57">&nbsp;</td>
      <td width="154">&nbsp;</td>
      <td width="11">&nbsp;</td>
      <td width="375">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">DATA REKLAME</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style17"></span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Merek Reklame</td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $merek; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">Tanggal Awal</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $tanggal_awal; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style16">Tanggal Akhir</span></td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $tanggal_akhir; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Jenis Reklame</td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $jenis_reklame; } ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Ukuran Reklame</td>
      <td>:</td>
      <td><?php if (isset($data)) { echo $ukuran; } ?></td>
    </tr>
  </table>
  
  <table width="438" border="0">
    <tr>
      <td width="63">&nbsp;</td>
      <td width="144"><span class="style6">Status Validasi</span></td>
      <td width="101"><select name="status_reklame" id="validasi" onchange="MM_jumpMenu('parent',this,0)">
        <option>Valid</option>
        <option>Tidak Valid</option>
      </select></td>
    </tr>
    <tr>
    </tr>
  </table>
  </br>
  <table width="438" border="0">
    <tr>
      <td width="80">&nbsp;</td>
      <td width="348"><input type="submit" name="submit" value="Submit" id="tombol">
	  &nbsp;<input type="reset" name="reset" value="Reset" id="tombol"></td>
      
    </tr>
  </table>
  <p>&nbsp;</p>
  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>

</form>