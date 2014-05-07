<?php
/*
 * Fungsi isi data pemohon
 */
function isiDataPemohon(){
	if ($_REQUEST['nama'] && $_REQUEST['noktp'] && $_REQUEST['notelp'] && $_REQUEST['alamat'] && $_REQUEST['email']){
		print("tulis ke db coming soon!");
		return TRUE;
	} else {
		return FALSE;
	}
}

/*
 * Fungsi isi data perusahaan
 */
function isiDataPerusahaan(){
	if ($_REQUEST['id_pemohon'] && $_REQUEST['nama'] && $_REQUEST['jenisusaha'] && $_REQUEST['notelp'] && $_REQUEST['npwp'] && $_REQUEST['jenisperusahaan']){
		print("tulis ke db comung soon!");
		return TRUE;
	} else {
		return FALSE;
	}
}

/*
 * Fungsi isi data reklame
 */
function isiDataReklame(){
	if ($_REQUEST['id_perusahaan'] && $_REQUEST['merk'] && $_REQUEST['jenis'] && $_REQUEST['ukuran'] && $_REQUEST['tglmulai'] && $_REQUEST['tglberakhir']){
		print("tulis ke db coming soon!");
		return TRUE;
	} else {
		return FALSE;
	}
}
?>

<html>
<body>
	<?php
	$id_pemohon = "";
	$id_perusahaan = "";

	if ($_REQUEST['step'] == "1") {
	 	print("form pemohon");
	 	?>
		<a href="formulir.php?step=2&nama=asd&noktp=asda&notelp=ad&alamat=asdas&email=asdasd">Anggap aja submit</a>
		<?php
	} elseif ($_REQUEST['step'] == "2"){
		// check apakah form telah di submit
		if (isiDataPemohon()){
			print("tampilkan pesan berhasil form pemohon dan form perushaan");
		} else {
			print("selamat anda nyasar atau form gagal, silahkan ulangi langkah dari awal");
		}
	} elseif ($_REQUEST['step'] == "3"){
		if (isiDataPerusahaan()){
			print("tampilkan pesan berhasil form perushaan dan tampilkan form reklame");
		} else {
			print("selamat anda nyasar atau form gagal, silahkan ulangi langkah dari awal");
		}
	} elseif ($_REQUEST['step'] == "4"){
		if (isiDataReklame()){
			print("anda berhasil menyelesaikan prosedur pertama, untuk selanjutnya silahkan tunggu email validasi dan survey lapangan");
		} else {
			print("selamat anda nyasar atau form gagal, silahkan ulangi langkah dari awal");
		}
	}
	?>
</body>
</html>