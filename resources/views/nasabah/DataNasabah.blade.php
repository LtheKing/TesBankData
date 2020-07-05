@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="h1 text-center">Data Nasabah</p>

        {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/nasabah/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							@csrf

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>

        <a href="{{route('create')}}" class="btn btn-info">Input Data Nasabah</a>

        <table class='table table-bordered mt-3'>
			<thead class="thead-dark text-center">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Telepon</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
                @foreach($dn as $s)
                    <tr class="text-center">
                        <td>{{ $i++ }}</td>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->tlp}}</td>
                        <td>{{$s->alamat}}</td>
                        <td>{{$s->email}}</td>
                        <form>
                            <td>
                                <a href="{{ route('edit',$s['id']) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('delete',$s['id']) }}" class="btn btn-danger" onclick="return confirm('yakin?');">Delete</a>
                            </td>
                        </form>
                    </tr>
				@endforeach
			</tbody>
        </table>
        <a href="/nasabah/export_excel" class="btn btn-success mr-5 float-right" target="_blank">EXPORT EXCEL</a>
        <button type="button" class="btn btn-primary mr-5 float-right" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</button>
    </div>
@endsection
