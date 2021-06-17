<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
h4{
	font-weight: bold
}
</style>
</head>
<body>

<div class="container">
<h4>Komentar</h4>
<p>Silahkan tambahkan komentar terkait topik pembahasan pada artikel :</p>            
<table class="table">
	<thead>
	<tr>
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Komentar</th>
	</tr>
	</thead>
	<?php
	// Masukkan koneksi
	include 'm_db.php';
	// Ambil data id artikel
	$Id  = $_GET['Id'];
	// Query untuk mengambil data komentar sesuai id artikel
	$sql = "SELECT * FROM komentar WHERE id_art = '$Id' ";
	$que = mysqli_query($mysqli,$sql);
	// Tampilkan komentar
	while ($res = mysqli_fetch_array($que)) { ?>
	<tbody>
	<tr>
		<td><?php echo $res['nama']; ?></td>
		<td><?php echo $res['tanggal']; ?></td>
		<td><?php echo $res['isi_komentar']; ?></td>
	</tr>
	</tbody>
	<?php } ?>
</table>
</div>

</body>
</html>
<br>
<br>
<br>
<form method="post">
	<input type="text" name="nama" placeholder="Masukkan Nama" value="<?php echo $_SESSION['nama']; ?>" required> 
    <br>
    <br>
	<textarea name="isi" rows="10" placeholder="Masukkan Isi Komentar Anda" required></textarea> 
    <br>
    <br>
	<input type="submit" name="btnkomen">
</form>
<?php
	// Jika tombol submit di klik
	if (isset($_POST['btnkomen'])) {
		// Ambil data nama dari input yang ber-name 'nama'
		$nama = $_POST['nama'];
		// Ambil data isi dari yang ber-name 'isi'
		$isi  = $_POST['isi'];
		// Tanggal sekarang (Sesuai tanggal di komputer)
		$tgl  = date("d-m-Y");

		// Simpan data ke database
		$sql  = "INSERT INTO komentar VALUES ('', '$Id', '$nama', '$tgl', '$isi')";
		$que  = mysqli_query($mysqli,$sql);

		// Refresh halaman dengan durasi 1 detik
		echo "<meta http-equiv='refresh' content='1;url=v_artikel.php?Id=".$Id."'>";
        
	}
?>
