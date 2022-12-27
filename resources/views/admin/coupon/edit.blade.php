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
                                <label>Kode</label>
                                <input type="text" class="form-control" name="code" required value="{{ $coupon->code }}">
                            </div>

                            <div class="form-group">
                                <label class="d-block">Tipe</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="fixed"
                                        value="fixed" @if ($coupon->type == 'fixed')
                                            checked
                                        @endif>
                                    <label class="form-check-label" for="fixed">
                                        Fixed
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="percent"
                                        value="percent" @if ($coupon->type == 'percent')
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="percent">
                                        Persen
                                    </label>
                                </div>
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

                            <div class="form-group" id="jumlah">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" value="{{ $coupon->valuejumlah }}" name="valuejumlah">
                            </div>

                            <div class="form-group" id="persen">
                                <label>%</label>
                                <input type="text" class="form-control" value="{{ $coupon->value }}" name="value">
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
    <script>
        $(function() {
            // do this after dom is ready
            let element_type = $('input[name="type"]:checked').val();
            if (element_type == 'percent') {
                document.getElementById('jumlah').style.display = "none"
                document.getElementById('persen').style.display = "block"
            } else if (element_type == 'fixed') {
                document.getElementById('persen').style.display = "none"
                document.getElementById('jumlah').style.display = "block"
            }
        });

        $('input[type=radio][name=type]').change(function() {
            if (this.value == 'percent') {
                document.getElementById('jumlah').style.display = "none"
                document.getElementById('persen').style.display = "block"
            } else if (this.value == 'fixed') {
                document.getElementById('persen').style.display = "none"
                document.getElementById('jumlah').style.display = "block"
            }
        });
    </script>
@endsection
