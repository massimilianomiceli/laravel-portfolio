@extends('layouts.admin')

@section('title')
    Projects
@endsection

@section('content')
    <div class="project-index container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="project-title mb-0">
                Projects
            </h2>

            <a href="{{ route('projects.create') }}" class="btn btn-add-custom">
                + Add Project
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                Elenco progetti
            </div>

            <div class="table-responsive">
                <table class="table-hover project-table mb-0 table">
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
                                <th scope="row">
                                    <a href="{{ route('projects.show', $project->id) }}" class="project-link">
                                        {{ $project->id }}
                                    </a>
                                </th>

                                <td class="project-name">
                                    {{ $project->name }}
                                </td>

                                <td>
                                    {{ $project->customer }}
                                </td>

                                <td>
                                    {{ $project->period_start }}
                                </td>

                                <td>
                                    {{ $project->period_end }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
