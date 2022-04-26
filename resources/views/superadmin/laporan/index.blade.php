@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Laporan</h5>
            </div>
            <div class="card-body table-border-style">

                <a href="/superadmin/laporan/rumah" class="btn btn-outline-success">Data Rumah</a> <br /> <br />
                <a href="/superadmin/laporan/pembeli" class="btn btn-outline-success">Data Pembeli</a> <br />
                <br />
                <a href="/superadmin/laporan/karyawan" class="btn btn-outline-success">Data Karyawan</a> <br /> <br />
                <a href="/superadmin/laporan/booking" class="btn btn-outline-success">Data Booking</a> <br /><br />
                <a href="/superadmin/laporan/penjualan" class="btn btn-outline-success">Data Penjualan</a> <br /><br />
                <br />
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush