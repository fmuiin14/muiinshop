@extends('admin.layouts.master')


@section('title')
    Slider
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Slider</h4>
                        <div class="card-header-action">
                            <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">Tambah Slider</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Slider</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($slider as $val)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>{{ $val->title }}</td>
                                            <td><img src="{{ Storage::url('public/').$val->photo }}" class="rounded" style="width: 100px"></td>
                                            <td>{{ $val->status }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Are you sure?')" action="{{ route('slider.destroy', $val->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('slider.edit', $val->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
