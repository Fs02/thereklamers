<html>
	<head>
		<title>Aplikasi Pemasangan Reklame</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link href="asset/style.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		.style1 {color: #952b33}
        </style>
		<script type="text/javascript" src="asset/jquery.js"></script>
		<script type="text/javascript">
			var htmlobjek;
			$(document).ready(function(){
			  //apabila terjadi event onchange terhadap object <select id=propinsi>
			  $("#kategori").change(function(){
				var prop = $("#kategori").val();
				$.ajax({
					url: "asset/ambil_kategori.php",
					data: "kategori="+prop,
					cache: false,
					success: function(msg){
						//jika data sukses diambil dari server kita tampilkan
						//di <select id=kota>
						$("#sub").html(msg);
					}
				});
			  });
			});
		</script>

	<?
		$link="10.88.193.211";
	?>
	</head>
	<body>
		<br>
		<br>
		<br>
		<table width="959" border="0" align="center" cellpadding="0" cellspacing="0" background='asset/bg1.jpg' id="tabel">
  
		<tr><td width="10" height="2"></td><td width="250"></td><td width="9"></td><td width="619"></td><td width="17"></td></tr>
		<tr   bgcolor="#23a8e0"><td height="1"></td><td></td><td></td><td></td><td></td></tr>
		<tr   bgcolor="white"><td height="1"></td><td></td><td></td><td></td><td></td></tr>
		<tr   bgcolor="#FFFFFF"><td height="19" colspan="30"><div align="center"><span class="header"><span class="style1">( Aplikasi Pemasangan Reklame )</span><br>
        </span>Kota Bandung</div></td></tr>
		<tr   bgcolor="white"><td height="1" colspan="30"></td></tr>
		<tr   bgcolor="#23a8e0"><td height="1" colspan="30"></td></tr>
		<tr>
			<td>&nbsp;</td>
			<td height="27"  ><div align="center"><? echo" Tanggal : ".date("Y - m- d");?></div></td>
			<td>&nbsp;</td>
			<td align="right">&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr  >
			<td></td>
			<td align="center"  ><div align="center"></div></td>
			<td rowspan="4"  >&nbsp;</td>
			<td rowspan="4" valign="top"  >
			<table width="769" border="0" cellspacing="0" cellpadding="0" id="tabel2">
			<tr>
				<td width="594" height="89">
				<?php //DISINI UNTUK SET HALAMAN PHP
				$page = (isset($_GET['page']))? $_GET['page'] : "beranda";
				switch ($page) {
					case 'beranda': include "pages/beranda.php"; break;
					case 'validasi': include "pages/validasi.php"; break;
					case 'survey'	: include "pages/survey.php"; break;
					case 'perizinan' : include "pages/perizinan.php"; break;
					case 'faq' : include "pages/faq.php"; break;
				}
				?>				</td>
			</tr>
			</table>			</td>
			
			<td rowspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;</td>
			<td align="left" id="menu" valign="top">
			<table width="101%" border="0" align="center" valign="middle">
				<tr><td > </td></tr>
				<tr><td height="4"> </td></tr>
				<tr id="utama"> <td>
					<strong><img src="asset/home.png" width="30" height="30" align="middle"> 
					<a color="white" href="index.php?page=beranda" title="Halaman Awal" style="text-decoration: none;" ><font color="white">BERANDA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></a></strong></td>
				</tr>
				<tr id="utama"> <td>
					<strong><img src="asset/lihat.png" width="30" height="30" align="middle"> 
					<a href="index.php?page=validasi" title="Validasi" style="text-decoration: none;" ><font color="white">VALIDASI</font><font color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></a></strong><br> 
					 </td>
				</tr>
                <tr id="utama"> <td>
					<strong><img src="asset/cari.png" width="30" height="30" align="middle">
					<a href="index.php?page=survey" title="Survey" style="text-decoration: none;" ><font color="white">SURVEY</font><font color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></a></strong><br>
					</td>
				</tr>	
					<tr id="utama"> <td>
						<strong><img src="asset/save.png" width="30" height="30" align="middle">
						<a href="index.php?page=perizinan" title="Perizinan" style="text-decoration: none;" ><font color="white">PERIZINAN</font><font color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></a></strong><br>
						</td>
					</tr>
				<tr id="utama"> <td>
					<strong><img src="asset/about.png" width="30" height="30" align="middle"> 
					<a href="index.php?page=faq" title="FAQ" style="text-decoration: none;" ><font color="white"> FAQ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></a></strong><br>
					</td>
				</tr>
				<tr><td height="4"> </td></tr>
				<tr> <td></td></tr>
				<tr><td > </td></tr>
		  </table>			</td>
		</tr>
		<tr  ><td height="24"  >&nbsp;</td></tr>
		<tr  ><td height="12"  >&nbsp;</td></tr>
		<tr  ><td  >&nbsp;</td><td height="22"  >&nbsp;</td><td  >&nbsp;</td><td  >&nbsp;</td><td  >&nbsp;</td></tr>
		<tr bgcolor="#e6eaef"  >
			<td height="39" colspan="5"  ><div align="center">
			  <p><br>
			@Group 1_RPL_IF3605</p>
			  <p>Telkom University, Bandung</p>
			</div>			</td>
		</tr>

	</table>
<iframe width=174 height=189 name="gToday:normal:menu/calender/normal.js" id="gToday:normal:menu/calender/normal.js" src="menu/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
		</iframe>
	</body>
</html>