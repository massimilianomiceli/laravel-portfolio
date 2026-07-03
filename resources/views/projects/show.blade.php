@extends('layouts.admin')

@section('title')
    {{ $project->name }}
@endsection

@section('content')
    <div class="project-show container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fs-3 project-title mb-1">
                    {{ $project->name }}
                </h2>
                <p class="project-subtitle mb-0">
                    Dettaglio progetto #{{ $project->id }}
                </p>
            </div>

            <a href="{{ route('projects.index') }}" class="btn btn-outline-custom">
                Go back
            </a>
        </div>

        <div class="card project-card">
            <div class="project-card-header">
                <h5 class="mb-0">
                    Project information
                </h5>
            </div>

            <div class="card-body p-4">

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Name
                        </div>
                        <p class="project-value mb-0">
                            {{ $project->name }}
                        </p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Customer
                        </div>
                        <p class="project-value mb-0">
                            {{ $project->customer }}
                        </p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Start date
                        </div>
                        <p class="project-value mb-0">
                            {{ $project->period_start }}
                        </p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            End date
                        </div>
                        <p class="project-value mb-0">
                            {{ $project->period_end }}
                        </p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="mb-4">
                    <div class="project-label mb-2">
                        Summary
                    </div>

                    <div class="project-summary">
                        <p class="mb-0">
                            {{ $project->summary }}
                        </p>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('projects.index') }}" class="btn btn-back">
                        Go back
                    </a>

                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-edit-custom">
                        Edit
                    </a>
                </div>

            </div>
        </div>

    </div>
@endsection
