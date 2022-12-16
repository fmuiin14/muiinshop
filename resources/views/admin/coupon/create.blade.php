@extends('admin.layouts.master')


@section('title')
    Tambah Kupon
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Kupon</h4>
              <div class="card-header-action">
                <a href="{{ route('coupon.index') }}" class="btn btn-primary btn-sm">Kembali</a>
              </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="code" required>
                </div>

                <div class="form-group">
                  <label>Tipe</label>
                  <select name="type" class="form-control">
                      <option value="fixed">Fixed</option>
                      <option value="percent">Persen</option>
                    </select>
                </div>

                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" class="form-control" name="value" required>
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
