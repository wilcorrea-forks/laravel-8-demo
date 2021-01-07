@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="pull-right">
                <a
                    class="btn btn-success"
                    href="{{ route('orcamentos.create') }}"
                    title="Create a orcamento"
                ><i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Cliente</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Descricao</th>
            <th>Valor</th>
            <th>Data de Registro</th>
            <th width="280px">Ações</th>
        </tr>

        @foreach ($orcamentos as $orcamento)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $orcamento->cliente }}</td>
                <td>{{ $orcamento->data }}</td>
                <td>{{ $orcamento->hora }}</td>
                <td>{{ $orcamento->descricao }}</td>
                <td>{{ $orcamento->valor }}</td>
                <td>{{ date_format($orcamento->created_at, 'jS M Y') }}</td>
                <td>
                    <form
                        action="{{ route('orcamentos.destroy', $orcamento->id) }}"
                        method="POST"
                    >
                        <a
                            href="{{ route('orcamentos.show', $orcamento->id) }}"
                            title="show"
                        >
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('orcamentos.edit', $orcamento->id) }}">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            title="delete"
                            style="border: none; background-color:transparent;"
                        >
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $orcamentos->links() !!}

@endsection
