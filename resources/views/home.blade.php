<h1>anasayfa</h1>




<br><br><br><br>


@if(\Illuminate\Support\Facades\Auth::check())
    <a href="{{route("logout")}}">[çıkış yap]</a><br><br>
    {{\Illuminate\Support\Facades\Auth::user()}}
@else
    <a href="{{route("login")}}">[giris yap]</a> | <a href="{{route("register")}}">[kayıt ol]</a>
@endif
