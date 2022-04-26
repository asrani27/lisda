@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Penjualan Rumah</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <a href="/superadmin/penjualan/create" class="btn btn-outline-primary"><i
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
                                <th>No Transaksi</th>
                                <th>TGL</th>
                                <th>NIK & Nama</th>
                                <th>Kode & Type</th>
                                <th>No Rumah</th>
                                <th>Jenis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>T.0{{$no++}}</td>
                                <td>{{\Carbon\carbon::parse($item->created_at)->format('d-M-Y')}}</td>
                                <td>{{$item->pembeli->nik}} <br />{{$item->pembeli->nama}}</td>
                                <td>{{$item->rumah->kode_rumah}}-{{$item->rumah->type}}<br />
                                    Luas Tanah : {{$item->rumah->luas_tanah}}<br />
                                    Luas Bangunan : {{$item->rumah->luas_bangunan}}
                                </td>
                                <td>{{$item->no_rumah}}</td>
                                <td>
                                    {{$item->jenis == 'T' ? 'Tunai' : 'Kredit'}}<br />
                                    @if ($item->jenis == 'K')
                                    Lama Kredit : {{$item->lama_kredit}} Th</br>
                                    Cicilan : {{number_format($item->cicilan)}}
                                    @else
                                    Cash : {{number_format($item->cash)}}
                                    @endif
                                </td>
                                <td>
                                    <a href="/superadmin/penjualan/edit/{{$item->id}}"
                                        class="btn btn-sm btn-outline-success"><i
                                            class="feather icon-check-circle"></i></a>
                                    <a href="/superadmin/penjualan/delete/{{$item->id}}"
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