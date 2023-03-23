<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        table {
            border-collapse: collapse;
        }
        tr {
            text-align: center;
        }
        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Pengaduan Masyarakat Desa Ciburuy</h1>
    <table class="border-collapse" border="1px solid black">
        <tr>
            <td>Judul</td>
            <td>Kategori</td>
            <td>Tanggal Kejadian</td>
            <td>Status</td>
            <td>Nama Pengadu</td>
            <td>Isi Laporan</td>
            <td>Dilaporkan pada tanggal</td>
            <td>Petugas</td>
            <td>Tanggapan</td>
            <td>Ditanggapi pada tanggal</td>
        </tr>
        @foreach ($complaints as $complaint)
        <tr>
            <td>{{ $complaint->title }}</td>
            <td>{{ $complaint->category->name }}</td>
            <td>{{ $complaint->date  }}</td>
            <td>{{ $complaint->status }}</td>
            <td>{{ $complaint->community->name }}</td>
            <td>{!! $complaint->complaint !!}</td>
            <td>{{ $complaint->created_at }}</td>
            <td>{!! $complaint->response->response ?? '' !!}</td>
            <td>{{ $complaint->officer->name ?? '' }}</td>
            <td>{{ $complaint->response->created_At ?? '' }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
