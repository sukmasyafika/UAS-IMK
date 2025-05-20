<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
	<style>
		:root {
			--primary: #86A7FC;
			--dark: #3468C0;
		}

		body {
			font-family: Arial, sans-serif;
			background-color: #f4f7ff;
			margin: 0;
			padding: 0;
		}

		.container {
			width: 90%;
			margin: 30px auto;
			background-color: #fff;
			padding: 20px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border-radius: 8px;
		}

		h1 {
			text-align: center;
			color: var(--dark);
			text-shadow: 1px 1px 2px #aaa;
		}

		.add-link {
			display: block;
			width: fit-content;
			padding: 10px 15px;
			background-color: var(--primary);
			color: white;
			text-decoration: none;
			border-radius: 5px;
			transition: background-color 0.3s ease;
		}

		.add-link:hover {
			background-color: var(--dark);
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
			margin-bottom: 20px;
		}

		th,
		td {
			padding: 12px;
			text-align: center;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: var(--dark);
			color: white;
		}

		tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		tr:hover {
			background-color: #eef2ff;
		}

		img {
			width: 50px;
			height: 50px;
			object-fit: cover;
			border-radius: 5px;
		}

		.btn {
			padding: 5px 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			color: white;
			text-decoration: none;
			font-size: 0.9em;
		}

		.btn-edit {
			background-color: #FF9843;
		}

		.btn-edit:hover {
			background-color: rgb(255, 115, 0);
		}

		.btn-delete {
			background-color: crimson;
		}

		.btn-delete:hover {
			background-color: darkred;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Daftar Mahasiswa</h1>
		<a href="tambah.php" class="add-link">+ Tambah Data Mahasiswa</a>

		<table>
			<tr>
				<th>No.</th>
				<th>Gambar</th>
				<th>NPM</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Prodi</th>
				<th>Aksi</th>
			</tr>

			<?php $i = 1; ?>
			<?php foreach ($mahasiswa as $row) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td>
						<?php if (!empty($row["gambar"]) && file_exists("img/" . $row["gambar"])) : ?>
							<img src="img/<?= $row["gambar"]; ?>" alt="Foto">
						<?php else : ?>
							<img src="img/default.png" alt="Default">
						<?php endif; ?>
					</td>
					<td><?= $row["npm"]; ?></td>
					<td><?= $row["nama"]; ?></td>
					<td><?= $row["kelas"]; ?></td>
					<td><?= $row["prodi"]; ?></td>
					<td>
						<a class="btn btn-edit" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
						<a class="btn btn-delete" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
					</td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
		</table>
		<a href="index.html" class="add-link">Halaman Color</a>
	</div>
</body>

</html>