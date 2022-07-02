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
            <div class="col-sm-12 text-center"><h1>{{Auth::user()->name}}</h1></div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div><hr>
            </div>

            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item waves-effect waves-light"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
                    <li class="nav-item waves-effect waves-light"><a class="nav-link" data-toggle="tab" href="#change-password">Change password</a></li>
                  </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                      <form>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name"><h4>First name</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" value="" title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name"><h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" value="" title="enter your last name if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="phone"><h4>Phone</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="" title="enter your phone number if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email" value="" title="enter your email." disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="address"><h4>Address</h4></label>
                                    <input type="address" class="form-control" id="address" value="" title="enter a location">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
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
        });
    </script>
@endsection

