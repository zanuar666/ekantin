<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-5.14.0/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title>Login - E-Kantin</title>

    <style>
        body {
            background: url(<?= asset('assets/img/bg.jpg') ?>);
            background-size: cover;
            background-repeat: repeat-y;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login-box">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-white">E-Kantin</h1>

                            <form id="frmLogin" action="{{ url()->current() . '/auth' }}" method="POST" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="form-input">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>

                                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                            </div>

                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-flat btn-block">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert-2.1.2/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        $('#frmLogin').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let elementsForm = $(this).find('button, input');

            elementsForm.attr('disabled', true);

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    elementsForm.removeAttr('disabled');

                    if (response.RESULT == 'OK') {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        return swalError(response.MESSAGE);
                    }
                }
            }).fail(function() {
                elementsForm.removeAttr('disabled');

                return swalError();
            });
        });
    </script>
</body>

</html>