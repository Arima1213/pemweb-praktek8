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

// mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// mengambil data dari form
	$nama = $_POST["nama"];
	$jkel = $_POST["jkel"];
	$email = $_POST["email"];
	$alamat = $_POST["alamat"];
	$kota = $_POST["kota"];
	$pesan = $_POST["pesan"];

	// menyimpan data ke dalam tabel kontak
	$sql = "INSERT INTO kontak (Nama, jkel, Email, Alamat, Kota, Pesan) VALUES ('$nama', '$jkel', '$email', '$alamat', '$kota', '$pesan')";
	if (mysqli_query($conn, $sql)) {
		echo "Data kontak berhasil ditambahkan";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

// menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kontak</title>
</head>
<body>
	<h2>Form Tambah Kontak</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<table>
			<tr>
				<td>Nama:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin:</td>
				<td>
					<input type="radio" name="jkel" value="Laki-laki">Laki-laki
					<input type="radio" name="jkel" value="Perempuan">Perempuan
				</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>Alamat:</td>
				<td><textarea name="alamat"></textarea></td>
			</tr>
			<tr>
				<td>Kota:</td>
				<td><input type="text" name="kota"></td>
			</tr>
			<tr>
				<td>Pesan:</td>
				<td><textarea name="pesan"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>
