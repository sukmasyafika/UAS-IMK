<?php

$conn = mysqli_connect("localhost", "root", "", "mahasiswa");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$prodi = htmlspecialchars($data["prodi"]);

	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$stmt = mysqli_prepare($conn, "INSERT INTO mahasiswa (nama, npm, kelas, prodi, gambar) VALUES (?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($stmt, "sssss", $nama, $npm, $kelas, $prodi, $gambar);
	mysqli_stmt_execute($stmt);

	return mysqli_stmt_affected_rows($stmt);
}

function upload()
{
	$nfile = $_FILES['gambar']['name'];
	$ufile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tname = $_FILES['gambar']['tmp_name'];

	if ($error === 4) {
		return "";
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = strtolower(pathinfo($nfile, PATHINFO_EXTENSION));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		return false;
	}

	if ($ufile > 1000000) {
		return false;
	}

	$nfilebr = uniqid() . '.' . $ekstensiGambar;
	move_uploaded_file($tname, 'img/' . $nfilebr);

	return $nfilebr;
}


function hapus($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;

	$id = $data["id"];

	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$prodi = htmlspecialchars($data["prodi"]);
	$gambarlama = htmlspecialchars($data["gambarlama"]);

	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarlama;
	} else {
		$gambar = upload();
	}




	// query insert data / tambah dta
	$query = "UPDATE mahasiswa SET
				npm = '$npm', 
				nama = '$nama',
				kelas = '$kelas',
				prodi = '$prodi',
				gambar = '$gambar' 
			WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function cari($keyword)
{
	$query = "SELECT * FROM mahasiswa
				WHERE
			nama LIKE '%$keyword%' OR
			npm LIKE '%$keyword%'

	";

	return query($query);
}
