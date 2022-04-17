@extends('../layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tm">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index')}}"> Back </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Woops!</strong> there Were Some Problem With your input<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form>
        @csrf
        @method('PUT')

        <div class="row">
            <input type="hidden" name="user_id" id="user_id" class="form-control">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <strong>User Name</strong>
                    <input type="text" name="name" value="{{$User->name}}" class="form-control" placeholder="User Name ...">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="email" name="email" value="{{$User->email}}" class="form-control" placeholder="Email ...">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <strong>Password</strong>
                    <input type="password" name="password" value="{{$User->password}}" class="form-control" placeholder="Password ..." disabled>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <strong>Select type</strong>
                    <select class="form-control" name="admin" value="{{$User->admin}}">
                        <option selected="selected" disabled="disabled"> Please select any one </option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <button class="btn btn-primary" id="btn_edit" type="button"> Submit </button>
                </div>
            </div>
        </div>
    </form>

@endsection
