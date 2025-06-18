<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Armários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css'])
    @vite(['resources/css/armarios/armario.css'])
</head>
<body>
<header>
    <div class="header-content">
        <div class="logo">
            <i class="fas fa-lock"></i>
            <h1>Sistema de Armários</h1>
        </div>
        <div class="user-info">
            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <div class="user-name">{{ Auth::user()->name }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
        </div>
    </div>
</header>

<div class="container">
    <div class="dashboard">
        <div class="sidebar">
            <h2><i class="fas fa-building"></i> Setores</h2>
            <div class="blocos-container">
                @foreach($setores as $setor)
                    <a href="{{ route('armarios.por-setor', $setor->id) }}"
                       class="bloco-card {{ $setorAtivo == $setor->id ? 'active' : '' }}">
                        <div class="bloco-header">
                            <div class="bloco-title">
                                {{ $setor->nome }}
                            </div>
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="bloco-stats">
                            <div class="stat-card">
                                <div class="stat-value">{{ $setor->armarios_disponiveis }}</div>
                                <div class="stat-label">Disponíveis</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-value">{{ $setor->armarios_ocupados }}</div>
                                <div class="stat-label">Ocupados</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="main-content">
            <div class="content-header">
                <div class="content-title">
                    <i class="fas fa-th-large"></i>
                    Armários do {{ $setorAtual->nome }}
                </div>
                <div class="status-summary">
                    <div class="status-item">
                        <div class="status-indicator status-disponivel"></div>
                        <div class="status-label">Disponível</div>
                    </div>
                    <div class="status-item">
                        <div class="status-indicator status-ocupado"></div>
                        <div class="status-label">Ocupado</div>
                    </div>
                </div>
            </div>

            <div class="armarios-grid">
                @forelse($armarios as $armario)
                    <div class="armario {{ $armario->status === 'disponível' ? 'disponivel' : 'ocupado' }}">
                        <div class="armario-id">{{ $armario->numero }}</div>
                        <div class="armario-status">{{ ucfirst($armario->status) }}</div>

                        <!-- Botão para abrir modal (não altera status diretamente) -->
                        <a href="{{ route('armarios.show', $armario->id) }}" class="btn btn-action">
                            <i class="fas fa-ellipsis-h"></i> Detalhes
                        </a>
                    </div>
                @empty
                    <div class="empty-message">
                        <i class="fas fa-info-circle"></i>
                        Nenhum armário encontrado para o Setor {{ $setorAtual->letra }}
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Modal de detalhes simplificado -->
@if(isset($armarioDetalhado))
    <div class="action-modal active" id="armarioModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Gerenciar Armário {{ $armarioDetalhado->numero }}</div>
                <a href="{{ route('armarios.por-setor', $setorAtivo) }}" class="close-modal">&times;</a>
            </div>
            <div class="modal-body">
                <div class="armario-info">
                    <div
                        class="armario-preview {{ $armarioDetalhado->status === 'disponível' ? 'disponivel' : 'ocupado' }}">
                        <div class="armario-id">{{ $armarioDetalhado->numero }}</div>
                        <div class="armario-status">{{ ucfirst($armarioDetalhado->status) }}</div>
                    </div>
                    <div class="armario-details">
                        <div class="detail-row">
                            <div class="detail-label">Setor:</div>
                            <div class="detail-value">{{ $armarioDetalhado->setor->letra }}
                                - {{ $armarioDetalhado->setor->nome }}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Número:</div>
                            <div class="detail-value">{{ $armarioDetalhado->numero }}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Status:</div>
                            <div class="detail-value status-text">
                                {{ ucfirst($armarioDetalhado->status) }}
                                <span
                                    class="status-indicator {{ $armarioDetalhado->status === 'disponível' ? 'status-disponivel' : 'status-ocupado' }}"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form class="modal-actions" method="POST" action="{{ route('armarios.alterar-status', $armarioDetalhado->id) }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="novo_status"
                           value="{{ $armarioDetalhado->status === 'disponível' ? 'ocupado' : 'disponível' }}">

                    @if($armarioDetalhado->status === 'disponível')
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-lock"></i> Ocupar Armário
                        </button>
                    @else
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-lock-open"></i> Liberar Armário
                        </button>
                    @endif

                    <a href="{{ route('armarios.por-setor', $setorAtivo) }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Fechar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endif
</body>
</html>
