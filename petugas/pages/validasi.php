<FORM METHOD="POST" NAME="input" enctype="multipart/form-data">
<?php
//Cek Tombol 
if (isset($_POST['submit']))  
	{
	
	//cek valudasi
		if (isset($_POST['check']))
		{
			$strCheck = implode(",", $_POST['check']); 
		}
		else
		{
			$strCheck = "";
		}
			echo "Check in: " . $strCheck;
			exit();
	
	
	//Kirimkan Variabel
	$no_resi = $_POST['no_resi'];
	$tanggal = $_POST['tanggal'];
	$no_ktp = $_POST['no_ktp'];
	$id_petugas= $_POST['nama_perusahaan'];
	
	//validasi data jika nama dan pesan kosong
	if (empty($_POST['no_resi'])|| empty($_POST['no_resi'])/* || ($_POST['kategori']=="--Pilih Kategori--") */) 
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
		//Masukan data ke Table Resi
			$sql = "INSERT INTO resi VALUES('$no_resi','$tanggal','$no_ktp','$id_petugas','')";
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
}
?>

<style type="text/css">
<!--
.style6 {font-family: "Times New Roman", Times, serif}
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<table width="100%" border="0" align="center" valign="middle" cellpadding="0" cellspacing="0">
		<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">FORM VALIDASI</th>
		</tr>
</table>
<form id="form2" name="form2" method="post" action="">
  <table width="770" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="71">&nbsp;</td>
      <td width="105"><span class="style6">ID Resi</span></td>
      <td width="6">:</td>
      <td width="415"><label>
        <input type="text" name="no_resi" id="id_resi" />
      </label></td>
      <td width="81">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">Tanggal Resi</span></td>
      <td>:</td>
      <td align="left" valign="top" height="40">
					<input type="text" name="tgl" title="dd-mm-yyyy" size="15" valign="top">
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.validasi.tanggal);return false;" >
					<img valign="bottom" name="popcal" src="pages/calender/calender.png" alt="" width="20" height="20"></a>
				</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">No KTP</span></td>
      <td>:</td>
      <td><label>
        <input type="text" name="no_ktp" id="nama" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">ID Petugas</span></td>
      <td>:</td>
      <td><label>
        <input type="text" name="id_petugas" id="id_ptg" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">Nama Petugas</span></td>
      <td>:</td>
      <td><label>
        <input type="text" name="nama_petugas" id="nama_ptg" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>VALIDASI</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <label><br />
  </label>
  <table width="699" border="0" method="post">
    <tr>
      <td width="95">&nbsp;</td>
      <td width="20">&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Nama Pemohon" checked="checked" id="check[]"/>
      <label for="check[]">Nama Pemohon</label></td>
      <td width="20">&nbsp;</td>
      <td width="308"><input type="checkbox" name="check[]" value="NPWP" checked="checked" id="check[]"/>
      <label for="check[]">NPWP</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="No. KTP" checked="checked" id="check[]"/>
      		<label for="check[]">No. KTP</label>      </td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Jenis Perusahan" checked="checked" id="check[]"/>
      <label for="check[]">Jenis Perusahan</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="No. Telepon" checked="checked" id="check[]"/>
      <label for="check[]">No. Telepon</label>      </td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Jenis Usaha" checked="checked" id="check[]"/>
      <label for="check[]">Jenis Usaha</label>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Alamat" checked="checked" id="check[]"/>
      <label for="check[]">Alamat</label>      </td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="ID Reklame" checked="checked" id="check[]"/>
      <label for="check[]">ID Reklame</label>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="ID Perusahaan" checked="checked" id="check[]"/>
      <label for="check[]">ID Perusahaan</label></td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Merek Reklame" checked="checked" id="check[]"/>
      <label for="check[]">Merek Reklame</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Nama Perusahaan" checked="checked" id="check[]"/>
      <label for="check[]">Nama Perusahaan</label></td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Ukuran Reklame" checked="checked" id="check[]"/>
      <label for="check[]">Ukuran Reklame</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="No. Telepon" checked="checked" id="check[]"/>
      <label for="check[]">No. Telepon</label></td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="check[]" value="Jenis Reklame" checked="checked" id="check[]"/>
      <label for="check[]">Jenis Reklame</label></td>
    </tr>
  </table>
  <label><br />
  </label>
  <table width="438" border="0">
    <tr>
      <td width="63">&nbsp;</td>
      <td width="144"><span class="style6">Status Validasi</span></td>
      <td width="101"><select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
        <option>Valid</option>
        <option>Tidak Valid</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
  </table>
  <table width="438" border="0">
    <tr>
      <td width="80">&nbsp;</td>
      <td width="348"><input type="submit" name="Submit" value="Submit" id="tombol">
	  &nbsp;<input type="reset" name="reset" value="Reset" id="tombol"></td>
      
    </tr>
  </table>
  <p>&nbsp;</p>
  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>

</form>