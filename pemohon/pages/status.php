

<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
<table width="100%" border="0" align="center" valign="middle" cellpadding="0" cellspacing="0">
		<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">LIHAT STATUS</th>
		</tr>
</table>
&nbsp;&nbsp;&nbsp;
<p><strong>Pencarian Nomor Resi</strong><br>
  <br>
</p>
<form action="" method="post" name="pencarian" >
  <input type="text" name="search" id="isian">
  <input type="submit" name="submit" id="tombol" value="CARI"><br>
  &nbsp;<br>&nbsp;
</form>
<form border="1">
<div align='center'><h3>STATUS VALIDASI PEMOHON PEMASANGAN REKLAME</h3></div>
&nbsp;
<table border='0' width='94%'>
<?php
		$data=false;
        if (isset($_POST['submit']))  {
		$resi= $_POST['search'];
		
		$data=true;
			
                    include 'koneksi.php';
					
					$sql = "select p.nama_perusahaan,r.merek,o.nama,o.status,p.status,r.status,r.id_reklame from perusahaan p,reklame r,pemohon o where p.id_perusahaan=r.id_perusahaan AND p.id_perusahaan=o.id_perusahaan AND r.id_reklame in(select id_reklame from dipasang d where d.id_pemasangan in(select id_pemasangan from resi where no_resi=$resi))";
                    
					$query = mysql_query($sql);
							                    
	                    while($hasil = mysql_fetch_array($query, MYSQL_NUM)){
                        
                        $nama_perusahaan 		= $hasil[0];
	                    $merek 			    	= $hasil[1];
						$nama 					= $hasil[2];
                        
                        $status_pemohon 		= $hasil[3];
						$status_perusahaan 		= $hasil[4];
						$status_reklame 		= $hasil[5];
						$id_reklame 			= $hasil[6];
						
						
					$sql = "SELECT status FROM disurvey s WHERE s.id_pemasangan in(SELECT id_pemasangan FROM dipasang d WHERE d.id_reklame='$id_reklame')";
					$query = mysql_query($sql);
					$row = mysql_fetch_array($query, MYSQL_NUM);
					$status_survey 			= empty($row[0]) ? "Belum diverifikasi" : $row[0];
              
					
                    }
}        
                ?>
<tr>
  <td width='49'>&nbsp;</td>
<td width='295'><span class="style1">NAMA PERUSAHAAN</span></td>
<td width='18'>:</td>
<td width="617"><?php if ($data){ echo "$nama_perusahaan"; }?></td>
</tr>
<tr>
  <td width='49'>&nbsp;</td>
<td width='295'><span class="style1">MEREK </span></td>
<td width='18'>:</td>
<td><?php if ($data){echo "$merek";}?></td>
</tr>
<tr>
  <td width='49'>&nbsp;</td>
<td width='295'><span class="style1">NAMA PEMOHON</span></td>
<td width='18'>:</td>
<td><?php if ($data){echo "$nama";}?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><span class="style1">STATUS</span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><span class="style1">PEMOHON</span></td>
  <td>:</td>
  <td><?php if ($data){echo "$status_pemohon";}?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><span class="style1">PERUSAHAAN</span></td>
  <td>:</td>
  <td><?php if ($data){echo "$status_perusahaan";}?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><span class="style1">REKLAME</span></td>
  <td>:</td>
  <td><?php if ($data){echo "$status_reklame";}?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><span class="style1">SURVEY</span></td>
  <td>:</td>
  <td><?php if ($data){echo "$status_survey";}?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><a href="javascript:window.print()"><img src='asset/printer.png' width='50' height='50' align="right" title='cetak status'></a></td>
</tr>
</table>
<br>
<br>
<br>
<br>
</form>