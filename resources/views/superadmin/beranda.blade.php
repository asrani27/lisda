@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Selamat Datang, {{Auth::user()->username}}</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Welcome!</h4>
                    <p>Selamat Datang di halaman administrator, untuk mengelola aplikasi ini, anda bisa
                        menggunakan menu yang berada di sebelah kiri</p>

                </div>
            </div>
        </div>
    </div>
    <!-- [ additional-alert ] end -->
</div>
@endsection