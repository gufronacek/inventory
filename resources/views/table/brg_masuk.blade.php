@extends('layout.template')
@section('title', 'Barang Masuk')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Tambah Barang  Masuk
              </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok Awal</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->nm_barang}}</td>
                                <td>{{ $item->stok_awal }}</td>
                                <td>{{ $item->jumlah}}</td>
                                <td>{{ $item->tanggal }}</td>
                                {{-- <td>
                                    <button type="button" class="btn btn-success">Detail</button>
                                    <a href="/masuk/edit/{{  $item->id_masuk }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{ $item->id_masuk }}">Edit</a>
                                    <a href="/masuk/delete/{{ $item->id_masuk }}" type="button" class="btn btn-danger">Delete</a> 
                                </td> --}}
                                
                            </tr>
                        @endforeach                    
                    </tbody>
                </table>
                {{-- my model --}}
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/masuk">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Masuk</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="">Pilih Nama Barang</label>
                                                <select name="id_barang" id="id_stock" class="form-control">
                                                    <option selected hidden disabled>Pilih Barang</option>
                                                    @foreach ($pilih as $item)
                                                        <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">jumlah</label>
                                                <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="jumlah Barang" required>
                                            </div> 
                                            
                                            {{-- <div class="form-group">
                                                <label for="merk">Merk</label>
                                                <input type="text" name="merk" class="form-control" id="merk" placeholder="merk Barang" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="stock">Jumlah Barang</label>
                                                <input type="number" name="stock" class="form-control" id="stock" placeholder="stock Barang" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="keterangan">keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keteranganlHelp" placeholder="Keterangan">
                                            </div> --}}
                                        </div>
                                        {{-- <div class="col-6">
                    
                                            
                                        </div> --}}
                                
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
                    {{-- endModel --}}
                    {{-- My Edit --}}
                    {{-- @foreach ($data as $item)
                <div class="modal fade" id="myEdit{{ $item->id_masuk }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="/masuk/update/{{ $item->id_masuk }}" method="">

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
                                            <div class="form-group">
                                                <label for="">Pilih Barang</label>
                                                <select name="" id="" class="form-control">
                                                    @foreach ($data as $item)
                                                    <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Nama Barang</label>
                                                <input type="text" name="jumlah" class="form-control" id="jumlah"
                                                    placeholder="Nama Barang" value="{{ $item->jumlah }}">
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label for="jenis">Jenis</label>
                                                <input type="text" name="Jenis" class="form-control" id="Jenis" placeholder="Jenis Barang" value="{{ $item->Jenis }}">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="merk">Merk</label>
                                                <input type="text" name="merk" class="form-control" id="merk" placeholder="merk Barang" value="{{ $item->merk }}">
                                            </div> 
                                            <div class="form-group">
                                                <label for="Jumlah">Jumlah Barang</label>
                                                <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="jumlah Barang" value="{{ $item->jumlah }}">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="keterangan">keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keteranganlHelp" placeholder="Jumlah" value="{{ $item->keterangan }}">
                                            </div>

                                         --}}
                                        {{-- </div>
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
                @endforeach --}}
                {{-- endEdit --}}
            </div>
                @endsection
            </div>
        </div>
        
    </div>
        
</div>
    


{{-- <div class="form-group">
                                                <label for="">Jumlah</label>
                                                <select name="id_barang" id="" class="form-control">
                                                    <option selected hidden disabled>Jumlah</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->id_stock }}">{{ $item->stock }}</option>
                                                    @endforeach
                                                </select>
                                            </div>  --}}



                                                {{-- <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input type="deskripsi" name="deskripsi" class="form-control" id="deskripsi"
                                                    aria-describedby="deskripsilHelp" placeholder="Deskripsi" value="{{ $item->deskripsi }}">
                                            </div> --}}