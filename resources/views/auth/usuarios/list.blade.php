@extends('layouts.app')



@section('content')
    <div class="row justify-content-center">
      
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0"> <h1>Lista dos usuarios</h1></div> 
                    <a  href="{{ url('usuarios/new') }}" class="btn btn-primary " role="button" aria-pressed="true">Novo usuário</a>                
                 
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">Data Nascimento</th>
                          <th scope="col">Data Criação</th>
                          <th scope="col">Ação</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                    @foreach( $usuarios as $u )

                        <tr>
                          <th scope="row">{{ $u->id }}</th>
                          <td>{{ $u->name }}</td>
                          <td>{{ $u->email }}</td>
                          <td>{{ $u->date }}</td>
                          <td>{{ $u->created_at }}</td>
                          <td><a href="usuarios/{{ $u->id }}/edit" class="btn btn-info">Editar</a>
                          <form action="usuarios/delete/{{ $u->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="delet()">Deletar</button>
                            </form>
                          </td>
                        </tr>

                    @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


    <script>
function delet() {
  alert("Tem certeza que deseja excluir esse usuario?!");
}
    </script>

