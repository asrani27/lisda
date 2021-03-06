<!DOCTYPE html>
<html lang="en">

<head>

    <title>Monitoring Marketing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="/theme/dist/assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="/theme/dist/assets/css/style.css">
    @toastr_css
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <form method="post" action="/login">
                        @csrf
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">PT. Griya Banua </h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Email" placeholder="Username"
                                    name="username">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" id="Password" placeholder="Password"
                                    name="password">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
                            <hr>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="/theme/dist/assets/js/vendor-all.min.js"></script>
<script src="/theme/dist/assets/js/plugins/bootstrap.min.js"></script>

<script src="/theme/dist/assets/js/pcoded.min.js"></script>

@toastr_js
@toastr_render
</body>

</html>