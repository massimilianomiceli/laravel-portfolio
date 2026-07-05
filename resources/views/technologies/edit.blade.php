@extends('layouts.admin')

@section('title')
    Edit a technology
@endsection

@section('content')
    <div class="project-create container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="project-title mb-1">
                    Edit a technology
                </h2>

                <p class="project-subtitle mb-0">
                    Edit a technology
                </p>
            </div>

            <a href="{{ route('technologies.index') }}" class="btn btn-outline-custom">
                Go back
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                Technology information
            </div>

            <div class="project-card-body">
                <form action="{{ route('technologies.update', $technology) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label project-label">
                                Name
                            </label>

                            <input type="text" class="form-control project-input" name="name" id="name" required
                                minlength="3" maxlength="100" value="{{ $technology->name }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="color" class="form-label project-label">
                                Color
                            </label>

                            <div>
                                <input type="color" class="form-control form-control-color project-color-input"
                                    name="color" id="color" title="Choose a project color" required
                                    value="{{ $technology->color }}">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mt-4 gap-2">
                        <a href="{{ route('technologies.index') }}" class="btn btn-back">
                            Go back
                        </a>

                        <button type="submit" class="btn btn-edit-custom">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
