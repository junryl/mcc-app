@extends('layouts.admin')

@section('content')
    <x-student-list :users="$users"></x-student-list>
@endsection