@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Pembeli</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <a href="/superadmin/pembeli/create" class="btn btn-outline-primary"><i
                                class="feather mr-2 icon-plus"></i>Tambah
                            Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->telp}}</td>
                                <td>
                                    <a href="/superadmin/pembeli/edit/{{$item->id}}"
                                        class="btn btn-sm btn-outline-success"><i
                                            class="feather icon-check-circle"></i></a>
                                    <a href="/superadmin/pembeli/delete/{{$item->id}}"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Yakin ingin di hapus?');"><i
                                            class="feather icon-slash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush