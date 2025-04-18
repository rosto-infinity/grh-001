@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <!-- En‑tête -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>
                        Historique des emplois 
                        <span class="bg-green-600 text-white rounded-full px-2">
                            {{ $emploiHistories->count() }}
                        </span>
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.emploi_histories.create') }}" class="btn btn-primary">
                        Ajouter un historique
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('_message')

    <!-- Tableau des historiques -->
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Liste des historiques</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Utilisateur</th>
                            <th>Emploi</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Créé le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($emploiHistories as $history)
                            <tr>
                                <td>{{ $history->id }}</td>
                                <td>{{ $history->user ? $history->user->name : '—' }}</td>
                                <td>{{ $history->emploi ? $history->emploi->emploi_title : '—' }}</td>
                                <td>{{ optional($history->start_date)->format('d/m/Y') ?? '—' }}</td>
                                <td>{{ optional($history->end_date)->format('d/m/Y') ?? '—' }}</td>
                                <td>{{ $history->created_at->translatedFormat('d/m/Y H\hi') }}</td>
                                <td>
                                    <a href="{{ route('admin.emploi_histories.show', $history->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.emploi_histories.edit', $history->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.emploi_histories.destroy', $history->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500">
                                    Aucun historique d’emploi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="py-3 px-4 float-right">
                    {{ $emploiHistories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
