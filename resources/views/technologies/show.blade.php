@extends('layouts.admin')

@section('title')
    {{ $technology->name }}
@endsection

@section('content')
    <div class="project-show container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fs-3 project-title mb-1">
                    {{ $technology->name }}
                </h2>
            </div>

            <a href="{{ route('technologies.index') }}" class="btn btn-outline-custom">
                Go back
            </a>
        </div>

        <div class="card project-card">
            <div class="project-card-header">
                <h5 class="mb-0">
                    Technology information
                </h5>
            </div>

            <div class="card-body p-4">

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Name
                        </div>
                        <p class="project-value mb-0">
                            {{ $technology->name }}
                        </p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="mb-4">
                    <div class="project-label mb-2">
                        Color
                    </div>

                    <div class="project-summary">
                        <div class="d-flex align-items-center gap-2">
                            <span class="technology-color-preview" style="background-color: {{ $technology->color }};"
                                title="{{ $technology->color }}"></span>

                            <p class="mb-0">
                                {{ $technology->color }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('technologies.index') }}" class="btn btn-back">
                        Go back
                    </a>

                    <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-edit-custom">
                        Edit
                    </a>
                    <!-- Pulsante apertura modale -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete technology
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                        aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">
                                        Delete technology
                                    </h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>

                                <div class="modal-body">
                                    Are you sure you want to delete
                                    <strong>{{ $technology->name }}</strong>?
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>

                                    <form action="{{ route('technologies.destroy', $technology) }}" method="POST">
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
