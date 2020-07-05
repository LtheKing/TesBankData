@extends('layouts.app')

@section('content')

<div class="container">
    <p class="h1 text-center">Edit Data Nasabah</p>
    <form action="{{ route('update', $data->id) }}" method="post">
        @method('PUT')
        @csrf

        <div class="form-group needs-validation">

            <label for="">Nama</label>
            <input class="form-control @error('nama') is-invalid @enderror"
                 type="text" name="nama" id="nama" placeholder="Masukkan Nama" value={{old('nama',$data->nama)}}>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            <label for="">Nomor Telepon</label>
            <input type="number" class="form-control @error('tlp') is-invalid @enderror" name="tlp" value={{old('tlp',$data->tlp)}}>
                @error('tlp')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            <label for="">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value={{old('alamat',$data->alamat)}}>
            @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value={{old('email',$data->email)}}>
            @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>
</div>

@endsection
