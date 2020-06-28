@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello Karyawan</div>
                <div class="card-body">
                    <form action="{{ route('storeFile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <input type="file" name="featured_file" id="" class="form-control"><br>
                            <button type="submit" class="btn btn-dark form-control">Upload Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>

@endsection
