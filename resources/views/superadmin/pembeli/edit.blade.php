@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data Pembeli</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <a href="/superadmin/pembeli" class="btn btn-outline-secondary"><i
                            class="feather mr-2 icon-arrow-left"></i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/pembeli/edit/{{$data->id  }}">
                <div class="row">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="Text">NIK</label>
                            <input type="text" class="form-control" placeholder="nik" name="nik" required
                                onkeypress="return hanyaAngka(event)" value="{{$data->nik}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Nama</label>
                            <input type="text" class="form-control" placeholder="nama" name="nama" required
                                value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Alamat</label>
                            <input type="text" class="form-control" placeholder="alamat" name="alamat" required
                                value="{{$data->alamat}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Text">Telp</label>
                            <input type="text" class="form-control" placeholder="telp" name="telp" required
                                onkeypress="return hanyaAngka(event)" value="{{$data->telp}}">
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
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endpush