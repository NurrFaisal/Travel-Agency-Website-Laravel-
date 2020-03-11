<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Login | Propeller - Admin Dashboard">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <title>Cosmos Holiday | Login </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('cosmos/favicon/cosmos.png')}}">
    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/assets/')}}/css/bootstrap.min.css">
    <!-- Propeller css -->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/assets/')}}/css/propeller.min.css">
    <!-- Propeller theme css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/themes/')}}/css/propeller-theme.css" />
    <!-- Propeller admin theme css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cosmos/backEnd/themes/')}}/css/propeller-admin.css">
</head>
<body class="body-custom">
<div class="logincard">
    <div class="pmd-card card-default pmd-z-depth">

        <div class="login-card">
            <form method="post" action="{{URL::to('/apanel/auth-login')}}">
                <div class="pmd-card-title card-header-border text-center">
                    @if(Session::get('message'))
                    <p style="text-align: center;"><strong style="color: {{Session::get('color')}}">{{Session::get('message')}}</strong></p>
                    @endif
                    <div class="loginlogo">
                        <a href="javascript:void(0);"><img src="{{asset($logo->image)}}" alt="Logo"></a>
                    </div>
                </div>

                <div class="pmd-card-body">
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Username</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                            <input type="email" class="form-control" required id="exampleInputAmount" name="email">
                        </div>
                    </div>

                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                            <input type="password" class="form-control" id="exampleInputAmount" name="password">
                        </div>
                    </div>
                </div>
                <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">

                    <button  type="submit" class="btn pmd-ripple-effect btn-primary btn-block">Login</button>

                    <p class="redirection-link"> </p>

                </div>
                @csrf
            </form>
        </div>


    </div>
</div>

<!-- Scripts Starts -->
<script src="{{asset('cosmos/backEnd/assets/')}}/js/jquery-1.12.2.min.js"></script>
<script src="{{asset('cosmos/backEnd/assets/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('cosmos/backEnd/assets/')}}/js/propeller.min.js"></script>

<!-- login page sections show hide -->


<!-- Scripts Ends -->

</body>
</html>
