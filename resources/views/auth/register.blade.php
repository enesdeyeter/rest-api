<h1>kayıt ol</h1>

<form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" id="kt_login_signin_form" method="post" action="{{route('register-post')}}">
@csrf
<!--begin::Title-->
    <div class="pb-13 pt-lg-0 pt-5">
        <span class="text-muted font-weight-bold font-size-h2">soci register page</span><br><br>
{{--        <small>info@stablemobile.com</small> | <small>admin</small>--}}
    </div>
    <!--begin::Title-->
    <!--begin::Form group-->
    <div class="form-group fv-plugins-icon-container">
        <label class="font-size-h6 font-weight-bolder text-dark">İsim</label><br>
        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text"
               name="name" autocomplete="on">
        <div class="fv-plugins-message-container"></div>
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group fv-plugins-icon-container">
        <label class="font-size-h6 font-weight-bolder text-dark">Email</label><br>
        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text"
               name="email" autocomplete="on">
        <div class="fv-plugins-message-container"></div>
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group fv-plugins-icon-container">
        <div class="d-flex justify-content-between mt-n5">
            <label class="font-size-h6 font-weight-bolder text-dark pt-5">Şifre</label><br>
        </div>
        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password"
               name="password" autocomplete="off">
        <div class="fv-plugins-message-container"></div>
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group fv-plugins-icon-container">
        <div class="d-flex justify-content-between mt-n5">
            <label class="font-size-h6 font-weight-bolder text-dark pt-5">Şifreyi onayla</label><br>
        </div>
        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password"
               name="password_confirmation" autocomplete="off">
        <div class="fv-plugins-message-container"></div>
    </div>
    <!--end::Form group-->
    <!--begin::Action-->
    <div class="pb-lg-0 pb-5">
        <button type="submit" id="kt_login_signin_submit"
                class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">kayıt ol
        </button>
    </div>
    <!--end::Action-->
    <input type="hidden">
    <div></div>
</form>
