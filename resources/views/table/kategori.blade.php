@extends('layout.template')
@section('title', 'kategori')
@section('konten')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang Kategori  </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 mr-5">
            {{-- <button href="" type="button" class="btn btn-danger">
                Data yang hapus
            </button> --}}
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Tambah Barang Kategori
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>
                            
                                <button class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{$data->id }}">edit</button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- model --}}
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/kategori">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Kategori</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <input type="text" name="kategori" class="form-control" id="kategori"
                                                    placeholder="Kategori" required>
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
                {{-- model edit --}}
                
        </div>
    </div>

</div>
</div>
</div>
            @foreach($kategori as $data)                    
                <div class="modal fade" id="myEdit{{ $data->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="" action="kategori/update/{{ $data->id }}">
                                
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Data Kategori</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <input type="text" name="kategori" class="form-control" id="kategori"
                                                    placeholder="Kategori" value="{{ $data->kategori }}">
                                            </div>
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
@endsection




























{{-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
            Tambah Barang  Masuk
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive"> --}}
            {{-- <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Barang </h1>
                <div class="card shadow mb-4"> 
                    <div class="card-header py-3 mr-5">
                        <button href="" type="button" class="btn btn-danger">
                            Data yang hapus
                        </button>
                        
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Tambah Barang Kategori
                        </button>
                    </div>  
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-bordered" style="text-align: center" id="dataTable" width="100%"
                            cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($kategori as $data)
                                <tbody>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->kategori }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success">Detail</button>
                                        <a href="" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myEdit">Edit</a>
                                        <a href="/masuk/delete/{{ $item->id_masuk }}" type="button" class="btn btn-danger">Delete</a> 
                                    </td>
                                </tbody>
                                @endforeach
                            
                            </table>    
                        </div>    
                    </div>      
                </div>
            </div>
             --}}