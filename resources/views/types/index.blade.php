@extends('layouts.admin')

@section('title')
    Types
@endsection

@section('content')
    <div class="project-index container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="project-title mb-0">
                Types
            </h2>

            <a href="{{ route('projects.create') }}" class="btn btn-outline-custom">
                + Add Type
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                List of types
            </div>

            <div class="table-responsive">
                <table class="table-hover project-table mb-0 table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <th scope="row">
                                    <a href="{{ route('types.show', $type->id) }}" class="project-link">
                                        {{ $type->id }}
                                    </a>
                                </th>

                                <td class="project-name">
                                    {{ $type->name }}
                                </td>

                                <td>
                                    {{ $type->description }}
                                </td>

                                <td>
                                    <a href="{{ route('types.edit', $type) }}" class="btn btn-edit-custom">
                                        Edit
                                    </a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $type->id }}">
                                        Delete
                                    </button>

                                    <div class="modal fade" id="deleteModal{{ $type->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $type->id }}" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $type->id }}">
                                                        Delete type
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    Are you sure you want to delete
                                                    <strong>{{ $type->name }}</strong>?
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                    <form action="{{ route('types.destroy', $type) }}" method="POST">
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
