@extends('layout')

@section('content')
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-6 mx-auto">
                <div class="card h-100 border-primary justify-content-center">
                    <div>
                        <div class="card">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                                </ol>
                            </nav>

                            <div class="container p-2">
                                <div class="login_form">
                                    <form id="login">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email address</label> <span class="text-danger"> * </span>
                                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" autocomplete="">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label> <span class="text-danger"> * </span>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="">
                                        </div>
                                        <button type="button" class="btn btn-primary float-right" onclick="login();">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function login(){
            var ele = document.getElementById('email');
            var email = ele.value;
            email = email.trim();

            if(email.length === 0){
                toastr.warning("Fill Email Sectoin");
                ele.focus();
                return false;
            }

            if(!checkEmail(email)){
                toastr.warning("Enter Valid Email Using @ and .com");
                ele.focus();
                return false;
            }

            var ele = document.getElementById('password');
            var password = ele.value.trim();
            password = password.trim();

            if(password.length === 0 || password.length < 8) {
                toastr.warning("Fill Password Sectoin with minimum 8 characters");
                return false;
            }

            var data = $("#login").serialize();
            $.ajax({
                type: 'POST',
                url: "{{ url('/') }}/login",
                data: data,
                success: function (response) {
                    if(response.error){
                        toastr.error(response.error);
                    } else if(response.success){
                        toastr.success(response.success);
                        setTimeout(function() {
                            location.href = '/dashboard';
                        }, 1000);
                    }
                },
                error: function () {
                    toastr.error(response.error);
                }
            });
        }
    </script>
@endsection
