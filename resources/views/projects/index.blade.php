@extends('layouts.admin')
@section('title')
    Project
@endsection

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Projects
        </h2>
        <div class="row justify-content-center">
            <table class="table-hover table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row"><a href="{{ route('projects.show', $project->id) }}">{{ $project->id }}</a>
                            </th>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->customer }}</td>
                            <td>{{ $project->period_start }}</td>
                            <td>{{ $project->period_end }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
