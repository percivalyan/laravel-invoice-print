@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.template')

@section('content')
    <div class="container py-5">
        <h1>Hello World</h1>
    </div>
@endsection --}}
