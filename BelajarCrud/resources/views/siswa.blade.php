<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Belajar Crud</title>
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>
        <div class="card">
            <div class="card-header">
                Data Siswa Smakensa
                <a href="/siswa/create" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <form class="input-group mb-3">
                    <input name="cari" type="text" class="form-control"
                        placeholder="Cari berdasarkan nama">
                    <button class="btn btn-secondary" type="submit">Cari Data</button>
                </form>
                <table class="table table-striped table-bordered">
                    @csrf
                    <thead>
                      <tr>
                        <th >Id</th>
                        <th >Nama</th>
                        <th >Nisn</th>
                        <th >Jurusan</th>
                        <th >Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $siswa)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->nisn}}</td>
                            <td>{{$siswa->jurusan}}</td>
                            <td>
                                <a href="{{ route('edit', ['id' => $siswa->id]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('destroy', ['id' => $siswa->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
            </div>
        </div>
    </div>
</body>
</html>