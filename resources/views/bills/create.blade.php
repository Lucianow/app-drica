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
                                        <h2>Incluir novo Pagamento</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('home') }}"><span><i class="fa fa-arrow-left"></i></span> Voltar</a>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('bills.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Título:</strong>
                                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Título">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Resumo:</strong>
                                            <input type="text" name="description" class="form-control" value="{{ old('description') }}" placeholder="Resumo">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Valor:</strong>
                                            <input type="text" name="value" class="form-control" value="{{ old('value') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Vencimento:</strong>
                                            <input type="date" name="expiry" class="form-control" value="{{ old('expiry') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary"><span><i class="fa fa-check"></i></span> Salvar</button>
                                    </div>
                                </div>
                            </form>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>Atenção!</strong> Encontramos inconsistência nos seguintes dados<br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
