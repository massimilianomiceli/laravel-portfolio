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

            <a href="{{ route('projects.create') }}" class="btn btn-outline-custom">
                + Add Project
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                List of projects
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
                            <th scope="col">Action</th>
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
                                <td>
                                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-edit-custom">
                                        Edit
                                    </a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $project->id }}">
                                        Delete
                                    </button>

                                    <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">
                                                        Delete project
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    Are you sure you want to delete
                                                    <strong>{{ $project->name }}</strong>?
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                    <form action="{{ route('projects.destroy', $project) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
