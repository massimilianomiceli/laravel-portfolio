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
                Torna ai progetti
            </a>
        </div>

        <div class="card project-card">
            <div class="project-card-header">
                <h5 class="mb-0">
                    Informazioni progetto
                </h5>
            </div>

            <div class="card-body p-4">

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Nome progetto
                        </div>
                        <p class="project-value mb-0">
                            {{ $project->name }}
                        </p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Cliente
                        </div>
                        <p class="project-value mb-0">
                            {{ $project->customer }}
                        </p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Data inizio
                        </div>
                        <p class="project-value mb-0">
                            {{ $project->period_start }}
                        </p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="project-label mb-2">
                            Data fine
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
                        @if ($project->summary)
                            <p class="mb-0">
                                {{ $project->summary }}
                            </p>
                        @else
                            <p class="text-muted mb-0">
                                Nessun summary disponibile.
                            </p>
                        @endif
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('projects.index') }}" class="btn btn-back">
                        Indietro
                    </a>

                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-edit-custom">
                        Modifica
                    </a>
                </div>

            </div>
        </div>

    </div>
@endsection
