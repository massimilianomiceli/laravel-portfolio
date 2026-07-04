@extends('layouts.admin')

@section('title')
    {{ $type->name }}
@endsection

@section('content')
    <div class="project-show container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fs-3 project-title mb-1">
                    {{ $type->name }}
                </h2>
                <p class="project-subtitle mb-0">
                    Type details #{{ $type->id }}
                </p>
            </div>

            <a href="{{ route('types.index') }}" class="btn btn-outline-custom">
                Go back
            </a>
        </div>

        <div class="card project-card">
            <div class="project-card-header">
                <h5 class="mb-0">
                    Type information
                </h5>
            </div>

            <div class="card-body p-4">

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Name
                        </div>
                        <p class="project-value mb-0">
                            {{ $type->name }}
                        </p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="mb-4">
                    <div class="project-label mb-2">
                        Description
                    </div>

                    <div class="project-summary">
                        <p class="mb-0">
                            {{ $type->description }}
                        </p>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('types.index') }}" class="btn btn-back">
                        Go back
                    </a>

                    <a href="{{ route('types.edit', $type) }}" class="btn btn-edit-custom">
                        Edit
                    </a>
                    <!-- Pulsante apertura modale -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete type
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                        aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">
                                        Delete type
                                    </h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>

                                <div class="modal-body">
                                    Are you sure you want to delete
                                    <strong>{{ $type->name }}</strong>?
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
                </div>
            </div>
        </div>

    </div>
@endsection
