@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-dark text-light">
                        Pagamentos de {{ Auth::user()->name }}
                        <p class="float-right text-light">{{ now()->format('d/m/Y  H:i:s')}}</p>

                    </div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-lg-12 mb-5">
                                <div class="pull-left">
                                    <h2>{{ $bill->title }}</h2>
                                    <h5>Descrição: {{ $bill->description }}</h5>
                                    <h5>Valor: R$ {{ number_format($bill->value, 2, ',', '.') }}</h5>
                                    <h5>Vencimento: {{ date("d/m/Y", strtotime($bill->expiry)) }}</h5>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('home') }}"><span><i class="fa fa-arrow-left"></i></span> Voltar</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
