@extends('user.layouts.master')


@section('title')
    Profile User
@endsection

@section('content')
<section class="section">

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">

            <form action="{{ route('detailAlamat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="card">
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nama</label>
                  <input type="hidden" name="id_user" value="{{ $user->id }}">
                  <input type="text" class="form-control" id="name" placeholder="name" name="nama_alamat" value="{{ $user->name }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ $user->email }}" readonly>
                </div>
                <div class="form-group col-md-12">
                  <label for="no_hp">No HP</label>
                  <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP">
                </div>
              </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Submit</button>
              </div>
          </div>
        </form>

            <div class="card">
              <div class="card-header">
                <h4>Data Alamat</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tbody>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>No HP</th>
                      <th>Detail Alamat</th>
                      <th>Action</th>
                      <th>Status</th>
                    </tr>

                    @php
                                        $no = 1;
                                    @endphp
                    @foreach ($alamats as $item)
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>{{ $item->nama_alamat }}</td>
                      <td>{{ $item->no_hp }}</td>
                      <td>{{ $item->detail_alamat }}</td>
                      <td>
                        <form onsubmit="return confirm('Are you sure?')" action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                      </td>
                      <td>@if ($item->flag_alamat == 'utama')
                        <div class="badge badge-success">utama</div>
                      @else

                      @endif</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>




        <div class="col-12 col-md-6 col-lg-6">
            <form action="{{ route('detailAlamat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="card">
            <div class="card-header">
              <h4>Tambah Alamat Baru</h4>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nama</label>
                  <input type="hidden" name="id_user" value="{{ $user->id }}">
                  <input type="text" class="form-control" id="name" placeholder="name" name="nama_alamat" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email" value="" readonly>
                </div>
                <div class="form-group col-md-12">
                  <label for="no_hp">No HP</label>
                  <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP">
                </div>
              </div>
              <div class="form-group">
                <label for="">Provinsi</label>
                <select class="form-control provinsi" name="provinsi" id="provinsi">
                    @foreach ($provinces as $item)
                    <option value="" disabled selected>Pilih Provinsi</option>
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="">Kabupaten</label>
                <select class="form-control kabupaten" name="kabupaten" id="kabupaten">
                    {{-- <option value="">Pilih</option> --}}
                </select>
              </div>
              <div class="form-group">
                <label for="">Kecamatan</label>
                <select class="form-control kecamatan" name="kecamatan" id="kecamatan">
                    {{-- <option value="">Pilih</option> --}}
                </select>
              </div>
              <div class="form-group">
                <label for="">Kelurahan</label>
                <select class="form-control kelurahan" name="kelurahan" id="kelurahan">
                    {{-- <option value="">Pilih</option> --}}
                </select>
              </div>

              <div class="form-group">
                <label for="">Detail Alamat</label>
                <textarea name="detail_alamat" class="form-control"></textarea>
              </div>

            </div>
            <div class="card-footer">
              <button class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        </div>
    </div>

  </section>
@endsection

@section('js')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.provinsi').select2();
            $('.kabupaten').select2();
            $('.kecamatan').select2();
            $('.kelurahan').select2();

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(function(){
                $('#provinsi').on('change', function(){
                  let id_provinsi = $('#provinsi').val();

                  $.ajax({
                    type: 'POST',
                    url: "{{ route('getKabupaten') }}",
                    data: {
                          id_provinsi: id_provinsi
                    },
                    cache: false,

                    success: function(message) {
                      $('#kabupaten').html(message)
                      $('#kecamatan').html('')
                      $('#kelurahan').html('')
                    },
                    error: function(data) {
                        console.log(data)
                    }
                  })
                })

                $('#kabupaten').on('change', function(){
                  let id_kabupaten = $('#kabupaten').val();

                  $.ajax({
                    type: 'POST',
                    url: "{{ route('getKecamatan') }}",
                    data: {
                          id_kabupaten: id_kabupaten
                    },
                    cache: false,

                    success: function(message) {
                      $('#kecamatan').html(message)
                      $('#kelurahan').html('')
                    },
                    error: function(data) {
                        console.log(data)
                    }
                  })
                })

                $('#kecamatan').on('change', function(){
                  let id_kecamatan = $('#kecamatan').val();

                  $.ajax({
                    type: 'POST',
                    url: "{{ route('getKelurahan') }}",
                    data: {
                          id_kecamatan: id_kecamatan
                    },
                    cache: false,

                    success: function(message) {
                      $('#kelurahan').html(message)
                    //   $('#kecamatan').html('')
                    //   $('#kelurahan').html('')
                    },
                    error: function(data) {
                        console.log(data)
                    }
                  })
                })


            });
        });


    </script>
@endsection
