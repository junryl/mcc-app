@extends('layouts.admin')

@section('content')
    <x-enrollment :courses="$courses"></x-enrollment>
@endsection

@section('scripts')
  <script>       
    $(document).ready(function() {    

    });    
  </script>
@endsection