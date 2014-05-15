<head>
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
Function disableclick(e)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}

</script>
</head>

<html>
<body oncontextmenu="return false">

<?php
//Panggil Koneksi
include "koneksi.php";

// Cek nip
if (isset($_GET['no_telp'])) {
	$no_telp = $_GET['no_telp'];
	 
	//$foto = $_GET['foto'];
// membaca nama file yang akan dihapus berdasarkan nip
$query   = "SELECT namafoto FROM pelanggan WHERE no_tlp ='$no_telp'";
$hasil   = mysql_query($query);
$data    = mysql_fetch_array($hasil);
$namafoto = $data['namafoto'];
} else {
	die ("Error. Tak ada No Telepon yang dipilih Silakan cek kembali! ");	
}
?>
<form align="center">
	<table border="0" width="40%" height="40%>
	<tr>
	<td height="20">
	
		<object data="../images/<?=$namafoto?>" type="application/pdf" width="100%" height="100%" align="center" ></object>
	
	</td >
	</tr>
	</table>
<form>
</body>
</html>