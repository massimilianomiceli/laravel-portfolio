@extends('layouts.admin')

@section('title')
    Edit a project
@endsection

@section('content')
    <div class="project-create container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="project-title mb-1">
                    Edit a project
                </h2>

                <p class="project-subtitle mb-0">
                    Edit a project
                </p>
            </div>

            <a href="{{ route('projects.index') }}" class="btn btn-outline-custom">
                Go back
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                Project information
            </div>

            <div class="project-card-body">
                <form action="{{ route('projects.update', $project) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label project-label">
                                Name
                            </label>

                            <input type="text" class="form-control project-input" name="name" id="name" required
                                minlength="3" maxlength="100" value="{{ $project->name }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="customer" class="form-label project-label">
                                Customer
                            </label>

                            <input type="text" class="form-control project-input" name="customer" id="customer"
                                minlength="2" maxlength="150" value="{{ $project->customer }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="period_start" class="form-label project-label">
                                Start date
                            </label>

                            <input type="date" class="form-control project-input" name="period_start" id="period_start"
                                required value="{{ $project->period_start }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="period_end" class="form-label project-label">
                                End date
                            </label>

                            <input type="date" class="form-control project-input" name="period_end" id="period_end"
                                value="{{ $project->period_end }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="type_id" class="form-label project-label">
                                Type
                            </label>

                            <select name="type_id" id="type_id" class="form-control project-input">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $project->type_id == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label project-label">
                                Technology
                            </label>

                            <div class="tag d-flex flex-wrap gap-3">
                                @foreach ($technologies as $technology)
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                            id="tag-{{ $technology->id }}"
                                            {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>

                                        <label for="tag-{{ $technology->id }}">
                                            {{ $technology->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="project-divider"></div>

                            <label for="summary" class="form-label project-label">
                                Summary
                            </label>

                            <textarea class="form-control project-input project-textarea" placeholder="Briefly describe your project" name="summary"
                                id="summary" required minlength="10" maxlength="1000" rows="5"> {{ $project->summary }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex mt-4 gap-2">
                        <a href="{{ route('projects.index') }}" class="btn btn-back">
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
