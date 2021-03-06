@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Editar Chá</h3>
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

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form class="form form-horizontal" action="{{route('admin.chas.update', $cha->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nome</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="name" placeholder="Nome" value="{{old('name',  $cha->name)}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nome Científico</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="nomeCientifico" placeholder="Nome Científico" value="{{old('nomeCientifico',  $cha->nomeCientifico)}}">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label>Descrição</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="description" placeholder="Descrição" value="{{old('description',  $cha->description)}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Imagem do Chá</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" name="cover" type="file" id="formFile">
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Salvar</button>
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