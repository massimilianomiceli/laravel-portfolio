@extends('layouts.admin')

@section('title')
    Technologies
@endsection

@section('content')
    <div class="project-index container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="project-title mb-0">
                Technologies
            </h2>

            <a href="{{ route('technologies.create') }}" class="btn btn-outline-custom">
                + Add Technology
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                List of technologies
            </div>

            <div class="table-responsive">
                <table class="table-hover project-table mb-0 table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <th scope="row">
                                    <a href="{{ route('technologies.show', $technology->id) }}" class="project-link">
                                        {{ $technology->id }}
                                    </a>
                                </th>

                                <td class="project-name">
                                    {{ $technology->name }}
                                </td>

                                <td>
                                    <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-edit-custom">
                                        Edit
                                    </a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $technology->id }}">
                                        Delete
                                    </button>

                                    <div class="modal fade" id="deleteModal{{ $technology->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $technology->id }}" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $technology->id }}">
                                                        Delete technology
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    Are you sure you want to delete
                                                    <strong>{{ $technology->name }}</strong>?
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                    <form action="{{ route('technologies.destroy', $technology) }}"
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
