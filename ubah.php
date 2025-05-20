<?php
require "function.php";

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST['submit'])) {
	if (ubah($_POST) > 0) {
		echo "<script>alert('Data Berhasil Diubah!'); document.location.href = 'index.php';</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah!'); document.location.href = 'index.php';</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Data Mahasiswa</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			padding: 40px;
		}

		.container {
			background: white;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			width: 400px;
		}

		h2 {
			text-align: center;
			color: #3468C0;
			margin-bottom: 20px;
		}

		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
			color: #333;
		}

		input[type="text"],
		select,
		input[type="file"] {
			width: 100%;
			padding: 8px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		button {
			background-color: #3468C0;
			color: white;
			padding: 10px 15px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
			background-color: #86A7FC;
		}

		.img-preview {
			margin-bottom: 15px;
			display: block;
			width: 100px;
			border-radius: 5px;
		}

		.btn-back {
			display: inline-block;
			text-align: center;
			margin-top: 10px;
			padding: 10px 15px;
			background-color: #ccc;
			color: #000;
			text-decoration: none;
			border-radius: 5px;
			width: 100%;
			box-sizing: border-box;
		}

		.btn-back:hover {
			background-color: #aaa;
		}
	</style>
</head>

<body>
	<div class="container">
		<h2>Ubah Data Mahasiswa</h2>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
			<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">

			<label for="npm">NPM</label>
			<input type="text" name="npm" id="npm" required value="<?= $mhs["npm"]; ?>">

			<label for="nama">Nama</label>
			<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">

			<label for="kelas">Kelas</label>
			<select name="kelas" id="kelas" required>
				<option value="A" <?= $mhs["kelas"] == 'A' ? 'selected' : '' ?>>A</option>
				<option value="B" <?= $mhs["kelas"] == 'B' ? 'selected' : '' ?>>B</option>
			</select>

			<label for="prodi">Prodi</label>
			<input type="text" name="prodi" id="prodi" required value="<?= $mhs["prodi"]; ?>">

			<label>Gambar Saat Ini:</label>
			<img src="img/<?= $mhs["gambar"] ? $mhs["gambar"] : 'default.png'; ?>" alt="preview" class="img-preview">

			<label for="gambar">Upload Gambar Baru</label>
			<input type="file" name="gambar" id="gambar" accept="image/*">


			<button type="submit" name="submit">Ubah Data</button>
			<a href="index.php" class="btn-back">Kembali</a>

		</form>
	</div>
</body>

</html>