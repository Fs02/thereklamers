<?php
//Cek Tombol 
if (isset($_POST['submit']))  {
	//Kirimkan Variabel
	$id_pegawai = $_POST['id_pegawai'];
	$tgl = $_POST['tgl'];
	$status = $_POST['status'];
	$id_pemasangan = $_POST['id_pemasangan'];
	
	include ROOT_DIR."koneksi.php";	
	$sql = "INSERT INTO disurvey  VALUES (NULL,'$tgl','$status','$id_pemasangan','$id_pegawai')";
	echo $sql;
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
?>
<table width="100%" border="0" align="center" valign="middle" cellpadding="0" cellspacing="0">
		<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">HASIL SURVEY</th>
		</tr>
</table>

<form method="POST" NAME="input" enctype="multipart/form-data">
  <table width="770" border="0">
    
    
    
    <tr>
      <td width="71" height="23">&nbsp;</td>
      <td width="105">&nbsp;</td>
      <td width="6">&nbsp;</td>
      <td width="415"><label></label></td>
      <td width="81">&nbsp;</td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><strong>SEKRETARIAT</strong></td>
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
      <td><span class="style6">ID Pegawai</span></td>
      <td>:</td>
      <td><label>
      <input type="text" name="id_pegawai" id="id_pegawai" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>ID Pemasangan</td>
      <td>&nbsp;</td>
      <td><input type="text" name="id_pemasangan" id="nama_pegawai2" /></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">Tanggal Survey</span></td>
      <td>&nbsp;</td>
      <td><input type="text" name="tgl" title="dd-mm-yyyy" size="15" valign="top" value="" />
        <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.edit.tgl);return false;" > <img src="menu/calender/calender.png" alt="" name="popcal" width="20" height="20" id="popcal" valign="bottom" /></a> </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <label></label>
  <table width="438" border="0">
    <tr>
      <td width="77">&nbsp;</td>
      <td width="207"><span class="style6">Status Survey</span></td>
      <td width="140"><select name="status" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
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