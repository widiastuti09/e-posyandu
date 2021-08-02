@component('mail::message')
# Introduction

konfirmasi Kode Reset Password

<h1>Hello,{{$name}}</h1>
<h2>Kode OTP {{$code_digit}}</h2>
<h5>Masukkan kode ini untuk menyelesaikan reset password</h5>
<h5>Salam Sehat</h5>

Terimakasih<br>
<center>E-Posyandu</center>
@endcomponent