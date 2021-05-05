<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pentaga");


// function query($query) {
// 	global $conn;
// 	$result = mysqli_query($conn, $query);
// 	$rows = [];
// 	while( $row = mysqli_fetch_assoc($result) ) {
// 		$rows[] = $row;
// 	}
// 	return $rows;
// }

// function registrasi($data) {
// 	global $conn;

// 	$namaLengkap = stripcslashes($data["namaLengkap"]);
// 	$noKK = $data["noKK"];
// 	$password = mysqli_real_escape_string($conn, $data["password"]);
// 	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


// 	// cek username sudah ada atau belum
// 	$result = mysqli_query($conn, "SELECT noKK FROM user WHERE noKK = '$noKK'");

// 	if( mysqli_fetch_assoc($result) ) {
// 		echo "<script>
// 				alert('username sudah terdaftar!')
// 		      </script>";
// 		return false;
// 	}


// 	// cek konfirmasi password
// 	if( $password !== $password2 ) {
// 		echo "<script>
// 				alert('konfirmasi password tidak sesuai!');
// 		      </script>";
// 		return false;
// 	}

// 	// enkripsi password
// 	$password = password_hash($password, PASSWORD_DEFAULT);

// 	// tambahkan userbaru ke database
// 	mysqli_query($conn, "INSERT INTO user VALUES('', '$noKK', '$password', '$namaLengkap')");

// 	return mysqli_affected_rows($conn);

// }




 ?>
