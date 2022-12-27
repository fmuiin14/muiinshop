@extends('admin.layouts.master')


@section('title')
    Edit Product
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Produk</h4>
                        <div class="card-header-action">
                            <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="title" required
                                    value="{{ $products->title }}">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Size</span>
                                    </div>
                                    <input type="text" class="form-control" name="s"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="S" value="{{ $size->s }}">
                                    <input type="text" class="form-control" name="m"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="M" value="{{ $size->m }}">
                                    <input type="text" class="form-control" name="l"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="L" value="{{ $size->l }}">
                                    <input type="text" class="form-control" name="xl"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="XL" value="{{ $size->xl }}">
                                    <input type="text" class="form-control" name="xxl"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="XXL" value="{{ $size->xxl }}">
                                    <input type="text" class="form-control" name="allsize"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Allsize" value="{{ $size->allsize }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Summary</label>
                                <textarea name="summary" class="form-control">{{ $products->summary }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $products->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="price" required
                                    value="{{ $products->price }}">
                            </div>
                            <div class="form-group">
                                <label>Harga Diskon</label>
                                <input type="text" class="form-control" name="discount" required
                                    value="{{ $products->discount_price }}">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($category as $val)
                                        <option value="{{ $val->id }}" @if ($products->category_id == $val->id)
                                            selected
                                        @endif>{{ $val->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select name="brand_id" class="form-control">
                                    @foreach ($brand as $val)
                                        <option value="{{ $val->id }}" @if ($products->brand_id == $val->id)
                                            selected
                                        @endif>{{ $val->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <label for="">Photo</label>
                                <br>
                                @if ($products->photo != '')
                                    <img src="{{ Storage::url('public/') . $products->photo }}" class="rounded"
                                        style="width: 150px">
                                @endif
                                <br>
                                <small>*Ignore if you don't want to change the image</small>
                                <input type="file" class="form-control" name="photo" required>
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
