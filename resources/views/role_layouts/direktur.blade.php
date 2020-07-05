@extends('layouts.app')

@section('content')
    <h1>hello direktur</h1>
    <input type="file" name="featured_image" id="" class="form-control"><br>
        <button type="submit" class="btn btn-dark form-control">Upload Now</button>

    <a href="{{ route('nasabah') }}" class="btn btn-info">Data Nasabah</a>
@endsection
