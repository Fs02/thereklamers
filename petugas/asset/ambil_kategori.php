<?php
include "../menu/koneksi.php";

$kategori = $_GET['kategori'];
$sub = $_GET['sub'];
$kota = mysql_query("SELECT id_c,cat FROM tbl_kategori_sub WHERE indx='$kategori'");
echo "<option>-Pilih-</option>";
while($k = mysql_fetch_array($kota)){
	$sel = ($k[cat]==$sub)? "selected" : "";
    echo "<option value=\"".$k['cat']."\">".$k['cat']."</option>\n";
}
?>
