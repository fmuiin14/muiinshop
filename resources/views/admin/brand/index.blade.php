@extends('admin.layouts.master')


@section('title')
    Brand
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Brand</h4>
                        <div class="card-header-action">
                            <a href="{{ route('brand.create') }}" class="btn btn-primary btn-sm">Tambah Merk</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Brand</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($brand as $val)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>{{ $val->title }}</td>
                                            <td>{{ $val->status }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Are you sure?')" action="{{ route('brand.destroy', $val->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('brand.edit', $val->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
