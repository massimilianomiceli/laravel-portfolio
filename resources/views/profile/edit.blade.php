@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Profile') }}
        </h2>
        <div class="card mb-4 rounded-lg bg-white p-4 shadow">

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="card mb-4 rounded-lg bg-white p-4 shadow">

            @include('profile.partials.update-password-form')

        </div>

        <div class="card mb-4 rounded-lg bg-white p-4 shadow">

            @include('profile.partials.delete-user-form')

        </div>
    </div>
@endsection
