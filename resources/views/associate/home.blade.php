@extends('layouts.master')

@section('content')

    @component('components.card')
        @slot('header') Associate Dashboard @endslot
        <p class="text-success">
            You are logged in as an <strong>ASSOCIATE !</strong>
        </p>
    @endcomponent
    
@endsection
