@extends('admin.layouts.master')


@section('title')
    Edit Brand
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Brand</h4>
                        <div class="card-header-action">
                            <a href="{{ route('brand.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="code" required value="{{ $brand->title }}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" @if ($brand->status == 'active')
                                        selected
                                    @endif>Aktif</option>
                                    <option value="inactive" @if ($brand->status == 'inactive')
                                        selected
                                    @endif>Tidak Aktif</option>
                                  </select>
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
