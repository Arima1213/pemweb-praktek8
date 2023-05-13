<!DOCTYPE html>
<html>
<head>
	<title>Form Kontak</title>
</head>
<body>
	<h1>Form Kontak</h1>
	<form action="kontak.php" method="post">
		<label for="nama">Nama:</label>
		<input type="text" id="nama" name="nama" required><br><br>

		<label for="jkel">Jenis Kelamin:</label>
		<input type="radio" id="jkel" name="jkel" value="Laki-laki" required>Laki-laki
		<input type="radio" id="jkel" name="jkel" value="Perempuan" required>Perempuan<br><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>

		<label for="alamat">Alamat:</label>
		<input type="text" id="alamat" name="alamat" required><br><br>

		<label for="kota">Kota:</label>
		<input type="text" id="kota" name="kota" required><br><br>

		<label for="pesan">Pesan:</label>
		<textarea id="pesan" name="pesan"></textarea><br><br>

		<input type="submit" name="submit" value="Kirim">
	</form>
	<br><br>
</body>
</html>

<?php
// konfigurasi koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "latihan";

// membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $database);

// mengecek apakah koneksi berhasil
if (!$conn) {
	die("Koneksi gagal: " . mysqli_connect_error());
}

// memproses form saat tombol submit ditekan
if (isset($_POST['submit'])) {
	// menyimpan data form ke dalam variabel
	$nama = $_POST['nama'];
	$jkel = $_POST['jkel'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];
	$pesan = $_POST['pesan'];

	// menyimpan data ke dalam tabel kontak
	$sql = "INSERT INTO kontak (nama, jkel, email, alamat, kota, pesan) VALUES ('$nama', '$jkel', '$email', '$alamat', '$kota', '$pesan')";
	if (mysqli_query($conn, $sql)) {
		echo "Data kontak berhasil disimpan";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// menutup koneksi ke database
	mysqli_close($conn);
}
?>
