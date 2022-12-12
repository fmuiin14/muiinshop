@extends('admin.layouts.master')


@section('title')
    Product
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Produk</h4>
              <div class="card-header-action">
                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Tambah Produk</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Photo</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Harga Diskon</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
  </section>
@endsection
