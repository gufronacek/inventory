@extends('layout.template')
@section('title', 'Stock Barang')
@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Stock Barang </h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                Tambah Barang
              </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>kd_barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Merk</th>
                            <th>Stock Barang</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($stock as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kd_barang }}</td>
                            <td>{{ $item->nm_barang }}</td>
                            <td>{{ $item->Jenis }}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->lokasi}}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-success">Detail</button> --}}
                                <a href="/stok/edit/{{ $item->id_stock }}" class="btn btn-warning"  data-toggle="modal" data-target="#myEdit{{ $item->id_stock }}">Edit</a>
                                <a href="/stok/delete/{{ $item->id_stock }}" class="btn btn-danger">Delete</a>
                            </td>    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- my modal --}}
                <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                
                <form method="post" action="/stok">
                    
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">tambah Data</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                        @csrf
                        
                        <div class="row ">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kd_barang">Kode Barang</label>
                                    <input type="text" name="kd_barang" class="form-control" id="kd_barang" placeholder="Kode Barang" >
                                </div>
                                <div class="form-group">
                                    <label for="Jenis">Jenis Barang</label>
                                    <input type="Jenis" name="Jenis" class="form-control" id="Jenis" aria-describedby="jenislHelp" placeholder="jenis" >
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nm_barang">Nama Barang</label>
                                    <input type="text" name="nm_barang" class="form-control" id="nm_barang" placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="merk" name="merk" class="form-control" id="merk" aria-describedby="merklHelp" placeholder="merk">
                                </div>
                            </div>
                            <div class="col-6">
        
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="stock" name="stock" class="form-control" id="stock" aria-describedby="stocklHelp" placeholder="stock">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lokasi">lokasi</label>
                                    <input type="lokasi" name="lokasi" class="form-control" id="lokasi" aria-describedby="lokasilHelp" placeholder="lokasi">
                                </div>
                            </div>
                            
                    
                        </div>
                        {{-- <div class="form-group">
                                    <label for="">Pilih Nama Barang</label>
                                    <select name="id_barang" id="" class="form-control">
                                        <option selected hidden disabled>Pilih Barang</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                        
                        
                        {{-- {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">tanggal</label>
                                    <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock">
                                </div>
                            </div>
                        </div> --}}
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
        {{-- end modal --}}

        {{-- myEdit --}}
                
        @foreach($stock as $item)
            <div class="modal fade" id="myEdit{{ $item->id_stock }}">
                <div class="modal-dialog">
                <div class="modal-content">
                    
                    <form action="/stok/update/{{ $item->id_stock }}" method="post">
                        
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                            @csrf
                            
                            <div class="row ">
                                <div class="col-6">
                                    {{-- <div class="form-group">
                                        <label for="">Pilih Nama Barang</label>
                                        <select name="id_barang" id="" class="form-control">
                                            <option selected hidden disabled>Pilih Barang</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    
                                    <div class="form-group">
                                        <label for="id_barang">Kode Barang</label>
                                        <input type="text" name="kd_barang" class="form-control" id="id_barang" placeholder="Nama Barang" value="{{ $item->kd_barang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Jenis">Jenis Barang</label>
                                        <input type="Jenis" name="Jenis" class="form-control" id="Jenis" aria-describedby="jenislHelp" placeholder="jenis" value="{{ $item->Jenis }}">
                                    </div>
                                    
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_barang">Nama Barang</label>
                                        <input type="text" name="nm_barang" class="form-control" id="id_barang" placeholder="Nama Barang" value="{{ $item->nm_barang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="merk">Merk</label>
                                        <input type="merk" name="merk" class="form-control" id="merk" aria-describedby="merklHelp" placeholder="merk" value="{{ $item->merk }}">
                                    </div>
                                </div>
                                <div class="col-6">
            
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="stock" name="stock" class="form-control" id="stock" aria-describedby="stocklHelp" placeholder="stock" value="{{ $item->stock }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lokasi">lokasi</label>
                                        <input type="lokasi" name="lokasi" class="form-control" id="lokasi" aria-describedby="lokasilHelp" placeholder="lokasi" value="{{ $item->lokasi }}">
                                    </div>
                                </div>
                                
                        
                            </div>
                            
                            
                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">tanggal</label>
                                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock">
                                    </div>
                                </div>
                            </div> --}}
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
{{-- endEdit --}}
            </div>
        </div>
    </div>
    
    
</div>

    
@endsection
{{-- <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <form method="post" action="/barang/update/{{ $item->id_stock }}">
            
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                @csrf
                
                <div class="row ">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kd_barang">Kode Barang</label>
                            <input type="text" name="kd_barang" class="form-control" id="kd_barang" placeholder="Kode Barang" >
                        </div>
                        <div class="form-group">
                            <label for="Jenis">Jenis Barang</label>
                            <input type="Jenis" name="Jenis" class="form-control" id="Jenis" aria-describedby="jenislHelp" placeholder="jenis" >
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nm_barang">Nama Barang</label>
                            <input type="text" name="nm_barang" class="form-control" id="nm_barang" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="merk" name="merk" class="form-control" id="merk" aria-describedby="merklHelp" placeholder="merk">
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="stock" name="stock" class="form-control" id="stock" aria-describedby="stocklHelp" placeholder="stock">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="lokasi">lokasi</label>
                            <input type="lokasi" name="lokasi" class="form-control" id="lokasi" aria-describedby="lokasilHelp" placeholder="lokasi">
                        </div>
                    </div>
                    
            
                </div> --}}
                {{-- <div class="form-group">
                            <label for="">Pilih Nama Barang</label>
                            <select name="id_barang" id="" class="form-control">
                                <option selected hidden disabled>Pilih Barang</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id_barang }}">{{ $item->nm_barang }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                
                
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">tanggal</label>
                            <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock">
                        </div>
                    </div>
                </div> --}}
        {{-- </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
    </form>
        
      </div>
    </div>
</div> --}}