<style type="text/css">
<!--
.style2 {font-size: x-small}
.style3 {font-size: small}
-->
</style>
<table width="100%" border="0" align="left" valign="top" cellpadding="7" cellspacing="0">
		<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">DAFTAR</th>
		</tr>
		
		<tr>
			<td height="30px" width="0"></td>
		  <td>
            <table width="713" border='1' align='left' bordercolor="#952b33" color="#952b33">
<tr>
				<th width="27" rowspan="2">No</th>
		  <th width="126" rowspan="2">Perusahaan</th>
		  <th width="111" rowspan="2">Reklame</th>
		  <th width="212" rowspan="2">Pemohon</th>
		  <th colspan="4">Status</th>
                <th width="75" rowspan="2">Penerbitan</th>
			</tr>
            <tr>
              <th width="25"><span class="style2"><img src="asset/pemohon.png" align="center" width="24" height="24" title="pemohon"></span></th>
              <th width="26"><span class="style2"><img src="asset/perusahaan.png" align="center" width="24" height="24" title="perusahaan"></span></th>
              <th width="28"><span class="style2"><img src="asset/reclame.png" align="center" width="24" height="20" title="reklame"></span></th>
              <th width="25"><span class="style2"><img src="asset/survey.png" align="center" width="24" height="24" title="survey"></span></th>
            </tr>
           
                <?php
        			
					$valid_html = "<center><img src='asset/valid.jpg' height='24' width='24'></center>";
					$invalid_html = "<center><img src='asset/invalid.jpg' height='24' width='24'></center>";
					$unknown_html = "<center><img src='asset/unknown.jpg' height='24' width='24'></center>";
					$email_icon = "<center><img src='asset/email.png' height='24' width='24'></center>";
					
					
                    include 'koneksi.php';
					
					/*
					 * get data
					 */
					$sql = "select p.nama_perusahaan,r.merek,o.nama,o.status,p.status,r.status, p.id_perusahaan, o.no_ktp, r.id_reklame from perusahaan p,reklame r,pemohon o where p.id_perusahaan=r.id_perusahaan AND p.id_perusahaan=o.id_perusahaan;";                    
					$query = mysql_query($sql);
                    $no = 1;
                    while($row = mysql_fetch_array($query, MYSQL_NUM)){
                        $nama_perusahaan = $row[0];
						$merek = $row[1];
						$nama_pemohon = $row[2];
						$status_pemohon = $row[3] == 'Valid' ? $valid_html : ($row[3] == 'Tidak Valid' ? $invalid_html : $unknown_html);
						$status_perusahaan = $row[4] == 'Valid' ? $valid_html : ($row[4] == 'Tidak Valid' ? $invalid_html : $unknown_html);
						$status_reklame = $row[5] == 'Valid' ? $valid_html : ($row[5] == 'Tidak Valid' ? $invalid_html : $unknown_html);
						$id_perusahaan = $row[6];
						$id_pemohon = $row[7];
						$id_reklame = $row[8];
						$validasi_url = "index.php?page=validasi&perusahaan=$id_perusahaan&reklame=$id_reklame&pemohon=$id_pemohon";
                    
					$sql_ = "SELECT id_survey, status, id_pemasangan FROM disurvey s WHERE s.id_pemasangan in(SELECT id_pemasangan FROM dipasang d WHERE d.id_reklame in (SELECT id_reklame from reklame WHERE id_reklame='$id_reklame'))";
					$query_ = mysql_query($sql_);
					$row_ = mysql_fetch_array($query_, MYSQL_NUM);
					$id_disurvey = $row_[0];
					$status_disurvey = $row_[1] == 'Valid' ? $valid_html : ($row_[1] == 'Tidak Valid' ? $invalid_html : $unknown_html);
					
					$sql_ = "SELECT id_pemasangan from dipasang where id_reklame='$id_reklame'";
					$query_ = mysql_query($sql_);
					$row_ = mysql_fetch_array($query_, MYSQL_NUM);
					$id_pemasangan = $row_[0];
                    echo "<tr>
							<td><span class='style3'>$no</span></td>
							<td><span class='style3'>$nama_perusahaan</span></td>
							<td><span class='style3'>$merek</span></td>
							<td><span class='style3'>$nama_pemohon</span></td>
							<td><a href='$validasi_url'>$status_perusahaan</a></td>
							<td><a href='$validasi_url'>$status_pemohon</a></td>
							<td><a href='$validasi_url'>$status_reklame</a></td>
							<td><a href='index.php?page=survey&id_pemasangan=$id_pemasangan'>$status_disurvey</a></td> 								
							<td><a href='asset/email.png' title='kirim email'>$email_icon</a></td>

						</tr>
						
						";
                    $no++;
                    }
                
                ?>
        </table>
          </td>
		</tr>
		<tr>
			<td height="30px"></td>
			<td><p>Keterangan :</p>
		    <p class="style3"><span class="style2"><img src="asset/pemohon.png" align="center" width="18" height="18"  /></span> Status Pemohon</p>
		    <p class="style3"><span class="style2"><img src="asset/perusahaan.png" align="center" width="18" height="18" /></span> Status Perusahaan</p>
            <p class="style3"><span class="style2"><img src="asset/reclame.png" align="center" width="18" height="18" /></span> Status Reklame</p>
            <p class="style3"><span class="style2"><img src="asset/survey.png" align="center" width="18" height="18" /></span> Status Survey</p>
          <p class="style3"><span class="style2"><img src="asset/email.png" align="center" width="18" height="18" /></span> Kirimkan Email</p></td>
		  <td></td>
		  <td></td>
		</tr>
</table>
