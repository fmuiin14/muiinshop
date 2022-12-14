@extends('admin.layouts.master')


@section('title')
    Add Category
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Kategori</h4>
              <div class="card-header-action">
                <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm">Kembali</a>
              </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="title" required>
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
