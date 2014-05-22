<title>Data Pemohon</title>
<FORM METHOD="POST" NAME="input" enctype="multipart/form-data">
  <h1>
    <?php
//Cek Tombol 
if (isset($_POST['submit']))  {
	//Kirimkan Variabel
	$no_ktp = $_POST['no_ktp'];
	$email = $_POST['email'];
	$nama_perusahaan= $_POST['nama_perusahaan'];
	$jenis_perusahaan= $_POST['jenis_perusahaan'];
	$jenis_usaha= $_POST['jenis_usaha'];
	$npwp= $_POST['NPWP'];
	$rk = $_POST['pj'];
	$dp = $_POST['lb'];
	$no_telp = $_POST['no_telp'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$merek = $_POST['merek'];
	$jenis = $_POST['jenis'];
	$ukuran = $_POST['pj'] + ' ' + $_POST['lb'];
	$kelurahan = $_POST['kel'];
	$kecamatan = $_POST['kec'];
	$tanggal_awal = $_POST['tgl_awal'];
	$tanggal_akhir = $_POST['tgl_akhir'];
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
	
		/*
		 * Perusahaan
		 * Logic :
		 * - Cek apakah perusahaan telah terdaftar
		 * - Jika sudah terisi -> update
		 * - jika belum -> insert
		 */
		$sql = "SELECT * FROM perusahaan where nama_perusahaan = '$nama_perusahaan' AND npwp = '$npwp'";
		$query = mysql_query($sql);
		if (empty(mysql_fetch_array($query, MYSQL_ASSOC))){
			$sql="INSERT INTO perusahaan VALUES(NULL,'$nama_perusahaan','$jenis_usaha','$jenis_perusahaan','$no_telp','$npwp','Belum diverifikasi')";
	    } else {
			$sql="UPDATE perusahaan SET nama_perusahaan='$nama_perusahaan', jenis_usaha='$jenis_usaha', jenis_perusahaan='$jenis_perusahaan', no_telp='$no_telp',status='Belum diverifikasi' WHERE nama_perusahaan = '$nama_perusahaan' AND npwp = '$npwp'";
		}
		$query=mysql_query($sql);
		if (!$query){
			echo "ERROR : Kesalahan terjadi saat menginsert tabel perusahaan";
		}
		
		/*
		 * Pemohon
		 * Logic :
		 * dapatkan id perusahaan
		 * - Cek apakah sudah terdaftar
		 * - Jika sudah -> update
		 * - Jika belum -> insert
		 */ 
		$sql = "SELECT id_perusahaan FROM perusahaan WHERE nama_perusahaan = '$nama_perusahaan' AND npwp = '$npwp'";
		$query = mysql_query($sql);
		$result = mysql_fetch_row($query);
		$id_perusahaan = $result[0];
		
		$sql = "SELECT * FROM pemohon where no_ktp = '$no_ktp'";
		$query = mysql_query($sql);
		if (empty(mysql_fetch_array($query, MYSQL_ASSOC))){ 
			$sql = "INSERT INTO pemohon VALUES('$no_ktp','$id_perusahaan','$nama','$email','$alamat','$no_telp','Belum Diverifikasi')";
		} else {
			$sql = "UPDATE pemohon SET nama='$nama',email='$email',alamat='$alamat', no_telp='$no_telp', status='Belum diverifikasi' ,id_perusahaan='$id_perusahaan' WHERE no_ktp = '$no_ktp'";
		}
		$query=mysql_query($sql);
		if (!$query){
			echo "ERROR : Kesalahan terjadi saat menginsert tabel pemohon";
		}
		
		/*
		 * Reklame
		 * Logic :
		 * - Cek apakah reklame sudah terdaftar
		 * - Jika sudah : Update
		 * - Jika belum : insert
		 */
		$sql = "SELECT * FROM reklame WHERE merek='$merek' AND id_perusahaan='$id_perusahaan'";
		$query = mysql_query($sql);
		if (empty(mysql_fetch_array($query, MYSQL_ASSOC))){ 
			$sql = "INSERT INTO reklame VALUES(NULL, '$merek','$jenis','$ukuran','$id_perusahaan','Belum diverifikasi')";
		} else {
			$sql = "UPDATE reklame SET jenis='$jenis', status='Belum diverifikasi', ukuran='$ukuran' WHERE merek='$merek' AND id_perusahaan='$id_perusahaan'";
		}
		$query=mysql_query($sql);
		if (!$query){
			echo "ERROR : Kesalahan terjadi saat menginsert tabel reklame";
		}
		
		/*
		 * Lapangan
		 * Logic :
		 * - Cek apakah lapangan sudah ada
		 * - Jika belum insert
		 */
		$sql = "SELECT * FROM lapangan where kelurahan='$kelurahan' AND kecamatan='$kecamatan'";
		$query = mysql_query($sql);
		if (empty(mysql_fetch_array($query, MYSQL_ASSOC)))
		{ 
			//Masukan data ke Table Lapangan
			$sql = "INSERT INTO lapangan VALUES(NULL, '$kelurahan', '$kecamatan')";
		}
		$query=mysql_query($sql);
		if (!$query){
			echo "ERROR : Kesalahan terjadi saat menginsert tabel lapangan";
		}
		
		/* pemasangan
		 * Logic:
		 * - ambil id reklame
		 * - ambil id lokasi
		 * - cek apakah data telah ada
		 * - jika sudah : update
		 * - jika belum : insert
		 */
		$sql = "SELECT id_reklame FROM reklame WHERE merek='$merek' AND id_perusahaan='$id_perusahaan'";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query, MYSQL_NUM);
		$id_reklame = $result[0];

		$sql = "SELECT id_lokasi FROM lapangan WHERE kelurahan='$kelurahan' AND kecamatan='$kecamatan'";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query, MYSQL_NUM);
		$id_lokasi = $result[0];
		
		$sql = "SELECT * FROM dipasang where id_reklame='$id_reklame'";
		$query = mysql_query($sql);
		if (empty(mysql_fetch_array($query, MYSQL_ASSOC))){ 
			$sql = "INSERT INTO dipasang VALUES(NULL, '$tanggal_awal','$tanggal_akhir', '$id_reklame', '$id_lokasi');";
		}
		else{
			$sql = "UPDATE dipasang SET tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', id_lokasi='$id_lokasi' WHERE id_reklame='$id_reklame'";
		}		
		$query = mysql_query($sql);
		if (!$query){	
			echo "ERROR : Kesalahan terjadi saat menginsert tabel dipasang";
		}
		
		/*
		 * Resi
		 * Logic:
		 * - ambil id pemasangan
		 * - cek apakah resi duplikat :
		 * - Jika tidak : Insert resi
		 * - Tampilkan jika sukses
		 */
 		$sql = "SELECT id_pemasangan FROM dipasang where id_reklame='$id_reklame'";
		$query = mysql_query($sql);
		$result = mysql_fetch_row($query);
		$id_dipasang = $result[0];

		$current_date = date("Y-m-d H:i:s");
		$sql = "SELECT * FROM resi where id_pemasangan='$id_dipasang'";
		$query = mysql_query($sql);
		if (empty(mysql_fetch_array($query, MYSQL_ASSOC))){ 
			$sql = "INSERT INTO resi VALUES(NULL,'$current_date','$id_dipasang');";
		}
		$query = mysql_query($sql);
		if (!$query){	
			echo "ERROR : Kesalahan terjadi saat menginsert tabel dipasang";
		} else {
			$sql = "SELECT no_resi FROM resi WHERE id_pemasangan='$id_dipasang'";
			$query = mysql_query($sql);
			$result = mysql_fetch_row($query);
			$id_resi = $result[0];
			?>
			=> <em>NOMOR RESI ANDA ADALAH</em> :
		    <?php	
			echo $id_resi; 
		}
	}
}
?>
  </h1>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="tabel2" >	
	<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">ISI FORMULIR</th>
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
				<td width="0" valign="top">EMAIL</td>
				<td ><input type="text" name="email" size="45" maxlength="50" id="isian2"></td> 
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
			<select name="jenis_perusahaan" id="kategori" width="50">
				<option>--Pilih Jenis Perusahaan--</option>
				<option>Manufaktur</option>
				<option>Dagang</option>
				<option>Jasa</option>
                <option>Hiburan</option>
			</select>		</td>
	</tr>
		<tr>
			  <td>&nbsp;</td>
	<tr>
		<td width="50" height="30" >&nbsp;</td>
		<td width="0" valign="middle">JENIS USAHA</td>
		<td>
			<select name="jenis_usaha" id="sub" width="50" >
              <option>--Pilih Jenis Usaha--</option>
              <option>Computer and Software</option>
              <option>Hiburan</option>
              <option>Asuransi</option>
              <option>Perbankan</option>
              <option>Tambang</option>
              <option>Makanan dan Minuman</option>
            </select></td>
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
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">TANGGAL MULAI</td>
				<td align="left" valign="top" height="40">
					<input type="text" name="tgl_awal" title="yyyy-mm-dd" size="15" valign="top">
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.input.tgl);return false;" >
					<img valign="bottom" name="popcal" src="menu/calender/calender.png" alt="" width="20" height="20"></a>				</td>
		</tr>
		<tr>
			  <td width="50" height="28">&nbsp;</td>
				<td width="0" valign="top">TANGGAL BERAKHIR</td>
				<td align="left" valign="top" height="28">
					<input type="text" name="tgl_akhir" title="yyyy-mm-dd" size="15" valign="top">
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.input.tgl);return false;" >
					<img valign="bottom" name="popcal" src="menu/calender/calender.png" alt="" width="20" height="20"></a>				</td>
		</tr>
		<tr>
		  <td height="23">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
    </tr>
		
    <tr>
      <td>&nbsp;</td>
      <td>KELURAHAN</td>
      <td><input type="text" name="kel" id="kel" /></td>
      <td><label></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>KECAMATAN</td>
      <td><input type="text" name="kec" id="kec" /></td>
      <td><label></label></td>
    </tr>
    
		<tr>
		  <td height="28">&nbsp;</td>
		  <td valign="top">&nbsp;</td>
		  <td valign="top">&nbsp;</td>
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
			<select name="jenis" id="kategori" width="50">
				<option>--Pilih Kategori--</option>
				<option>Komersil</option>
				<option>Event</option>
				<option>Himbauan Umum</option>
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