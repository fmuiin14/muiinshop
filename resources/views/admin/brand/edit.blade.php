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
                                <input type="text" class="form-control" name="title" required value="{{ $brand->title }}">
                            </div>
                            <div class="form-group">
                                <label>Label 1</label>
                                <input type="text" class="form-control" name="label1" required value="{{ $brand->label1 }}">
                            </div>
                            <div class="form-group">
                                <label>Label 2</label>
                                <input type="text" class="form-control" name="label2" required value="{{ $brand->label2 }}">
                            </div>
                            <div class="form-group">
                                <label>Label 3</label>
                                <input type="text" class="form-control" name="label3" required value="{{ $brand->label3 }}">
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

                            <div class="form-group mb-0">
                                <label for="">Photo</label>
                                <br>
                                @if ($brand->photo != '')
                                    <img src="{{ Storage::url('public/') . $brand->photo }}" class="rounded"
                                        style="width: 150px">
                                @endif
                                <br>
                                <small>*Ignore if you don't want to change the image</small>
                                <input type="file" class="form-control" name="photo">
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
