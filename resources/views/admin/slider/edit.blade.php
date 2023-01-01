@extends('admin.layouts.master')


@section('title')
    Edit Slider
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Slider</h4>
                        <div class="card-header-action">
                            <a href="{{ route('slider.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="title" required value="{{ $slider->title }}">
                            </div>
                            <div class="form-group">
                                <label>Label 1</label>
                                <input type="text" class="form-control" name="label1" required value="{{ $slider->label1 }}">
                            </div>
                            <div class="form-group">
                                <label>Label 2</label>
                                <input type="text" class="form-control" name="label2" required value="{{ $slider->label2 }}">
                            </div>
                            <div class="form-group">
                                <label>Label 3</label>
                                <input type="text" class="form-control" name="label3" required value="{{ $slider->label3 }}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" @if ($slider->status == 'active')
                                        selected
                                    @endif>Aktif</option>
                                    <option value="inactive" @if ($slider->status == 'inactive')
                                        selected
                                    @endif>Tidak Aktif</option>
                                  </select>
                            </div>

                            <div class="form-group mb-0">
                                <label for="">Photo</label>
                                <br>
                                @if ($slider->photo != '')
                                    <img src="{{ Storage::url('public/') . $slider->photo }}" class="rounded"
                                        style="width: 150px">
                                @endif
                                <br>
                                <small>*Ignore if you don't want to change the image</small>
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
