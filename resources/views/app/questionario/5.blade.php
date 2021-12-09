@extends('layouts.site')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step6" name="nextStep">
                    <div class="form-group">
                        <p class="px-4 pb-4">Qual é seu peso (em quilogramas)?</p>
                        <input class="form-control input-largura-menor peso" id="peso" placeholder="Digite seu peso" name="peso" value="{{$consulta->peso}}">
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar" required>
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="https://unpkg.com/imask@4.1.4/dist/imask.js"></script>
<script>
    var numberMask = new IMask(document.getElementById("peso"), {
        mask: Number,
        thousandsSeparator: ".",
        radix: "." // fractional delimiter
    });

    let input = document.getElementById("peso");

    input.oninput = function() {
        console.log('input.value:', input.value);
        console.log('numberMask', numberMask);
        console.log('numberMask.value', numberMask.value);
        console.log('numberMask.typedValue', numberMask.typedValue);
        console.log('numberMask.unmaskedValue:', numberMask.unmaskedValue);
        console.log('--------');
    }
</script>
@endsection