<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pentaga");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data) {
	global $conn;

	$namaLengkap = stripcslashes($data["namaLengkap"]);
	$noKK = $data["noKK"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT noKK FROM user WHERE noKK = '$noKK'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$namaLengkap', '$noKK', '$password')");

	return mysqli_affected_rows($conn);

}


function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$noKK = htmlspecialchars($data["noKK"]);
	$tempatLahir = htmlspecialchars($data["tempatLahir"]);
	$tanggalLahir = htmlspecialchars($data["tanggalLahir"]);
	$dusun = htmlspecialchars($data["dusun"]);
	$lorong = htmlspecialchars($data["lorong"]);
	$noRumah = htmlspecialchars($data["noRumah"]);
	$luasPetakRumah = htmlspecialchars($data["luasPetakRumah"]);
	$jumlahTanggungan = htmlspecialchars($data["jumlahTanggungan"]);
	$jumlahKendaraan = htmlspecialchars($data["jumlahKendaraan"]);
	$noHp = htmlspecialchars($data["noHp"]);
	$profesi = htmlspecialchars($data["profesi"]);
	$penghasilan = htmlspecialchars($data["penghasilan"]);
	$kepemilikanRumah = htmlspecialchars($data["kepemilikanRumah"]);
	$pernahMenerimaBantuan = htmlspecialchars($data["pernahMenerimaBantuan"]);
	$tagihanListrik = htmlspecialchars($data["tagihanListrik"]);
	// $tagihanListrikBukti = htmlspecialchars($data["tagihanListrikBukti"]);
	$tagihanAir = htmlspecialchars($data["tagihanAir"]);
	// $tagihanAirBukti = htmlspecialchars($data["tagihanAirBukti"]);
	$konstruksiRumah = htmlspecialchars($data["konstruksiRumah"]);
	// $konstruksiRumahBukti = htmlspecialchars($data["konstruksiRumahBukti"]);

	// upload gambar
	$tagihanListrikBukti = uploadTagihanListrik();
	if( !$tagihanListrikBukti ) {
		return false;
	}

	$tagihanAirBukti = uploadTagihanAir();
	if( !$tagihanAirBukti ) {
		return false;
	}
	
	$konstruksiRumahBukti = uploadKonstruksiRumah();
	if( !$konstruksiRumahBukti ) {
		return false;
	}

	mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$noKK', '$tagihanAir')");

	$query = " INSERT INTO warga VALUES 
	('', '$nama', '$noKK', '$tempatLahir', '$tanggalLahir', 
	'$dusun', '$lorong', '$noRumah', '$luasPetakRumah', 
	'$jumlahTanggungan', '$noHp', '$profesi', '$penghasilan', '$jumlahKendaraan',
    '$kepemilikanRumah', '$pernahMenerimaBantuan', 
	'$tagihanListrik', '$tagihanListrikBukti', '$tagihanAir', 
	'$tagihanAirBukti', '$konstruksiRumah','$konstruksiRumahBukti' )";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function uploadTagihanListrik() {

	$namaFile = $_FILES['tagihanListrikBukti']['name'];
	$ukuranFile = $_FILES['tagihanListrikBukti']['size'];
	$error = $_FILES['tagihanListrikBukti']['error'];
	$tmpName = $_FILES['tagihanListrikBukti']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih bukti tagihanListrik terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, "image" . $namaFileBaru);
	echo "Success Apload....";

	return $namaFileBaru;
}

function uploadTagihanAir() {

	$namaFile = $_FILES['tagihanAirBukti']['name'];
	$ukuranFile = $_FILES['tagihanAirBukti']['size'];
	$error = $_FILES['tagihanAirBukti']['error'];
	$tmpName = $_FILES['tagihanAirBukti']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih bukti tagihan air terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, "image" . $namaFileBaru);

	return $namaFileBaru;
}

function uploadKonstruksiRumah() {

	$namaFile = $_FILES['konstruksiRumahBukti']['name'];
	$ukuranFile = $_FILES['konstruksiRumahBukti']['size'];
	$error = $_FILES['konstruksiRumahBukti']['error'];
	$tmpName = $_FILES['konstruksiRumahBukti']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih bukti foto konstruksi rumah terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'image' . $namaFileBaru);
	// move_uploaded_file($tmpt, 'foderGambar/' . $namafile);

	return $namaFileBaru;
}




?>
