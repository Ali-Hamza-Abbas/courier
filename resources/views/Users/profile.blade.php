@extends('../layout')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
    <div class="card bg-dark text-white">
        <div class="row mt-2">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>User Profile</h2>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="row">
            <div class="col-sm-12 text-center"><h1>{{$user['firstName']." ".$user['lastName']}}</h1></div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('/storage/images/UserProfile')."/".Auth::user()->avatar }}" class="avatar img-circle img-thumbnail" alt="avatar">
                    @else
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    @endif
                    <h6>Upload a different photo...</h6>
                    <form id="image-upload" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="photo" name="photo" class="text-center center-block file-upload" accept="image/png, image/gif, image/jpeg">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div><hr>
            </div>

            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item waves-effect waves-light"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
                    <li class="nav-item waves-effect waves-light"><a class="nav-link" data-toggle="tab" href="#change-password">Change password</a></li>
                  </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                      <form id="user_profile">
                            @csrf
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name"><h4>First name</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user['firstName']}}" title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name"><h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user['lastName']}}" title="enter your last name if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="phone"><h4>Phone</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{$user['phoneNo']}}" title="enter your phone number if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label><span class="text-danger"> can not change email</span>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$user['email']}}" title="enter your email." disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="address"><h4>Address</h4></label>
                                    <input type="address" class="form-control" name="address" id="address" value="{{$user['address']}}" title="enter a location">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit" id="user_profile_button"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    <hr>
                </div>

                <div class="tab-pane" id="change-password">
                      <form>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="CurrentPassword"><h4>Current Password</h4></label>
                                    <input type="password" class="form-control" name="current_password" id="current_password" autocomplete="" title="enter your current password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="ChangePassword"><h4>Change Password</h4></label>
                                    <input type="password" class="form-control" name="change_password" id="change_password" autocomplete="" title="enter change password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="ConfirmPassword"><h4>Confirm Password</h4></label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" autocomplete="" title="enter confirm password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--/col-9-->
        </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function(){
                readURL(this);
            });

            $('#user_profile_button').on('click', function (e){
                e.preventDefault();

                var ele = document.getElementById('first_name');
                var first_name = ele.value;
                first_name = first_name.trim();

                if(first_name.length === 0){
                    toastr.warning("First Name Field Empty!");
                    ele.focus();
                    return false;
                }

                var ele = document.getElementById('last_name');
                var last_name = ele.value;
                last_name = last_name.trim();

                if(last_name.length === 0){
                    toastr.warning("Last Name Field Empty!");
                    ele.focus();
                    return false;
                }

                var ele = document.getElementById('phone');
                var phone = ele.value;
                phone = phone.trim();

                if(phone.length === 0){
                    toastr.warning("Phone Field Empty!");
                    ele.focus();
                    return false;
                }

                var ele = document.getElementById('address');
                var address = ele.value;
                address = address.trim();

                if(address.length === 0){
                    toastr.warning("Address Field Empty!");
                    ele.focus();
                    return false;
                }

                var data = $("#user_profile").serialize();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/') }}/profile-update",
                    data: data,
                    success: function (response) {
                        response = JSON.parse(response);
                        if(response.error){
                            toastr.error(response.error);
                        } else if(response.success){
                            toastr.success(response.success);
                        }
                    },
                    error: function () {
                        toastr.error(response.error);
                    }
                });
            });

            $('#image-upload').on('submit',function(e){
                e.preventDefault();

                var ele = document.getElementById("photo");
                var photo = ele.value;

                if(!photo){
                    toastr.error("Choose an image first");
                    ele.focus();
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/') }}/image-update",
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function (response) {
                            response = JSON.parse(response);
                            if(response.error){
                                toastr.error(response.error);
                            } else if(response.success){
                                toastr.success(response.success);
                            }
                        },
                        error: function () {
                            toastr.error(response.error);
                        }
                    });
                }
            });
        });
    </script>
@endsection

