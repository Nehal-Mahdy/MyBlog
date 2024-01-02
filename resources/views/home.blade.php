@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @can('is-admin')
                    <p class="text-danger">Hello Admin</p>
                    @elsecan('is-manager')
                    <p class="text-danger">Hello Manager</p>
                    @elsecan('is-instructor')
                    <p class="text-danger">Hello instructor</p>
                    @elsecan('is-regular')
                    <p class="text-danger">Hello regular</p>
                    @endcan


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
