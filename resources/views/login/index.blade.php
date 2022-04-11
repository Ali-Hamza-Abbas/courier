@extends('../layout')
<style>

</style>
@section('content')
    <div class="wrapper fadeInDown">
        <div id="formContent">

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form>
            <input type="email" id="Email" class="fadeIn second" name="Email" placeholder="Email">
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
            <input type="button" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

        </div>
    </div>
@endsection
