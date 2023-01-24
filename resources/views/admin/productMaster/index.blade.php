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
                            {{-- <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Tambah Produk</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Photo</th>
                                        {{-- <th>Stok</th> --}}
                                        <th>Harga</th>
                                        <th>Harga Diskon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($products as $val)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>{{ $val->title }}</td>
                                            <td>{{ $val->slug }}</td>
                                            <td><img src="{{ Storage::url('public/').$val->photo }}" class="rounded" style="width: 100px"></td>
                                            {{-- <td>{{ $val->stock }}</td> --}}
                                            <td>{{ $val->price }}</td>
                                            <td>{{ $val->discount_price }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Are you sure?')" action="{{ route('masterProduct.destroy', $val->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('masterProduct.edit', $val->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
