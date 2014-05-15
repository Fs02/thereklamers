<FORM ACTION="<?$_SERVER['PHP_SELF']?>" METHOD="POST" NAME="edit" enctype="multipart/form-data">
<table width="100%" height="511" border="0" align="center" cellpadding="0" cellspacing="0" id="tabel2" >	
	<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">PEMBAYARAN</th>
	</tr>

	
	<tr height="30px" >
	</tr>
	</tr>
		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">TANGGAL</td>
				<td align="left" valign="top" height="40">
					<input type="text" name="tgl" title="dd-mm-yyyy" size="15" valign="top" value="" >
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.edit.tgl);return false;" >
					<img valign="bottom" name="popcal" src="menu/calender/calender.png" alt="" width="20" height="20"></a>
				</td>
		</tr>
		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">ID PERUSAHAAN</td>
				<td><input type="text" name="no_telp" size="45" maxlength="50" id="isian2" value=""></td>
		</tr>
		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">ID REKLAME</td>
		  <td ><input type="text" name="no_spd" size="45" maxlength="50" id="isian2" value=""></td> 
				
		</tr>
		<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">UKURAN REKLAME</td>
<td valign="top">PANJANG  : 
  <input type="text" name="rk" size="10" maxlength="10" id="isian2" value="">
  &nbsp;m X&nbsp;&nbsp;
				LEBAR : 
	            <input type="text" name="dp" size="10" maxlength="10" id="isian2" value="">
	            m </td> 
				
		</tr>
		<tr>
			  <td height="30" >&nbsp;</td>
				<td valign="top">NAMA PEMOHON</td>
				<td><input type="text" name="nama" size="45" maxlength="50" id="isian2" value=""></td>
		</tr>
        <tr>
			  <td height="30" >&nbsp;</td>
				<td valign="top">NAMA PERUSAHAAN</td>
				<td><input type="text" name="nama" size="45" maxlength="50" id="isian2" value=""></td>
		</tr>
		<tr>
		<td width="20" height="30" >&nbsp;</td>
		<td width="0" valign="middle">JENIS PERUSAHAAN</td>
		<td>
			<?php
			include "koneksi.php";
			?>
			<select name="kategori" id="kategori" width="50">
				<option>--Pilih Jenis Perusahaan--</option>
				<?php
				//mengambil nama-nama propinsi yang ada di database
				$propinsi = mysql_query("SELECT * FROM tbl_kategori ORDER BY id");
				while($p=mysql_fetch_array($propinsi)){
					echo "<option value=\"$p[cat]\">$p[cat]</option>\n";
				}
				?>
			</select>
		</td>
	
	</tr>
		<tr>
			  <td>&nbsp;</td>
	<tr>
		<td width="20" height="30" >&nbsp;</td>
		<td width="0" valign="middle">JENIS USAHA</td>
		<td>
			<?php
			include "koneksi.php";
			?>
			<select name="sub" id="sub" width="50" >
				<option>-Pilih-</option>
				<?php
				//mengambil nama-nama propinsi yang ada di database
				$kota = mysql_query("SELECT * FROM tbl_kategori_sub");
				while($p=mysql_fetch_array($propinsi)){
					echo "<option value=\"$p[id_c]\">$p[cat]</option>\n";
				}
				echo "<option value=\"$p[cat]\">$p[cat]</option>\n";
				?>
			</select> 
		</td>

	<tr>
			  <td>&nbsp;</td>
			  
			  <td></td>
		
	</tr>
			
	
		<tr>
			  <td>&nbsp;</td>
			  <td></td>
			  <td><i>&nbsp;</td>
		</tr>

			<tr><td height="12"></td></tr>
			
			<tr>
			  <td>&nbsp;</td>
				<td valign="top">ALAMAT</td>
				<td><textarea name="alamat"  rows="6" cols="65" id="isian3"> </textarea></td>
			</tr>
			<tr><td height="12"></td></tr>
			
			<tr>
			  <td width="50" height="30">&nbsp;</td>
				<td width="0" valign="top">INPUT TOKEN</td>
		  <td ><input type="text" name="" size="12" maxlength="10" id="isian2" value=""> <em>Masukan 10 karakter yang ada dibukti pembayaran Anda</em></td> 
				
		</tr>
			
			<tr>
			  <td>&nbsp;</td>
				<td></td>
				<td>&nbsp;&nbsp;
				<input type="submit" name="Edit" value="Submit" id="tombol">&nbsp;
			  <input type="reset" name="reset" value="Reset" id="tombol"></td>
			</tr>
  </table>
</FORM>
