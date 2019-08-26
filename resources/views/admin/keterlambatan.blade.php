@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-keterlambatan-component store="{{ route('denda') }}" fetch="{{ route('terlambat.fetch') }}"></table-keterlambatan-component>
            @endsection
