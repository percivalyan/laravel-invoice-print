@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Tambah Bahan Pembelian</h2>
                <a class="btn btn-primary" href="{{ route('bahanPembelians.index') }}">Kembali</a>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bahanPembelians.store') }}" method="POST">
                    @csrf


                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Project Pembelian:</strong>
                            <select name="project_pembelian_id" class="form-control">
                                @foreach ($projectPembelians as $projectPembelian)
                                    <option value="{{ $projectPembelian->id }}">{{ $projectPembelian->project }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelianId }}">

                    <div class="form-group">
                        <strong>Pembelian:</strong>
                        <input type="text" name="pembelian" class="form-control" placeholder="Pembelian">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
