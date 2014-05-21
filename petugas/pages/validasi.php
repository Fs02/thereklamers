<FORM METHOD="POST" NAME="input" enctype="multipart/form-data">
<?php
	
	//Cek Tombol 
	if (isset($_POST['Submit']))  
	{
	
	/*	//cek valudasi
		if (isset($_POST['check']))
		{
			$strCheck = implode(",", $_POST['check']); 
		}else{
			$strCheck = "";
		}
		echo "Check in: " . $strCheck;
		exit();
	*/
	
	//Kirimkan Variabel
		$no_ktp = $_POST['no_ktp'];
		$id_petugas= $_POST['id_petugas'];
		$validasi= $_POST['validasi'];
	//validasi data jika nama dan pesan kosong
		if (empty($_POST['no_ktp'])|| empty($_POST['id_petugas'])/* || ($_POST['kategori']=="--Pilih Kategori--") */) 
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
			include "koneksi.php";
			//cek apakah id petugas sudah terdaftar
			$sql = "SELECT * FROM petugas where id_petugas = $id_petugas";
			$query = mysql_query($sql);
			
			//Masukan data ke Table Resi
			$sql = "INSERT INTO `resi`(`tanggal`, `no_ktp`, `id_petugas`) VALUES (SYSDATE(),$no_ktp,$id_petugas)";
			$query = mysql_query($sql);
			
			$sql = "UPDATE `pemohon` SET `status`='$validasi' WHERE no_ktp=$no_ktp";
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
      <td width="71">&nbsp;</td>
      <td width="105">&nbsp;</td>
      <td width="6">&nbsp;</td>
      <td width="415">&nbsp;</td>
      <td width="81">&nbsp;</td>
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
      <td width="101"><select name="validasi" id="validasi" onchange="MM_jumpMenu('parent',this,0)">
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