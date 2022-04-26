@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data Penjualan Rumah</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <a href="/superadmin/penjualan" class="btn btn-outline-secondary"><i
                            class="feather mr-2 icon-arrow-left"></i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/penjualan/edit/{{$data->id}}">
                <div class="row">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="Text">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal"
                                value="{{\Carbon\Carbon::parse($data->created_at)->format('Y-m-d')}}" readonly">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Karyawan</label>
                            <select name="karyawan_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($karyawan as $item)
                                <option value="{{$item->id}}" {{$data->karyawan_id == $item->id ?
                                    'selected':''}}>{{$item->nik}} - {{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Pembeli</label>
                            <select name="pembeli_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($pembeli as $item)
                                <option value="{{$item->id}}" {{$data->pembeli_id == $item->id ?
                                    'selected':''}}>{{$item->nik}} - {{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Jenis Pembelian</label>
                            <select name="jenis" class="form-control" required onChange="tampil(this.value)">
                                <option value="">-pilih-</option>
                                <option value="T" {{$data->jenis == 'T' ? 'selected':''}}>Tunai</option>
                                <option value="K" {{$data->jenis == 'K' ? 'selected':''}}>Kredit</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="floating-label" for="Text">Type Rumah</label>
                            <select name="rumah_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($rumah as $item)
                                <option value="{{$item->id}}" {{$data->rumah_id == $item->id ? 'selected':''}}>Tipe :
                                    {{$item->type}}, Cash :
                                    {{number_format($item->harga_cash)}}, Info Kredit 10th:
                                    {{number_format($item->harga_kredit10)}}, 15th:
                                    {{number_format($item->harga_kredit15)}}, 20th:
                                    {{number_format($item->harga_kredit20)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">No Rumah</label>
                            <input type="text" class="form-control" name="no_rumah" value="{{$data->no_rumah}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text" id="label_kredit">Lama Kredit</label>
                            <select name="lama_kredit" class="form-control" id="lama_kredit">
                                <option value="">-pilih-</option>
                                <option value="10" {{$data->lama_kredit == '10' ? 'selected':''}}>10 Th</option>
                                <option value="15" {{$data->lama_kredit == '15' ? 'selected':''}}>15 Th</option>
                                <option value="20" {{$data->lama_kredit == '20' ? 'selected':''}}>20 Th</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
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
    function tampil(value){

    var x = document.getElementById("lama_kredit");
    var z = document.getElementById("label_kredit");
        if(value === 'T'){
            x.style.display = "none";
            z.style.display = "none";
        }else{
            x.style.display = "block";
            z.style.display = "block";
        }
    }

    document.getElementById("tanggal").disabled = true;
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endpush