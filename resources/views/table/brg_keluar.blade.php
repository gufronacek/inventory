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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Tambah Barang Keluar
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Penerima</th>
                            <th>Keterangan</th>
                            <th>Tanggal </th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keluar as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id_stock }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->penerima }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>
                                    <button type="button" class="btn btn-success">Detail</button>
                                    <a href="/keluar/edit/{{ $data->id_keluar }}" class="btn btn-warning" data-toggle="modal" data-target="#myEdit">Edit</a>
                                    <a href="/keluar/delete/{{ $data->id_keluar }}" class="btn btn-danger">Delete</a>
                                </td>
                                
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
                                <div class="modal-body">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="">Pilih Nama Barang</label>
                                                <select name="id_stock" id="id_stock" class="form-control">
                                                    <option selected hidden disabled>Pilih Barang</option>
                                                    @foreach ($pilih as $item)
                                                        <option value="{{ $item->id_stock }}">{{ $item->nm_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">jumlah</label>
                                                <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="jumlah Barang" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="penerima">penerima</label>
                                                <input type="text" name="penerima" class="form-control" id="penerima" placeholder="penerima Barang" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="keterangan">keterangan Barang</label>
                                                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="keterangan Barang" required>
                                            </div> 
                                            
                                            {{-- <div class="form-group">
                                                <label for="keterangan">keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keteranganlHelp" placeholder="Jumlah">
                                            </div> --}}
                                        
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

                @foreach($keluar as $value)
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
                                                {{-- <div class="form-group">
                                                    <label for="">Pilih Barang</label>
                                                    <select name="" id="" class="form-control">
                                                        @foreach ($data as $item)
                                                        <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                
                                                <div class="form-group">
                                                    <label for="id_barang">id Barang</label>
                                                    <input type="text" name="id_barang" class="form-control" id="id_barang"
                                                        placeholder="id Barang" value="{{ $value->id_barang }}">
                                                </div>
                                                <div class="form-group">
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
                @endforeach
                
            </div>
        </div>
        
    </div>
        
</div>
    
@endsection

    {{-- <div class="form-group">
                                                <label for="id_barang">id Barang</label>
                                                <input type="text" name="id_barang" class="form-control" id="id_barang"
                                                    placeholder="id Barang" required>
                                            </div> --}}
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
