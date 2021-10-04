@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-6 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Clientes</h6>
                                <h6 class="font-extrabold mb-0">{{$clientes}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="bi bi-cup"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Chás</h6>
                                <h6 class="font-extrabold mb-0">{{$chasCadastrados}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="bi bi-card-checklist"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Consultas Efetivadas</h6>
                                <h6 class="font-extrabold mb-0">{{$consultasEfetivadas}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="bi bi-card-list"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Consultas Pendentes</h6>
                                <h6 class="font-extrabold mb-0">{{$consultasPendentes}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4>Público</h4>
            </div>
            <div class="card-body">
                <div id="chart-visitors-profile"></div>
            </div>
        </div>
    </div>

</div>

<script>
    var masculino = JSON.parse("{{ json_encode($porcentagemMasculino) }}");
    var feminino = JSON.parse("{{ json_encode($porcentagemFeminino) }}");
    let optionsVisitorsProfile  = {
	series: [masculino, feminino],
	labels: ['Masculino', 'Feminino'],
	colors: ['#435ebe','#55c6e8'],
	chart: {
		type: 'donut',
		width: '100%',
		height:'350px'
	},
	legend: {
		position: 'bottom'
	},
	plotOptions: {
		pie: {
			donut: {
				size: '30%'
			}
		}
	}
}
</script>


@endsection