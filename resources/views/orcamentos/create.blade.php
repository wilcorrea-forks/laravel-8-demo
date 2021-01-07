@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('orcamentos.store') }}"
        method="POST"
    >
        @csrf

        <div class="form-group">
            <strong>cliente:</strong>
            <input
                type="text"
                name="cliente"
                class="form-control"
            >
        </div>
        <div class="form-group">
            <strong>data:</strong>
            <input
                type="text"
                name="data"
                class="form-control"
            >
        </div>
        <div class="form-group">
            <strong>hora:</strong>
            <input
                type="text"
                name="hora"
                class="form-control"
            >
        </div>
        <div class="form-group">
            <strong>descricao:</strong>
            <input
                type="text"
                name="descricao"
                class="form-control"
            >
        </div>
        <div class="form-group">
            <strong>valor:</strong>
            <input
                type="text"
                name="valor"
                class="form-control"
            >
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection
