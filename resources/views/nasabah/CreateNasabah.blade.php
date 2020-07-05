@extends('layouts.app')

@section('content')

    <div class="container">
        <p class="h1 text-center">Input Data Nasabah</p>

        <form action="{{ route('store')}}" method="post">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="">Nama</label>
                <input class="form-control @error('nama') is-invalid @enderror"
                type="text" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input class="form-control @error('tlp') is-invalid @enderror"
                    type="number" name="tlp" id="tlp" placeholder="Masukkan Nomor Telepon" value="{{ old('tlp') }}">
                    @error('tlp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                <input class="form-control @error('alamat') is-invalid @enderror"
                    type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control @error('email') is-invalid @enderror"
                    type="email" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>

    </div>

@endsection
