@php
    use Illuminate\Support\Facades\Auth;
@endphp

var ubase = "{{ route('welcome') }}";
var uHome = "{{ route('home') }}"
var uBandejaIndex = "{{-- route('bandeja.index') --}}";
var uBandejaData = "{{-- route('bandeja.data') --}}";
var uForceLogin = "{{ route('force-logi') }}";
var uViewPublicFile = "{{ route('publicFileByUuid', ['']) }}";
var uGetFile = "{{ route('downloadFileByUuid', ['']) }}";
var uViewFile = "{{ route('showFileByUuid', ['']) }}";
var uRecaptchaKey ="{{ config('engine.captcha_key') }}"
var uRole;
@auth
    uRole = "{{ Auth::user()->getTextRol() }}";
@endauth
