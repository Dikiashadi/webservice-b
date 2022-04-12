@extends('template.master')

@section('isi')
    <h1>Data Mahasiswa</h1>

    <table class="table table-hoover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            
        </tr></thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nim }}</td>
            <td>{{ $row->nama_mahasiswa }}</td>
            <td>{{ $row->umur }}</td>
            <td>{{ $row->semester }}</td>
            <td></td>
        </tr>

        @endforeach
    </tbody>
    </table>
@endsection

