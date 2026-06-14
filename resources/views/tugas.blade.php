<!DOCTYPE html>
<html>
<head>
    <title>Upload Tugas Kuliah</title>
</head>
<body>

<h1>Sistem Upload Tugas Kuliah</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Mahasiswa</label><br>
    <input type="text" name="nama_mahasiswa" required><br><br>

    <label>File Tugas</label><br>
    <input type="file" name="file_tugas" required><br><br>

    <button type="submit">Upload</button>
</form>

<hr>

<form method="GET" action="/">
    <input type="text" name="search" placeholder="Cari nama mahasiswa">
    <button type="submit">Cari</button>
</form>

<br>

<h2>Daftar Tugas</h2>

<table border="1" cellpadding="10">
    <tr>
    <th>Nama Mahasiswa</th>
    <th>File</th>
    <th>Aksi</th>
</tr>

   @foreach($tugas as $item)
    <tr>
        <td>{{ $item->nama_mahasiswa }}</td>
        <td>{{ $item->nama_file }}</td>
        <td>
        <a href="/download/{{ $item->id }}">
            Download
        </a>

        <form action="/hapus/{{ $item->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
    </tr>
@endforeach

</table>

</body>
</html>