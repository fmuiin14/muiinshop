@extends('admin.layouts.master')


@section('title')
    Tambah Brand
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Brand</h4>
                        <div class="card-header-action">
                            <a href="{{ route('brand.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label>Label 1</label>
                                <input type="text" class="form-control" name="label1" required>
                            </div>
                            <div class="form-group">
                                <label>Label 2</label>
                                <input type="text" class="form-control" name="label2" required>
                            </div>
                            <div class="form-group">
                                <label>Label 3</label>
                                <input type="text" class="form-control" name="label3" required>
                            </div>

                            <div class="form-group mb-0">
                                <label for="">Photo</label>
                                <input type="file" class="form-control" name="photo" required>
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
@endsection
