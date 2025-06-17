<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Armários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --success: #2ecc71;
            --danger: #e74c3c;
            --warning: #f39c12;
            --light: #ecf0f1;
            --dark: #34495e;
            --text: #2c3e50;
            --bg: #f8f9fa;
            --card-bg: #ffffff;
            --shadow: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: linear-gradient(135deg, var(--primary), var(--dark));
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo i {
            font-size: 2.2rem;
            color: var(--light);
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            color: white;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 25px;
            margin-top: 25px;
        }

        .sidebar {
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 5px 15px var(--shadow);
            padding: 25px;
            height: fit-content;
        }

        .sidebar h2 {
            font-size: 1.4rem;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .blocos-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .bloco-card {
            background: var(--light);
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .bloco-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-color: var(--secondary);
        }

        .bloco-card.active {
            border-color: var(--secondary);
            background: rgba(52, 152, 219, 0.1);
        }

        .bloco-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .bloco-title {
            font-size: 1.3rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bloco-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .bloco-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 12px;
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #7f8c8d;
        }

        .main-content {
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 5px 15px var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .content-title {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .content-title i {
            color: var(--secondary);
        }

        .lados-container {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .lado-btn {
            padding: 12px 25px;
            background: var(--light);
            border: 2px solid transparent;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .lado-btn:hover {
            background: rgba(52, 152, 219, 0.1);
        }

        .lado-btn.active {
            background: rgba(52, 152, 219, 0.2);
            border-color: var(--secondary);
            color: var(--secondary);
        }

        .armarios-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .fileira {
            background: var(--light);
            border-radius: 15px;
            padding: 20px;
        }

        .fileira-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        }

        .fileira-header i {
            color: var(--secondary);
            font-size: 1.2rem;
        }

        .fileira-title {
            font-size: 1.4rem;
            font-weight: 700;
        }

        .armarios-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .coluna {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .armario {
            height: 100px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .armario:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: rgba(0, 0, 0, 0.1);
        }

        .armario.disponivel {
            background: linear-gradient(to bottom, var(--success), #27ae60);
            color: white;
        }

        .armario.ocupado {
            background: linear-gradient(to bottom, var(--danger), #c0392b);
            color: white;
        }

        .armario:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .armario-id {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .armario-status {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .armario-altura {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.2);
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .action-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .action-modal.active {
            opacity: 1;
            pointer-events: all;
        }

        .modal-content {
            background: white;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            padding: 30px;
            transform: translateY(20px);
            transition: transform 0.4s ease;
        }

        .action-modal.active .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #7f8c8d;
            transition: color 0.3s;
        }

        .close-modal:hover {
            color: var(--danger);
        }

        .modal-body {
            margin-bottom: 30px;
        }

        .armario-info {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-bottom: 25px;
        }

        .armario-preview {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
        }

        .armario-details {
            flex: 1;
        }

        .detail-row {
            display: flex;
            margin-bottom: 8px;
        }

        .detail-label {
            width: 120px;
            font-weight: 600;
            color: #7f8c8d;
        }

        .detail-value {
            flex: 1;
            font-weight: 500;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: var(--secondary);
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-secondary {
            background: var(--light);
            color: var(--text);
        }

        .btn-secondary:hover {
            background: #d5dbdb;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .status-summary {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid var(--light);
        }

        .status-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-indicator {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        .status-disponivel {
            background: var(--success);
        }

        .status-ocupado {
            background: var(--danger);
        }

        .status-label {
            font-size: 0.9rem;
        }

        @media (max-width: 992px) {
            .dashboard {
                grid-template-columns: 1fr;
            }

            .armarios-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .armarios-grid {
                grid-template-columns: 1fr;
            }

            .modal-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <div class="logo">
            <i class="fas fa-lock"></i>
            <h1>Sistema de Armários</h1>
        </div>
        <div class="user-info">
            <div class="user-avatar">AD</div>
            <div>
                <div class="user-name">Admin</div>
                <div class="user-role">Administrador</div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="dashboard">
        <div class="sidebar">
            <h2><i class="fas fa-building"></i> Blocos</h2>
            <div class="blocos-container">
                <div class="bloco-card active" data-bloco="D">
                    <div class="bloco-header">
                        <div class="bloco-title">
                            <div class="bloco-icon">D</div>
                            Bloco D
                        </div>
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="bloco-stats">
                        <div class="stat-card">
                            <div class="stat-value">80</div>
                            <div class="stat-label">Disponíveis</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">80</div>
                            <div class="stat-label">Ocupados</div>
                        </div>
                    </div>
                </div>

                <div class="bloco-card" data-bloco="B">
                    <div class="bloco-header">
                        <div class="bloco-title">
                            <div class="bloco-icon">B</div>
                            Bloco B
                        </div>
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="bloco-stats">
                        <div class="stat-card">
                            <div class="stat-value">40</div>
                            <div class="stat-label">Disponíveis</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">20</div>
                            <div class="stat-label">Ocupados</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="content-header">
                <div class="content-title">
                    <i class="fas fa-th-large"></i>
                    Armários do Bloco D
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

            <div class="lados-container">
                <div class="lado-btn active" data-lado="1">Lado 1</div>
                <div class="lado-btn" data-lado="2">Lado 2</div>
            </div>

            <div class="armarios-container">
                <div class="fileira">
                    <div class="fileira-header">
                        <i class="fas fa-layer-group"></i>
                        <div class="fileira-title">Fileira 1</div>
                    </div>
                    <div class="armarios-grid">
                        <div class="coluna">
                            @foreach($armarios as $armario)
                                <div class="armario {{ $armario->status === 'disponível' ? 'disponivel' : 'ocupado' }}" data-id="{{ $armario->id }}">
                                    <div class="armario-id">{{ $armario->id }}</div>
                                    <div class="armario-status">{{ ucfirst($armario->status) }}</div>
                                    <div class="armario-altura"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="action-modal" id="armarioModal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title" id="modalTitle">Gerenciar Armário</div>
            <button class="close-modal" id="closeModal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="armario-info">
                <div class="armario-preview" id="armarioPreview">
                    <div class="armario-id" id="previewId">D1-1-1</div>
                    <div class="armario-status" id="previewStatus">Disponível</div>
                </div>
                <div class="armario-details">
                    <div class="detail-row">
                        <div class="detail-label">Bloco:</div>
                        <div class="detail-value" id="detailBloco">D</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Lado:</div>
                        <div class="detail-value" id="detailLado">1</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Fileira:</div>
                        <div class="detail-value" id="detailFileira">1</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Coluna:</div>
                        <div class="detail-value" id="detailColuna">1</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Altura:</div>
                        <div class="detail-value" id="detailAltura">1</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Status:</div>
                        <div class="detail-value" id="detailStatus">Disponível</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-actions" id="modalActions">
            <!-- Buttons will be inserted here by JavaScript -->
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.bloco-card').forEach(card => {
        card.addEventListener('click', function () {
            // Remove classe "active" de todos os blocos
            document.querySelectorAll('.bloco-card').forEach(c => c.classList.remove('active'));
            // Adiciona classe "active" no clicado
            this.classList.add('active');

            // Descobre o ID do setor com base no bloco clicado
            const bloco = this.getAttribute('data-bloco');
            let setor_id = null;

            // Mapeamento manual: ajuste conforme seu banco
            if (bloco === 'D') setor_id = 1;
            if (bloco === 'B') setor_id = 2;
            if (bloco === 'C') setor_id = 3;

            if (!setor_id) return;

            // Busca os armários do setor via AJAX (fetch)
            fetch(`/armarios/por-setor/${setor_id}`)
                .then(res => res.json())
                .then(data => {
                    const coluna = document.querySelector('.coluna');
                    coluna.innerHTML = ''; // limpa armários

                    if (!data.length) {
                        coluna.innerHTML = '<p>Nenhum armário encontrado.</p>';
                        return;
                    }

                    // Reinsere os armários
                    data.forEach(armario => {
                        const div = document.createElement('div');
                        div.classList.add('armario');
                        div.classList.add(armario.status === 'disponível' ? 'disponivel' : 'ocupado');
                        div.dataset.id = armario.id;
                        div.innerHTML = `
                            <div class="armario-id">${armario.numero}</div>
                            <div class="armario-status">${armario.status}</div>
                            <div class="armario-altura"></div>
                        `;
                        coluna.appendChild(div);
                    });
                });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        // Elementos da interface
        const blocoCards = document.querySelectorAll('.bloco-card');
        const ladoBtns = document.querySelectorAll('.lado-btn');
        const armarios = document.querySelectorAll('.armario');
        const modal = document.getElementById('armarioModal');
        const closeModal = document.getElementById('closeModal');
        const modalActions = document.getElementById('modalActions');
        const armarioPreview = document.getElementById('armarioPreview');

        // Eventos para trocar de bloco
        blocoCards.forEach(card => {
            card.addEventListener('click', function () {
                const bloco = this.dataset.bloco;

                // Atualizar card ativo
                blocoCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                // Atualizar título do bloco
                document.querySelector('.content-title').innerHTML = `
                        <i class="fas fa-th-large"></i>
                        Armários do Bloco ${bloco}
                    `;

                // Aqui você faria uma requisição para carregar os armários do bloco selecionado
                console.log(`Carregar armários do Bloco ${bloco}`);
            });
        });

        // Eventos para trocar de lado
        ladoBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const lado = this.dataset.lado;

                // Atualizar botão ativo
                ladoBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Aqui você faria uma requisição para carregar os armários do lado selecionado
                console.log(`Carregar armários do Lado ${lado}`);
            });
        });

        // Eventos para clicar em um armário
        armarios.forEach(armario => {
            armario.addEventListener('click', function () {
                const status = this.classList.contains('disponivel') ? 'disponivel' : 'ocupado';
                const id = this.dataset.id;

                // Atualizar preview do armário
                document.getElementById('previewId').textContent = this.querySelector('.armario-id').textContent;
                document.getElementById('previewStatus').textContent = this.querySelector('.armario-status').textContent;

                // Atualizar detalhes
                document.getElementById('detailBloco').textContent = 'D';
                document.getElementById('detailLado').textContent = '1';
                document.getElementById('detailFileira').textContent = this.closest('.fileira') ?
                    this.closest('.fileira').querySelector('.fileira-title').textContent.replace('Fileira ', '') : '1';
                document.getElementById('detailColuna').textContent = Array.from(this.parentNode.parentNode.children).indexOf(this.parentNode) + 1;
                document.getElementById('detailAltura').textContent = this.querySelector('.armario-altura').textContent;
                document.getElementById('detailStatus').textContent = status === 'disponivel' ? 'Disponível' : 'Ocupado';

                // Atualizar visual do preview
                armarioPreview.className = 'armario-preview';
                armarioPreview.classList.add(status);

                // Criar botões de ação baseados no status
                modalActions.innerHTML = '';

                if (status === 'disponivel') {
                    const ocuparBtn = document.createElement('button');
                    ocuparBtn.className = 'btn btn-primary';
                    ocuparBtn.innerHTML = '<i class="fas fa-lock"></i> Ocupar Armário';
                    ocuparBtn.addEventListener('click', function () {
                        // Aqui você chamaria a API para ocupar o armário
                        console.log(`Ocupar armário ${id}`);

                        // Atualizar status localmente
                        armario.classList.remove('disponivel');
                        armario.classList.add('ocupado');
                        armario.querySelector('.armario-status').textContent = 'Ocupado';

                        // Fechar modal
                        modal.classList.remove('active');
                    });
                    modalActions.appendChild(ocuparBtn);
                } else {
                    const liberarBtn = document.createElement('button');
                    liberarBtn.className = 'btn btn-danger';
                    liberarBtn.innerHTML = '<i class="fas fa-lock-open"></i> Liberar Armário';
                    liberarBtn.addEventListener('click', function () {
                        // Aqui você chamaria a API para liberar o armário
                        console.log(`Liberar armário ${id}`);

                        // Atualizar status localmente
                        armario.classList.remove('ocupado');
                        armario.classList.add('disponivel');
                        armario.querySelector('.armario-status').textContent = 'Disponível';

                        // Fechar modal
                        modal.classList.remove('active');
                    });
                    modalActions.appendChild(liberarBtn);
                }

                const cancelarBtn = document.createElement('button');
                cancelarBtn.className = 'btn btn-secondary';
                cancelarBtn.innerHTML = '<i class="fas fa-times"></i> Cancelar';
                cancelarBtn.addEventListener('click', function () {
                    modal.classList.remove('active');
                });
                modalActions.appendChild(cancelarBtn);

                // Mostrar modal
                modal.classList.add('active');
            });
        });

        // Fechar modal
        closeModal.addEventListener('click', function () {
            modal.classList.remove('active');
        });

        // Fechar modal ao clicar fora
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
    });

    const blocoCards = document.querySelectorAll('.bloco-card');
    const tituloBloco = document.getElementById('tituloBloco');

    blocoCards.forEach(card => {
        card.addEventListener('click', () => {
            const bloco = card.getAttribute('data-bloco');
            tituloBloco.textContent = `Armários do Bloco ${bloco}`;
        });
    });
</script>
</body>
</html>