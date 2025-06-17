@foreach($alunos as $aluno)
    <hr>
    <h1 class="bg-blue-500 text-white p-4 rounded" >{{ $aluno->nome_aluno }}</h1>
    <p>{{ $aluno->telefone_aluno }}</p>
    <p>{{ $aluno->turma_aluno }}</p>
    <hr>
@endforeach
