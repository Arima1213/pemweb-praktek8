<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tugas8");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$JenisPendaftaran = $_POST['JenisPendaftaran'];
$TanggalMasukSekolah = $_POST['TanggalMasukSekolah'];
$NIS = $_POST['NIS'];
$NoPesertaUjian = $_POST['NoPesertaUjian'];
$PAUD = $_POST['PAUD'];
$TK = $_POST['TK'];
$SKHUN = $_POST['SKHUN'];
$Ijazah = $_POST['Ijazah'];
$Hobi = $_POST['Hobi'];
$citacita = $_POST['citacita'];
$nama = $_POST['nama'];
$jkelamin = $_POST['jkelamin'];
$NISN = $_POST['NISN'];
$NIK = $_POST['NIK'];
$TempatLahir = $_POST['TempatLahir'];
$TanggalLahir = $_POST['TanggalLahir'];
$Agama = $_POST['Agama'];
$BerkebutuhanKhusus = $_POST['BerkebutuhanKhusus'];
$AlamatJalan = $_POST['AlamatJalan'];
$RT = $_POST['RT'];
$RW = $_POST['RW'];
$Dusun = $_POST['Dusun'];
$Desa = $_POST['Desa'];
$Kecamatan = $_POST['Kecamatan'];
$KodePos = $_POST['KodePos'];
$TempatTinggal = $_POST['TempatTinggal'];
$Transportasi = $_POST['Transportasi'];
$NoHP = $_POST['NoHP'];
$NoTelepon = $_POST['NoTelepon'];
$Email = $_POST['Email'];
$KIP = $_POST['KIP'];
$NoKIP = $_POST['NoKIP'];
$Kewarganegaraan = $_POST['Kewarganegaraan'];
$NamaAyah = $_POST['NamaAyah'];
$TahunLahirAyah = $_POST['TahunLahirAyah'];
$PendidikanAyah = $_POST['PendidikanAyah'];
$PekerjaanAyah = $_POST['PekerjaanAyah'];
$PenghasilanBulananAyah = $_POST['PenghasilanBulananAyah'];
$BerkebutuhanKhususAyah = $_POST['BerkebutuhanKhususAyah'];
$NamaIbu = $_POST['NamaIbu'];
$TahunLahirIbu = $_POST['TahunLahirIbu'];
$PendidikanIbu = $_POST['PendidikanIbu'];
$PekerjaanIbu = $_POST['PekerjaanIbu'];
$PenghasilanBulananIbu = $_POST['PenghasilanBulananIbu'];
$BerkebutuhanKhususIbu = $_POST['BerkebutuhanKhususIbu'];

$TanggalMasukSekolah = date("Y-m-d", strtotime(str_replace("/", "-", $TanggalMasukSekolah)));
$TanggalLahir = date("Y-m-d", strtotime(str_replace("/", "-", $TanggalLahir)));
$TahunLahirAyah = date("Y-m-d", strtotime(str_replace("/", "-", $TahunLahirAyah)));
$TahunLahirIbu = date("Y-m-d", strtotime(str_replace("/", "-", $TahunLahirIbu)));

$sqlRegis = "INSERT INTO tugas8.regispesertadidik
            (`Jenis Pendaftaran`, TanggalMasukSekolah, NIS, NomerPesertaUjian, PAUD, TK, SKHUN, Ijazah, hobi, Citacita)
            VALUES('$JenisPendaftaran', '$TanggalMasukSekolah', '$NIS', $NoPesertaUjian, '$PAUD', '$TK', '$SKHUN', '$Ijazah', '$Hobi', '$citacita');
            ";

            

$sqlDatadiri = "INSERT INTO tugas8.datapribadi
                (Nama, JenisKelamin, NISN, NIK, TempatLahir, TanggalLahir, Agama, BerkebutuhanKhusus, AlamatJalan, RT, RW, Dusun, Desa, Kecamatan, KodePos, TempatTinggal, Transportasi, NomorHp, NoTelepon, EmailPribadi, PenerimaKIP, NoKIP, Kewarganegaraan)
                VALUES('$nama', '$jkelamin', '$NISN', '$NIK', '$TempatLahir', '$TanggalLahir', '$Agama', '$BerkebutuhanKhusus',
                 '$AlamatJalan', '$RT', '$RW', '$Dusun', '$Desa', '$Kecamatan', '$KodePos', '$TempatTinggal', '$Transportasi', '$NoHP', '$NoTelepon', '$Email', '$KIP', '$NoKIP', '$Kewarganegaraan');
                ";

$sqlAyh = "INSERT INTO tugas8.dataayah
            (NamaAyah, TahunLahirAyah, PendidikanAyah, PenghasilanBulananAyah, BerkebutuhanKhususAyah, PekerjaanAyah)
            VALUES('$NamaAyah', '$TahunLahirAyah', '$PendidikanAyah', '$PenghasilanBulananAyah', '$BerkebutuhanKhususAyah', '$PekerjaanAyah');";

$sqlIbu = "INSERT INTO tugas8.dataibu
            (NamaIbu, TahunLahirIbu, PendidikanIbu, PenghasilanBulananIbu, BerkebutuhanKhususIbu, PekerjaanIbu)
            VALUES('$NamaIbu', '$TahunLahirIbu', '$PendidikanIbu', '$PenghasilanBulananIbu', '$BerkebutuhanKhususIbu', '$PekerjaanIbu');";

if (mysqli_query($conn, $sqlRegis) ) {
    if (mysqli_query($conn, $sqlDatadiri) ) {
        if (mysqli_query($conn, $sqlAyh) ) {
            if (mysqli_query($conn, $sqlIbu) ) {
                
                // Eksekusi kode SQL
                
                // Tampilkan pesan
                echo "Data berhasil disimpan.";
                
                // Redirect ke halaman login.php setelah beberapa detik
                header("refresh:5; url=login.php");
                exit();
                ?>
                <!DOCTYPE html>
                <html>
                    <head>
                        <title>Redirecting...</title>
                        <meta http-equiv="refresh" content="5;URL='login.php'">
                    </head>
                    <body>
                        <h1>Data berhasil disimpan.</h1>
                        <p>Anda akan dialihkan ke halaman login dalam beberapa detik...</p>
                        <p>Jika tidak dialihkan, silakan klik <a href="login.php">di sini</a>.</p>
                    </body>
                </html>
                
                <?php
            } else {
                echo "Error: " . $sqlIbu . "<br>" . mysqli_error($conn);
            }
            
        } else {
            echo "Error: " . $sqlAyh . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sqlDatadiri . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sqlRegis . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>
