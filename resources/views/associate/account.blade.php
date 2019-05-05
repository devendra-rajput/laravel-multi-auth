@extends('layouts.master')

@section('content')

    @component('components.card')
        @slot('header') My Account @endslot
        <div class="row">
            <div class="col-md-2">
                <div class="p-2"><strong>Name:</strong></div>
                <div class="p-2"><strong>Email:</strong></div>
                <div class="p-2"><strong>Phone:</strong></div>
            </div>
            <div class="col-md-10">
                <div class="p-2">{{ $associate->name }}</div>
                <div class="p-2">{{ $associate->email }}</div>
                <div class="p-2">{{ $associate->phone }}</div>
            </div>
        </div>
    @endcomponent
    
@endsection
