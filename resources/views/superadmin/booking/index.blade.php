@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Booking Rumah</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <a href="/superadmin/booking/create" class="btn btn-outline-primary"><i
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
                                <th>TGL</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kode & Type</th>
                                <th>Luas T.</th>
                                <th>Luas B.</th>
                                <th>DP Booking</th>
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
                                <td>{{\Carbon\carbon::parse($item->created_at)->format('d-M-Y')}}</td>
                                <td>{{$item->pembeli->nik}}</td>
                                <td>{{$item->pembeli->nama}}</td>
                                <td>{{$item->kode_rumah}}-{{$item->type}}</td>
                                <td>{{$item->luas_tanah}}</td>
                                <td>{{$item->luas_bangunan}}</td>
                                <td>{{number_format($item->uang_muka_pesan)}}</td>
                                <td>
                                    <a href="/superadmin/booking/edit/{{$item->id}}"
                                        class="btn btn-sm btn-outline-success"><i
                                            class="feather icon-check-circle"></i></a>
                                    <a href="/superadmin/booking/delete/{{$item->id}}"
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