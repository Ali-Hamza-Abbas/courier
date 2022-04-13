@extends('../layout')

@section('content')

<div class="row mt-2">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Users</h2>
        </div>

        <div class="float-right">
            <a class="btn btn-success" href="{{ route('users.create') }}">Create New User</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered mt-2">
    <tr>
        <th>No</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Type</th>
        <th Width="280px">Action</th>
    </tr>
    @foreach ($User as $user)
        <tr>
            <td> {{ ++$i }} </td>
            <td> {{ $user->name }} </td>
            <td> {{ $user->email }} </td>
            <td> {{ $user->password }} </td>
            <td> {{ $user->type }} </td>
            <td>
                <form action="{{ route('users.destroy',$student->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('users.show', $student->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit', $student->id) }}" >Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
