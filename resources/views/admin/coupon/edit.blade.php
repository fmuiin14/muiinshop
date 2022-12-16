@extends('admin.layouts.master')


@section('title')
    Edit Kupon
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Kupon</h4>
                        <div class="card-header-action">
                            <a href="{{ route('coupon.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="code" required
                                    value="{{ $coupon->code }}">
                            </div>
                            <div class="form-group">
                                <label>Tipe</label>
                                <select name="type" class="form-control">
                                    <option value="fixed" @if ($coupon->type == 'fixed')
                                        selected
                                    @endif>Fixed</option>
                                    <option value="percent" @if ($coupon->type == 'percent')
                                        selected
                                    @endif>Persen</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="value" required
                                    value="{{ $coupon->value }}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" @if ($coupon->status == 'active')
                                        selected
                                    @endif>Aktif</option>
                                    <option value="inactive" @if ($coupon->status == 'inactive')
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
