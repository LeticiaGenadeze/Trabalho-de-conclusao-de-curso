<div class="page-heading">
    <h2>Consulta Número - {{$consulta->id}}</h2>
</div>

<div>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nome</th>
                <td>{{$consulta->nome}}</td>
            </tr>
            <tr>
                <th scope="row">Data de Nascimento</th>
                <td>{{ \Carbon\Carbon::parse($consulta->dataDeNascimento)->format('d/m/Y')}}</td>
            </tr>
            <tr>
                <th scope="row">Idade</th>
                <td>{{$idade}}</td>
            </tr>
            <tr>
                <th scope="row">Peso</th>
                <td>{{$consulta->peso}}</td>
            </tr>
            <tr>
                <th scope="row">Altura</th>
                <td>{{$consulta->altura}}</td>
            </tr>
            <tr>
                <th scope="row">IMC</th>
                <td>{{$imc}}</td>
            </tr>
            <tr>
                <th scope="row">Sexo</th>
                <td>{{$consulta->sexo}}</td>
            </tr>
            <tr>
                <th scope="row">Gravidez e/ou Amamentação</th>
                <td>{{$consulta->gravidezAmamentacao}}</td>
            </tr>
            <tr>
                <th scope="row">Intolerância Alimentar</th>
                <td>{{$consulta->intoleranciaAlimentar}}</td>
            </tr>
            <tr>
                <th scope="row">Dor Inflamatória</th>
                <td>{{$consulta->dorInflamatoria}}</td>
            </tr>
            <tr>
                <th scope="row">Tempo de Dor Crônica</th>
                <td>{{$consulta->tempoDorCronica}}</td>
            </tr>
            <tr>
                <th scope="row">Hábitos Alimentares</th>
                <td>{{$consulta->habitosAlimentares}}</td>
            </tr>
            <tr>
                <th scope="row">Consumo de Água</th>
                <td>{{$consulta->consumoDeAgua}}</td>
            </tr>
            <tr>
                <th scope="row">Exercícios Físicos</th>
                <td>{{$consulta->praticaExercicioFisico}}</td>
            </tr>
            <tr>
                <th scope="row">Faz uso de algum medicamento</th>
                <td>{{$consulta->usoDeMedicamento}}</td>
            </tr>
            <tr>
                <th scope="row">Consumo de Chá</th>
                <td>{{$consulta->consumoDeCha}}</td>
            </tr>
            <tr>
                <th scope="row">Preparo e Sabor do Chá</th>
                <td>{{$consulta->fatoresDoCha}}</td>
            </tr>
            <tr>
                <th scope="row">Sintomas</th>
                <td>
                    @forelse($sintomas as $sintoma)
                    {{$sintoma->sintoma->name}} <br>
                    @empty
                    Nenhum sintoma selecionado.
                    @endforelse
                </td>
            </tr>
            <tr>
                <th scope="row">Composição do Blend de Chás</th>
                <td> @forelse($blends as $blend)
                    {{$blend->cha->name}} <br>
                    @empty
                    Nenhum Blend selecionado.
                    @endforelse
                </td>
            </tr>
        </tbody>
    </table>
</div>

<style>
    .page-heading{
        color: #333;
    }

    .page-heading h2{
        text-align: center;
    }  

    .table {
        width: 100%;
        color: #333;
    
    }

    .table th {
        text-align: left;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px 20px;
    }
</style>