@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Chá {{$cha->name}}</h3>
</div>

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

<div class="row">
    <div class="col-md-6">
        <h3>Todas as Características</h3>
        <ul class="list-group">
            @forelse($caracteristicas as $caracteristica)
            <li class="list-group-item">
                Nome: {{$caracteristica->name}}
                <form class="form form-horizontal me-1" action="{{route('admin.chas.addCaracteristica', $cha->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="caracteristicaId" value="{{$caracteristica->id}}">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus"></i>
                    </button>
                </form>
            </li>
            @empty
            Nenhuma caracteristica desvinculada a este chá!
            @endforelse
        </ul>
    </div>
    <div class="col-md-6">
        <h3>Características deste Chá</h3>
        <ul class="list-group">
            @forelse($chaCaracteristicas as $chaCaracteristica)
            <li class="list-group-item">
                Nome: {{$chaCaracteristica->caracteristica->name}}
                <form class="form form-horizontal me-1" action="{{route('admin.chas.deletarCaracteristica', $chaCaracteristica->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                    <i class="bi bi-dash"></i>
                    </button>
                </form>
            </li>
            @empty
            Nenhuma caracteristica desvinculada a este chá!
            @endforelse


        </ul>
    </div>
</div>




@endsection