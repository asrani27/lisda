@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data Rumah</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <a href="/superadmin/rumah" class="btn btn-outline-secondary"><i
                            class="feather mr-2 icon-arrow-left"></i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/rumah/create">
                <div class="row">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="Text">Kode Rumah</label>
                            <input type="text" class="form-control" placeholder="kode_rumah" name="kode_rumah" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Type</label>
                            <input type="text" class="form-control" placeholder="type" name="type" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Luas Tanah</label>
                            <input type="text" class="form-control" placeholder="luas_tanah" name="luas_tanah" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Luas_bangunan</label>
                            <input type="text" class="form-control" placeholder="luas_bangunan" name="luas_bangunan"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Harga Cash</label>
                            <input type="text" class="form-control" placeholder="harga cash" name="harga_cash" required
                                onkeypress="return hanyaAngka(event)">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Cicilan Kredit 10Th</label>
                            <input type="text" class="form-control" placeholder="Cicilan Kredit 10 th"
                                name="harga_kredit10" required onkeypress="return hanyaAngka(event)">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Cicilan Kredit 15Th</label>
                            <input type="text" class="form-control" placeholder="Cicilan Kredit 15 th"
                                name="harga_kredit15" required onkeypress="return hanyaAngka(event)">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Cicilan Kredit 20Th</label>
                            <input type="text" class="form-control" placeholder="Cicilan Kredit 20 th"
                                name="harga_kredit20" required onkeypress="return hanyaAngka(event)">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Uang Muka Kredit</label>
                            <input type="text" class="form-control" placeholder="Uang Muka Kredit"
                                name="uang_muka_kredit" required onkeypress="return hanyaAngka(event)">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Uang Muka Pesan</label>
                            <input type="text" class="form-control" placeholder="Uang muka pesan" name="uang_muka_pesan"
                                required onkeypress="return hanyaAngka(event)">
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
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endpush