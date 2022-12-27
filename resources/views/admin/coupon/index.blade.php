@extends('admin.layouts.master')


@section('title')
    Kupon
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kupon</h4>
                        <div class="card-header-action">
                            <a href="{{ route('coupon.create') }}" class="btn btn-primary btn-sm">Tambah Kupon</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Tipe Kupon</th>
                                        <th>Jumlah %</th>
                                        <th>Jumlah Potongan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($coupon as $val)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>{{ $val->code }}</td>
                                            <td>{{ $val->type }}</td>
                                            <td>{{ $val->value }}</td>
                                            <td>{{ $val->valuejumlah }}</td>
                                            <td>{{ $val->status }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Are you sure?')" action="{{ route('coupon.destroy', $val->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('coupon.edit', $val->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
