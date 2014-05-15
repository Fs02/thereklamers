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
			<th colspan="4" bgcolor="#952b33">FORM PERIZINAN</th>
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
      <td><label>
        <input type="text" name="tgl" title="dd-mm-yyyy" size="15" valign="top" value="" />
      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.edit.tgl);return false;" > <img src="menu/calender/calender.png" alt="" name="popcal" width="20" height="20" id="popcal" valign="bottom" /></a></label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>No Surat</td>
      <td>:</td>
      <td align="left" valign="top" height="40"><label>
        <input type="text" name="no_srt" id="no_srt" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td>No KTP</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="text" name="no_ktp" id="no_ktp" />
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
  </table>
  <label></label>
  <table width="438" border="0">
    <tr>
      <td width="68">&nbsp;</td>
      <td width="216"><span class="style6">Status Perizinan</span></td>
      <td width="140"><select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
        <option>Valid</option>
        <option>Tidak Valid</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Status Pembayaran</td>
      <td><select name="jumpMenu3" id="jumpMenu3" onchange="MM_jumpMenu('parent',this,0)">
        <option>Lunas</option>
        <option>Belum Lunas</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Surat Perizinan</td>
      <td><select name="jumpMenu2" id="jumpMenu2" onchange="MM_jumpMenu('parent',this,0)">
        <option>Disetujui</option>
        <option>Tidak disetujui</option>
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