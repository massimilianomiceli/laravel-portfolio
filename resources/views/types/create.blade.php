@extends('layouts.admin')

@section('title')
    Add a type
@endsection

@section('content')
    <div class="project-create container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="project-title mb-1">
                    Add a type
                </h2>

                <p class="project-subtitle mb-0">
                    Create a new type
                </p>
            </div>

            <a href="{{ route('types.index') }}" class="btn btn-outline-custom">
                Go back
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                Type information
            </div>

            <div class="project-card-body">
                <form action="{{ route('types.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label project-label">
                                Name
                            </label>

                            <input type="text" class="form-control project-input" name="name" id="name" required
                                minlength="3" maxlength="100">
                        </div>

                        <div class="col-12">
                            <div class="project-divider"></div>

                            <label for="description" class="form-label project-label">
                                Summary
                            </label>

                            <textarea class="form-control project-input project-textarea" placeholder="Briefly describe it" name="description"
                                id="description" required minlength="10" maxlength="1000" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="d-flex mt-4 gap-2">
                        <a href="{{ route('types.index') }}" class="btn btn-back">
                            Go back
                        </a>

                        <button type="submit" class="btn btn-edit-custom">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
