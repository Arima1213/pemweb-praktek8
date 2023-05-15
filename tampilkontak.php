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

// mengambil data kontak dari tabel kontak
$sql = "SELECT * FROM kontak";
$result = mysqli_query($conn, $sql);

// mengecek apakah query berhasil
if (mysqli_num_rows($result) > 0) {
	// menampilkan data kontak dalam tabel
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>Nama</th><th>Jenis Kelamin</th><th>Email</th><th>Alamat</th><th>Kota</th><th>Pesan</th></tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nama'] . "</td><td>" . $row['jkel'] . "</td><td>" . $row['email'] . "</td><td>" . $row['alamat'] . "</td><td>" . $row['kota'] . "</td><td>" . $row['pesan'] . "</td></tr>";
	}
	echo "</table>";
} else {
	echo "Tidak ada data kontak";
}

// menutup koneksi ke database
mysqli_close($conn);
?>
