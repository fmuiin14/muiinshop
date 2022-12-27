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
                                <label>Kode</label>
                                <input type="text" class="form-control" name="code" required>
                            </div>

                            <div class="form-group">
                                <label class="d-block">Tipe</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="fixed"
                                        value="fixed" checked>
                                    <label class="form-check-label" for="fixed">
                                        Fixed
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="percent"
                                        value="percent">
                                    <label class="form-check-label" for="percent">
                                        Persen
                                    </label>
                                </div>
                            </div>

                            <div class="form-group" id="jumlah">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="valuejumlah">
                            </div>

                            <div class="form-group" id="persen">
                                <label>%</label>
                                <input type="text" class="form-control" name="value">
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
