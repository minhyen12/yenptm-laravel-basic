<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row ">
            @if (session()->has('error'))
                <div class="alert alert-danger col-lg-12">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>
        <div class="row mt-5">
            <div class="card col-lg-8 m-auto p-0">
                <div class="card-header">
                Register Form
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}"  method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="mail_address">Email</label>
                            <input type="text" class="form-control" name="mail_address" id="mail_address">
                        </div>
                        @if ($errors->has('mail_address'))
                            <p style="color: red;">{{ $errors->first('mail_address') }}</p>
                            <script >
                                document.getElementById('mail_address').setAttribute("style", "border-color: #ff0000;")
                            </script>
                        @endif
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        @if ($errors->has('password'))
                            <p style="color: red;">{{ $errors->first('password') }}</p>
                            <script >
                                document.getElementById('password').setAttribute("style", "border-color: #ff0000;")
                            </script>
                        @endif
                        <div class="form-group">
                            <label for="password_cf">Password Confirmation</label>
                            <input type="password" class="form-control" name="password_cf" id="password_cf">
                        </div>
                        @if ($errors->has('password_cf'))
                            <p style="color: red;">{{ $errors->first('password_cf') }}</p>
                            <script >
                                document.getElementById('password_cf').setAttribute("style", "border-color: #ff0000;")
                            </script>
                        @endif
                        <div class="form-group">
                            <label for="name">{{ trans('labels.user_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        @if ($errors->has('name'))
                            <p style="color: red;">{{ $errors->first('name') }}</p>
                            <script >
                                document.getElementById('name').setAttribute("style", "border-color: #ff0000;")
                            </script>
                        @endif
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                        @if ($errors->has('address'))
                            <p style="color: red;">{{ $errors->first('address') }}</p>
                            <script >
                                document.getElementById('address').setAttribute("style", "border-color: #ff0000;")
                            </script>
                        @endif
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        @if ($errors->has('phone'))
                            <p style="color: red;">{{ $errors->first('phone') }}</p>
                            <script >
                                document.getElementById('phone').setAttribute("style", "border-color: #ff0000;")
                            </script>
                        @endif
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" name="submit" value="submit" class="btn btn-success">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
