@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">My Account</div>
                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
