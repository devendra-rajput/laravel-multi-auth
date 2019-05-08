@extends('layouts.master')

@section('content')

    @component('components.card')
        @slot('header') My Account @endslot
        <div class="row">
            <div class="col-sm-4"><strong>Name:</strong></div>
            <div class="col-sm-8 mb-3">{{ $user->name }}</div>
            <div class="col-sm-4"><strong>Email:</strong></div>
            <div class="col-sm-8 mb-3">{{ $user->email }}</div>
            <div class="col-sm-4"><strong>Phone:</strong></div>
            <div class="col-sm-8 mb-3">{{ $user->phone }}</div>
        </div>
    @endcomponent
    
@endsection
