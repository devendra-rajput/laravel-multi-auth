@extends('layouts.master')

@section('content')

    @component('components.card')
        @slot('header') User Dashboard @endslot
        <p class="text-success">
            You are logged in as an <strong>USER !</strong>
        </p>
    @endcomponent
            
@endsection
