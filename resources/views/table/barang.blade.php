@extends('layout.template')
@section('title', 'Barang')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang </h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 mr-5">
            {{-- <button href="" type="button" class="btn btn-danger">
                Data yang hapus
            </button> --}}
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Tambah Barang
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kd_barang }}</td>
                            <td>{{ $item->nm_barang }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->satuan->satuan }}</td>
                            <td>{{ $item->kategori->kategori }}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-success">Detail</button> --}}
                                <a href="/barang/edit/{{ $item->id_barang }}" class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{ $item->id_barang }}">edit</a>
                                {{-- <a href="/barang/delete/{{ $item->id_barang }}" class="btn btn-danger">Delete</a> --}}

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- add --}}
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/barang">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-8">
                                        
                                            <div class="form-group">
                                                <label for="nm_barang">Nama Barang</label>
                                                <input type="text" name="nm_barang" class="form-control" id="nm_barang"
                                                    placeholder="Nama Barang" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="kd_barang">kode</label>
                                                <input type="text" name="kd_barang" class="form-control" id="kd_barang"
                                                    placeholder="kode" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_satuan">Satuan</label>
                                                <select name="id_satuan" id="id_satuan" class="form-control">
                                                    @foreach ($pilih as $item)
                                                    <option value="{{ $item->id}}">{{ $item->satuan }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_kategori">Kategori</label>
                                                <select name="id_kategori" id="id_kategori_kategori" class="form-control">
                                                    @foreach ($pilihkategori as $item)
                                                    <option value="{{ $item->id}}">{{ $item->kategori }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>                                    
                                        </div>
                                        <div class="col-6">


                                        </div>

                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                {{-- edit --}}
                @foreach ($data as $item)
                <div class="modal fade" id="myEdit{{ $item->id_barang }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/barang/update/{{ $item->id_barang }}" method="">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                @csrf
                                <div class="row ">
                                    <div class="col-8">
                                        {{-- <div class="form-group">
                                            <label for="">Pilih Barang</label>
                                            <select name="" id="" class="form-control">
                                                @foreach ($data as $item)
                                                <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="nm_barang">Nama Barang</label>
                                            <input type="text" name="nm_barang" class="form-control" id="nm_barang"
                                                placeholder="Nama Barang" value="{{ $item->nm_barang }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="kd_barang">kode</label>
                                            <input type="text" name="kd_barang" class="form-control" id="kd_barang"
                                                placeholder="kode" value="{{ $item->kd_barang }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_satuan">Satuan</label>
                                            <select name="id_satuan" id="id_satuan" class="form-control">
                                                @foreach ($pilih as $data)
                                                    <option value="{{ $data->id }}" @if($data->id == $item->id_satuan) selected @endif>{{ $data->satuan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <select name="id_kategori" id="id_kategori" class="form-control">
                                                @foreach ($pilihkategori as $data)
                                                    <option value="{{ $data->id }}" @if($data->id == $item->id_kategori) selected    
                                                    @endif>{{ $data->kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <input type="text" name="id_kategori" class="form-control" id="id_kategori"
                                                placeholder="kategori" value="{{ $item->kategori->kategori }}">
                                        </div> --}}
                                        
                                    </div>
                                    <div class="col-6">


                                    </div>

                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>

</div>

</div>





@endsection