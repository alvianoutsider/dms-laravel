@extends('layouts.back')



@section('content')

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

@section('content')
<div class="card">
  <div class="card-header text-white" style="background-color: #005ea3;">Tambah Arsip Baru</div>
  <div class="card-body">
    <form action="{{ route('archive.create') }}" method="POST">
      @csrf
      @include('archive.partials.form-control')
    </form>
  </div>
</div>
@endsection