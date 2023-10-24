@extends('layout.template')
@section('title', 'Satuan')
@section('konten')
<div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"> Barang Satuan </h1>
    <div class="card shadow mb-4"> 
        <div class="card-header py-3 mr-5">
            {{-- <button href="" type="button" class="btn btn-danger">
                Data yang hapus
            </button> --}}
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Tambah Barang Satuan
            </button>
        </div>  
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($satuan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->satuan }}</td>
                            <td>
                                {{-- <a href="/satuan/edit/{{  $data->id }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{ $data->id  }}">Edit</a> --}}
                                <a href="/satuan/edit/{{ $data->id }}" class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{ $data->id }}">edit</a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>    
                {{-- model --}}
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/satuan">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Satuan</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="satuan">Satuan</label>
                                                <input type="text" name="satuan" class="form-control" id="satuan"
                                                    placeholder="satuan" required>
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
        </div>      
    </div>
</div>
    {{-- myEdit --}}
    @foreach ($satuan as $data)
    <div class="modal fade" id="myEdit{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="" action="satuan/update/{{ $data->id }}">
                    
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
                                    <label for="satuan">satuan</label>
                                    <input type="text" name="satuan" class="form-control" id="satuan"
                                        placeholder="satuan" value="{{ $data->satuan }}">
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





    {{-- <div class="modal fade" id="myEdit{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="satuan/update/{{ $data->id }}">

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
                                    <label for="satuan">satuan</label>
                                    <input type="text" name="satuan" class="form-control" id="satuan"
                                        placeholder="satuan" value="{{ $data->satuan }}">
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
    </div>   --}}
    @endforeach
@endsection