@extends('BTVN_layout.master')
@section('css')
<style>
    .footer{
        height:50px;
        width: 100%;
        background:#f8f8f8;
        color:#777;
        text-align: center;
        line-height: 50px;
    }
</style>    
@endsection
@section('content')
<h4>Thông tin cá nhân</h4>
<ul>
   
    <li>Học và tên: {{ $name }}</li>
    <li>Năm sinh: {{ $date }}</li>
    <li>Trường học: {{ $school }}</li>
    <li>Quê quán: {{ $add }}</li> 
    <li>Mục tiêu nghề nghiệp: {{ $mt }}</li>
     {!! '<li>Giới thiệu bản thân: Chưa có nhiều kinh nghiệm về chuyên môn. Và đang rèn luyện và học tập để hoàn thành mục tiêu trên....</li>'!!}
</ul>
@endsection


