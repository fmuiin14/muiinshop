@extends('admin.layouts.master')


@section('title')
    Category
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Category</h4>
                        <div class="card-header-action">
                            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Tambah Category</a>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($category as $val)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>{{ $val->title }}</td>
                                            <td>{{ $val->slug }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Are you sure?')" action="{{ route('category.destroy', $val->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('category.edit', $val->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
