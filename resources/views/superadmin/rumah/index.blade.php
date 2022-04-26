@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Rumah</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <a href="/superadmin/rumah/create" class="btn btn-outline-primary"><i
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
                                <th>Kode</th>
                                <th>Type</th>
                                <th>Luas T.</th>
                                <th>Luas B.</th>
                                <th>Hr. Cash</th>
                                <th>Cicilan 10th</th>
                                <th>Cicilan 15th</th>
                                <th>Cicilan 20th</th>
                                <th>DP Kredit</th>
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
                                <td>{{$item->kode_rumah}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->luas_tanah}}</td>
                                <td>{{$item->luas_bangunan}}</td>
                                <td>{{number_format($item->harga_cash)}}</td>
                                <td>{{number_format($item->harga_kredit10)}}</td>
                                <td>{{number_format($item->harga_kredit15)}}</td>
                                <td>{{number_format($item->harga_kredit20)}}</td>
                                <td>{{number_format($item->uang_muka_kredit)}}</td>
                                <td>{{number_format($item->uang_muka_pesan)}}</td>
                                <td>
                                    <a href="/superadmin/rumah/edit/{{$item->id}}"
                                        class="btn btn-sm btn-outline-success"><i
                                            class="feather icon-check-circle"></i></a>
                                    <a href="/superadmin/rumah/delete/{{$item->id}}"
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