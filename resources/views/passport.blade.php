@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
@endsection