<!DOCTYPE html>
<html>
<head>
    <title>Upload Tugas Kuliah</title>

    <style>
body{
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 30px;
}

.container{
    width: 80%;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

h1{
    text-align: center;
    color: #2c3e50;
}

input[type="text"],
input[type="file"]{
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button{
    background: #3498db;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover{
    background: #2980b9;
}

table{
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th{
    background: #3498db;
    color: white;
}

th, td{
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

tr:nth-child(even){
    background: #f9f9f9;
}

a{
    text-decoration: none;
    color: #3498db;
    font-weight: bold;
}

hr{
    margin: 25px 0;
}
</style>
</head>
<body>
    <div class="container">

<h1 style="text-align:center;">
    Sistem Upload Tugas Kuliah
</h1>

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
</div>
</body>
</html>