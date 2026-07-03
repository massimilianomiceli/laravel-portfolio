@extends('layouts.admin')

@section('title')
    Add a project
@endsection

@section('content')
    <div class="project-create container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="project-title mb-1">
                    Add a project
                </h2>

                <p class="project-subtitle mb-0">
                    Create a new project
                </p>
            </div>

            <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">
                Torna ai progetti
            </a>
        </div>

        <div class="project-card">
            <div class="project-card-header">
                Informazioni progetto
            </div>

            <div class="project-card-body">
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label project-label">
                                Name
                            </label>

                            <input type="text" class="form-control project-input" name="name" id="name">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="customer" class="form-label project-label">
                                Customer
                            </label>

                            <input type="text" class="form-control project-input" name="customer" id="customer">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="period_start" class="form-label project-label">
                                Start date
                            </label>

                            <input type="date" class="form-control project-input" name="period_start" id="period_start">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="period_end" class="form-label project-label">
                                End date
                            </label>

                            <input type="date" class="form-control project-input" name="period_end" id="period_end">
                        </div>

                        <div class="col-12">
                            <div class="project-divider"></div>

                            <label for="summary" class="form-label project-label">
                                Summary
                            </label>

                            <textarea class="form-control project-input project-textarea" placeholder="Briefly describe your project" name="summary"
                                id="summary"></textarea>
                        </div>
                    </div>

                    <div class="d-flex mt-4 gap-2">
                        <a href="{{ route('projects.index') }}" class="btn btn-back">
                            Indietro
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
