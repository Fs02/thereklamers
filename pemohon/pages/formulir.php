<title>Data Pemohon</title>
<FORM METHOD="POST" NAME="input" enctype="multipart/form-data">
<?php
//Cek Tombol 
if (isset($_POST['submit']))  {
	//Kirimkan Variabel
	$no_ktp = $_POST['no_ktp'];
	$nama_perusahaan= $_POST['nama_perusahaan'];
	$jenis_perusahaan= $_POST['jenis_perusahaan'];
	$jenis_usaha= $_POST['jenis_usaha'];
	$NPWP= $_POST['NPWP'];
	$rk = $_POST['pj'];
	$dp = $_POST['lb'];
	$no_telp = $_POST['no_telp'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$merek = $_POST['merek'];
	$jenis = $_POST['jenis'];
	$ukuran = $_POST['pj'] + ' ' + $_POST['lb'];
	//cek extensi

	//validasi data jika nama dan pesan kosong
	if (empty($_POST['no_telp'])|| empty($_POST['nama'])/* || ($_POST['kategori']=="--Pilih Kategori--") */) 
	{
		?>
		<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		</script>
		<?php
	}
	//Jika Validasi Terpenuhi
	else
	{
		//Memanggil File Koneksi Database
		include ROOT_DIR."koneksi.php";
	
		//cek apakah pemohon sudah terdaftar
		$sql = "SELECT * FROM pemohon where no_ktp = '$no_ktp'";
		$query = mysql_query($sql);
		if (empty(mysql_fetch_array($query, MYSQL_ASSOC)))
		{ 
			//Masukan data ke Table Pemohon
			$sql = "INSERT INTO pemohon VALUES('$no_ktp','$nama','$alamat','$no_telp')";
			$query = mysql_query($sql);
		}
		
		//Masukan data ke Table Peerusahaan
		$sql="INSERT INTO perusahaan VALUES(NULL,'$nama_perusahaan','$jenis_usaha','$jenis_perusahaan','$no_telp','$NPWP','$no_ktp')";
		$query=mysql_query($sql);
	    
		//Dapatkan id perusahaan
		$sql = "SELECT id_perusahaan FROM perusahaan where nama_perusahaan = '$nama_perusahaan' AND jenis_usaha = '$jenis_usaha' AND  jenis_perusahaan = '$jenis_perusahaan' AND no_telp = '$no_telp' AND no_ktp = '$no_ktp'";
		$query = mysql_query($sql);
		$result = mysql_fetch_row($query);
		$id_perusahaan = $result[0];

		//Masukan data ke Table Pemohon
		$sql = "INSERT INTO reklame VALUES(NULL, '$merek','$jenis','$ukuran','$id_perusahaan')";
		$query = mysql_query($sql);
		if ($query)
		{
			?>
			<script language="JavaScript">
				alert('Data Berhasil diinput');
			</script>
			<?php
	
		}
		else
		{
			//Jika Gagal
			?>
			<script language="JavaScript">
			alert('Data Gagal di input, Silahkan ulangi lagi');
			</script>
			<?php
		}
	}
}
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="tabel2" >	
	<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">REGISTRASI</th>
	</tr>
	</tr>
    	
	<tr>
	  <td height="30">&nbsp;</td>
	  <td valign="top">&nbsp;</td>
	  <td align="left" valign="top" height="40">&nbsp;</td>
    </tr>
	<tr>
	  <td width="50" height="30">&nbsp;</td>
		<td width="0" valign="top"><strong>DATA PEMOHON</strong></td>
		<td align="left" valign="top" height="40">&nbsp;</td>
	</tr>
		
     	<tr>
			  <td height="30" >&nbsp;</td>
				<td valign="top">NAMA PEMOHON</td>
				<td><input type="text" name="nama" size="45" maxlength="50" id="isian2"></td>
		</tr>
		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">NO KTP</td>
				<td ><input type="text" name="no_ktp" size="45" maxlength="50" id="isian2"></td> 
		</tr>
		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">NO TELEPON</td>
				<td><input type="text" name="no_telp" size="45" maxlength="50" id="isian2"></td>
		</tr>
		<tr><td height="12"></td></tr>
			
			<tr>
			  <td>&nbsp;</td>
				<td valign="top">ALAMAT</td>
				<td><textarea name="alamat"  rows="6" cols="65" id="isian3"></textarea></td>
			</tr>
			<tr><td height="33"></td></tr>       
        <tr>
	  <td width="50" height="30">&nbsp;</td>
		<td width="0" valign="top"><strong>DATA PERUSAHAAN</strong></td>
		<td align="left" valign="top" height="40">&nbsp;</td>
	</tr>
		<tr>
			  <td height="30" >&nbsp;</td>
				<td valign="top">NAMA PERUSAHAN</td>
				<td><input type="text" name="nama_perusahaan" size="45" maxlength="50" id="isian2"></td>
		</tr>

		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">NO TELEPON</td>
				<td><input type="text" name="no_telp" size="45" maxlength="50" id="isian2"></td>
		</tr>
		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">NPWP</td>
				<td ><input type="text" name="NPWP" size="45" maxlength="50" id="isian2"></td> 
		</tr>
		
	<tr>
		<td width="50" height="30" >&nbsp;</td>
		<td width="0" valign="middle">JENIS PERUSAHAAN</td>
		<td>
			<?php
			include "koneksi.php";
			?>
			<select name="jenis_perusahaan" id="kategori" width="50">
				<option>--Pilih Jenis Perusahaan--</option>
				<?php
				//mengambil nama-nama propinsi yang ada di database
				$propinsi = mysql_query("SELECT * FROM tbl_kategori ORDER BY id");
				while($p=mysql_fetch_array($propinsi)){
					echo "<option value=\"$p[cat]\">$p[cat]</option>\n";
				}
				?>
			</select>		</td>
			</tr>
		<tr>
			  <td>&nbsp;</td>
					<tr>
		<td width="50" height="30" >&nbsp;</td>
		<td width="0" valign="middle">JENIS USAHA</td>
		<td>
			<?php
			include "koneksi.php";
			?>
			<select name="jenis_usaha" id="sub" width="50" >
				<option>--Pilih Jenis Usaha--</option>
				<?php
				//mengambil nama-nama propinsi yang ada di database
				$kota = mysql_query("SELECT * FROM tbl_kategori_sub");
				while($p=mysql_fetch_array($propinsi)){
					echo "<option value=\"$p[id_c]\">$p[cat]</option>\n";
				}
				echo "<option value=\"$p[cat]\">$p[cat]</option>\n";
				?>
			</select>		</td>
		</tr>
			<tr>
			  <td height="41">&nbsp;</td>
				<td></td>
				<td>
        <tr>
	  <td width="50" height="30">&nbsp;</td>
		<td width="0" valign="top"><strong>DATA REKLAME</strong></td>
		<td align="left" valign="top" height="40">&nbsp;</td>
	</tr>

		<tr>
			  <td height="30" >&nbsp;</td>
				<td valign="top">MEREK REKLAME</td>
		  <td><input type="text" name="merek" size="45" maxlength="50" id="isian2"></td>
		</tr>
	
		<tr>
			  <td width="50" height="28">&nbsp;</td>
				<td width="0" valign="top">UKURAN REKLAME</td>
				<td valign="top">PANJANG : <input type="text" name="pj" size="10" maxlength="10" id="isian2">
				m x 
				LEBAR : 
		        <input type="text" name="lb" size="10" maxlength="10" id="isian2">
		        m </td> 
		</tr>
			<tr><td height="12"></td></tr><tr>
		<td width="50" height="30" >&nbsp;</td>
		<td width="0" valign="middle">JENIS</td>
		<td>
			<?php
			include "koneksi.php";
			?>
			<select name="jenis" id="kategori" width="50">
				<option>--Pilih Kategori--</option>
				<?php
				//mengambil nama-nama propinsi yang ada di database
				$propinsi = mysql_query("SELECT * FROM tbl_kategori ORDER BY id");
				while($p=mysql_fetch_array($propinsi)){
					echo "<option value=\"$p[cat]\">$p[cat]</option>\n";
				}
				?>
			</select>		</td>
	
		
	</tr>
		<tr>
			  <td>&nbsp;</td>
			  
			  <td></td>
			  <td><i>&nbsp;</td>
		</tr>
			
	
		<tr>
			  <td>&nbsp;</td>
			  <td></td>
			  <td><i>&nbsp;</td>
		</tr>

			<tr><td height="12"></td></tr>
			
			
			<tr><td height="12"></td></tr>
			
			
			
			<tr>
			  <td>&nbsp;</td>
				<td>&nbsp;</td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
				<td></td>
				<td>
                
           
				
						<input type="submit" name="submit" value="submit" id="tombol">
					&nbsp;<input type="reset" name="reset" value="Reset" id="tombol"></td>
			</tr>
		</table>
</FORM>