@extends('layouts.back')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
  $('.select2').select2(
    {
      placeholder: "  Pilih Roles"
    }
  );


  });
  }
</script>
@endpush


@section('content')

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

@section('content')
<div class="card">
  <div class="card-header">Edit {{ $archive->no }}</div>
  <div class="card-body">
    <form action="{{ route('archive.edit', $archive) }}" method="POST">
      @csrf
      @method('PUT')
      @include('archive.partials.form-control')
    </form>
  </div>
</div>
@endsection