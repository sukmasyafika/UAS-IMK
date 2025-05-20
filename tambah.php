<?php

require "function.php";

$conn = mysqli_connect("localhost", "root", "", "mahasiswa");

if (isset($_POST['submit'])) {
	if (tambah($_POST) > 0) {
		echo "
			<script> 
				alert('Data Berhasil Ditambahkan!');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "
			<script> 
				alert('Data Gagal Ditambahkan!');
				document.location.href = 'index.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Mahasiswa</title>
	<style>
		:root {
			--primary: #86A7FC;
			--dark: #3468C0;
		}

		body {
			font-family: Arial, sans-serif;
			background-color: #f2f6ff;
			margin: 0;
			padding: 0;
		}

		.container {
			width: 90%;
			max-width: 500px;
			margin: 50px auto;
			background-color: #fff;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			text-align: center;
			color: var(--dark);
		}

		form ul {
			list-style: none;
			padding: 0;
		}

		form li {
			margin-bottom: 15px;
		}

		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}

		input[type="text"],
		select {
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
		}

		button {
			background-color: var(--primary);
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
			font-weight: bold;
			transition: background-color 0.3s ease;
		}

		button:hover {
			background-color: var(--dark);
		}

		input[type="file"] {
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #f9f9f9;
			cursor: pointer;
			box-sizing: border-box;
		}

		.file-label {
			font-weight: bold;
			display: block;
			margin-bottom: 5px;
			color: #333;
		}

		.back-button {
			display: block;
			text-align: center;
			margin-top: 10px;
			text-decoration: none;
			background-color: #ccc;
			color: black;
			padding: 10px;
			border-radius: 5px;
			transition: background-color 0.3s ease;
			font-weight: bold;
		}

		.back-button:hover {
			background-color: #999;
		}
	</style>
</head>

<body>

	<div class="container">
		<h1>Tambah Data Mahasiswa</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<ul>
				<li>
					<label for="npm">NPM :</label>
					<input type="text" name="npm" id="npm" required>
				</li>
				<li>
					<label for="nama">Nama :</label>
					<input type="text" name="nama" id="nama" required>
				</li>
				<li>
					<label for="kelas">Kelas :</label>
					<select name="kelas" id="kelas" required>
						<option value="">-- Pilih Kelas --</option>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
				</li>
				<li>
					<label for="prodi">Prodi :</label>
					<input type="text" name="prodi" id="prodi" required>
				</li>
				<li>
					<label for="gambar" class="file-label">Upload Gambar (opsional):</label>
					<input type="file" name="gambar" id="gambar" accept="image/*">
				</li>
				<li>
					<button type="submit" name="submit">Tambah Data!</button>
					<a href="index.php" class="back-button">Kembali</a>
				</li>
			</ul>
		</form>
	</div>

</body>

</html>