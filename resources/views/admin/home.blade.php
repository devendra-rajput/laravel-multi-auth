@extends('layouts.master')

@section('content')

    @component('components.card')
        @slot('header') Admin Dashboard @endslot
        <p class="text-success">You are logged in as an <strong>ADMIN !</strong></p>
    @endcomponent
    
@endsection
