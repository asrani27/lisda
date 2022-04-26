@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data Booking Rumah</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <a href="/superadmin/booking" class="btn btn-outline-secondary"><i
                            class="feather mr-2 icon-arrow-left"></i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/booking/create">
                <div class="row">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="Text">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal"
                                value="{{\Carbon\Carbon::today()->format('Y-m-d')}}" readonly">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Pembeli</label>
                            <select name="pembeli_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($pembeli as $item)
                                <option value="{{$item->id}}">{{$item->nik}} - {{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Type Rumah</label>
                            <select name="rumah_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($rumah as $item)
                                <option value="{{$item->id}}">{{$item->kode_rumah}} - {{$item->type}} DP Pesan :
                                    {{number_format($item->uang_muka_pesan)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    document.getElementById("tanggal").disabled = true;

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endpush