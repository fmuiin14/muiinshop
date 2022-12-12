@extends('admin.layouts.master')


@section('title')
    Add Product
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Produk</h4>
              <div class="card-header-action">
                <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">Kembali</a>
              </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <select name="category_id" class="form-control">
                        <option value="">#</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stock" required>
                </div>
                <div class="form-group">
                  <label>Summary</label>
                  <textarea name="summary" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                    <label>Harga Diskon</label>
                    <input type="text" class="form-control" name="discount" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control">
                        <option value="">#</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <select name="brand_id" class="form-control">
                        <option value="">#</option>
                    </select>
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
