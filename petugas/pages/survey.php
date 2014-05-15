<table width="100%" border="0" align="center" valign="middle" cellpadding="0" cellspacing="0">
		<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">HASIL SURVEY</th>
		</tr>
</table>

<form method="post" enctype="multipart/form-data" action="uploader/proses.php?petugas=<?=$petugas?>" target="blank">
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
      <td width="105"><span class="style6">ID Survey</span></td>
      <td width="6">:</td>
      <td width="415"><label>
      <input type="text" name="id_srvy" id="id_srvy" />
      </label></td>
      <td width="81">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">Tanggal Survey</span></td>
      <td>:</td>
      <td align="left" valign="top" height="40">
					<input type="text" name="tgl" title="dd-mm-yyyy" size="15" valign="top" value="" >
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.edit.tgl);return false;" >
					<img valign="bottom" name="popcal" src="menu/calender/calender.png" alt="" width="20" height="20"></a>
	  </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td>&nbsp;</td>
      <td>:</td>
      <td><label></label></td>
      <td>&nbsp;</td>
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
      <input type="text" name="id_peg" id="id_peg" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style6">Nama Pegawai</span></td>
      <td>:</td>
      <td><label>
      <input type="text" name="nama_peg" id="nama_peg" />
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
      <td><strong>LAPANGAN</strong></td>
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
      <td><span class="style6">ID Lokasi</span></td>
      <td>:</td>
      <td><label>
      <input type="text" name="id_lpg" id="id_lpg" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Kelurahan</td>
      <td>:</td>
      <td><label>
      <input type="text" name="kel" id="kel" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Kecamatan</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="text" name="kec" id="kec" />
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <label></label>
  <table width="438" border="0">
    <tr>
      <td width="68">&nbsp;</td>
      <td width="216"><span class="style6">Status Survey</span></td>
      <td width="140"><select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
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