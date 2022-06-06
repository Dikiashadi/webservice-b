@extends('template.master')

@section('isi')
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-primary" style="float: right;">
                            <h3 class="card-title">Tambah Data mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mahasiswa.getDataM') }}" method="post">
                                @csrf
                                <div class="form-grup">
            <label for="">NIM</label>
            <input type="text" class="form-control" name="nim">
        </div>

        <div class="form-grup">
            <label for="">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama_mahasiswa">
        </div>

        <div class="form-grup">
            <label for="">Umur</label>
            <input type="text" class="form-control" name="umur">
        </div>

        <div class="form-grup">
            <label for="">Semester</label>
            <input type="text" class="form-control" name="semester">
        </div>
                               
                                <input type="submit" class="btn btn-success" name="submit" value="Simpan Data">
                            <a class="btn btn-primary" href="{{ url('data-mahasiswa') }}" role="button">Kembali</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection