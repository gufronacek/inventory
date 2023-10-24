@extends('layout.template')
@section('title', 'Barang Keluar')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Barang Keluar</h1> --}}
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form method="post" class="form-inline mt-4" action="/view_keluar/filter">
                @csrf
                <div class="row pb-0 ml-2 mt-4 mr-2">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Barang Keluar
                    </button>
                </div>
                <div class="col-md-2">
                    <label for="">Start Date</label>
                    <input type="date" name="start_date" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">End Date</label>
                    <input type="date" name="end_date" class="form-control">
                </div>
                <div class="col-md-1 pt-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok Awal</th>
                            <th>Jumlah Keluar</th>
                            <th>Stok Akhir</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->kd_barang}}</td>
                                <td>{{ $item->barang->nm_barang}}</td>
                                <td>{{ $item->stok_awal }}</td>                            
                                <td>{{ $item->jumlah}}</td>
                                <td>{{ $item->stok_awal + $item->jumlah }}</td>                            
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->aksi}}</td>
                                {{-- <td>
                                    <button type="button" class="btn btn-success">Detail</button>
                                    <a href="/masuk/edit/{{  $item->id_masuk }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{ $item->id_masuk }}">Edit</a>
                                    <a href="/masuk/delete/{{ $item->id_masuk }}" type="button" class="btn btn-danger">Delete</a> 
                                </td> --}}
                                
                            </tr>
                        @endforeach                    
                    </tbody>
                </table>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/keluar">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Keluar</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div id="not-prevent" class="modal-body">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-8">
                                            @if ($barang_ini == null)
                                                <div class="form-group">
                                                    <label for="kode">Scan Kode Barang</label>
                                                    <input type="text" onchange="scan(this)" id="kode-input" name="kode" class="form-control" id="kode" placeholder="kode barang">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Atau Pilih nama Barang</label>
                                                    <select name="id_barang" id="" class="form-control">
                                                        @foreach ($pilih as $item)
                                                        <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @else
                                                <div class="form-group">
                                                    <label for="">Pilih Barang</label>
                                                    <select name="id_barang" id="" class="form-control">
                                                        @foreach ($pilih as $item)
                                                        <option value="{{ $item->id_barang }}" @if($barang_ini->id_barang == $item->id_barang) selected @endif>{{ $item->nm_barang }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="jumlah">jumlah</label>
                                                <input type="text" name="jumlah" class="form-control" id="jumlah"
                                                    placeholder="jumlah" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">keterangan</label>
                                                <textarea name="keterangan" class="form-control" placeholder="Keterangan Jika Ada" id="" cols="30" rows="5"></textarea>
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

                {{-- @foreach($data as $value)
                    <div class="modal fade" id="myEdit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/keluar/update/{{ $value->id_keluar }}" method="">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data Keluar</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row ">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="">Pilih Barang</label>
                                                    <select name="" id="" class="form-control">
                                                        @foreach ($pilih as $item)
                                                        <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                
                                                {{-- <div class="form-group">
                                                    <label for="id_barang">id Barang</label>
                                                    <input type="text" name="id_barang" class="form-control" id="id_barang"
                                                        placeholder="id Barang" value="{{ $value->id_barang }}">
                                                </div> --}}
                                                {{-- <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input type="jumlah" name="jumlah" class="form-control"
                                                        id="jumlah" aria-describedby="jumlahlHelp"
                                                        placeholder="jumlah" value="{{ $value->jumlah }}">
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
                @endforeach --}}
                
            </div>
        </div>
        
    </div>
        
</div>
    
@endsection


{{-- <div class="form-group">
                                                <label for="">Pilih Nama Barang</label>
                                                <select name="id_barang" id="" class="form-control">
                                                    <option selected hidden disabled>Pilih Barang</option>
                                                    @foreach ($dara as $value)
                                                        <option value="{{ $value->id_stock }}">{{ $valuestock }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label for="">Pilih Nama Barang</label>
                                                <select name="id_barang" id="" class="form-control">
                                                    <option selected hidden disabled>Pilih Barang</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->id_stock }}">{{ $item->nm_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="jumlah" name="jumlah" class="form-control"
                                                    id="jumlah" aria-describedby="jumlahlHelp"
                                                    placeholder="jumlah">
                                            </div> --}}
