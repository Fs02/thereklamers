<table width="100%" border="0" align="center" valign="top" cellpadding="7" cellspacing="0">
		<tr height="30px" style="font-size:16px; color:white;">
			<th colspan="4" bgcolor="#952b33">WAITING LIST</th>
		</tr>
		
		<tr>
			<td height="30px" width="30"></td>
			<td>
            <table border='1' align='center'>
            <tr>
				<th>No</th>
				<th>ID Pemasangan</th>
				<th>Nama Perusahaan</th>
				<th>Merek Reklame</th>
				<th>Jenis Reklame</th>
				<th>Nama Pemohon</th>
				<th>Nama Petugas</th>
				<th>Status</th>
			</tr>
           
                <?php
        
                    include 'koneksi.php';
                    $query = "SELECT * FROM dipasang ";
                    $query = "SELECT * FROM perusahaan ";
					$query = "SELECT * FROM pemohon ";
					
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        
                        //$id_pemasangan 	= $row['id_pemasangan'];
                        //$nama_perusahaan 	= $row['nama_perusahaan'];
                        //$merek 			= $row['merek'];
                        //$jenis 			= $row['jenis'];
						$nama 				= $row['nama'];
                        //$nama_petugas 	= $row['nama_petugas'];
                        $status 			= $row['status'];
                        
                    echo "<tr>
							<td>$no</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>$nama</td>
							<td></td>
							<td>$status</td>
						</tr>";
                    $no++;
                    }
                
                ?>
            
        
        </table>
            </td>
		</tr>
		<tr>
			<td height="30px"></td>
			<td></td>
		  <td></td>
		  <td></td>
		</tr>
</table>
