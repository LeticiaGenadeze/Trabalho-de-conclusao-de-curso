@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Cadastrar Característica</h3>
</div>


<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form class="form form-horizontal" action="{{route('admin.caracteristicas.store')}}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nome</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="name" placeholder="Nome" value="{{old('name')}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Descrição</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="description" placeholder="Descrição" value="{{old('description')}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Selecione o Tipo</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="type">
                                                <option value="beneficio">Benefício</option>
                                                <option value="maleficio">Malefício</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection