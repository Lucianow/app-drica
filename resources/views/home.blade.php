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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                    <div class="card-deck">
                        <div class="card border-dark mb-3" style="max-width: 24rem;">
                            <div class="card-body text-dark">
                                <h5 class="card-text">Nome: {{ Auth::user()->name }}</h5>
                                <h5 class="card-text">E-mail: {{ Auth::user()->email }}</h5>
                            </div>

                        </div>

                        <div class="card border-dark mb-3" >
                            <div class="card-body text-dark">
                                <form class="form-inline" method="get" action="{{ route('word') }}">
                                    @csrf
                                    <input class="form-control form-control-lg" type="text" name="search" placeholder="Encontrar Pagamento">
                                    <button type="submit" class="btn btn-lg btn-outline-dark ml-1" style="width: 50px" title="Encontrar Pagamento"><span><i class="fa fa-search"></i></span></button>

                                    <a class="btn btn-outline-danger btn-lg ml-4" href="{{ route('today') }}" title="Pagamento para Hoje"> <span><i class="fa fa-calendar"></i></span>&nbsp Hoje</a>
                                    <a class="btn btn-outline-dark btn-lg ml-4" href="{{ route('bills.create') }}" title="Incluir Pagamento"> <span><i class="fa fa-plus"></i></span>&nbspIncluir</a>

                                </form>
                            </div>
                        </div>
                    </div>

                        <table class="table table-striped table-dark">
                            <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Resumo</th>
                                <th scope="col" class="text-right">Valor R$</th>
                                <th scope="col">Vencimento</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $bill->title }}</td>
                                    <td>{{ $bill->description }}</td>
                                    <td class="text-right">{{ number_format($bill->value, 2, ',', '.') }}</td>
                                    <td>{{ date("d/m/Y", strtotime($bill->expiry)) }}</td>
                                    <td>

                                        <form action="{{ route('bills.destroy', $bill->id) }}" method="POST">
                                            <a class="btn btn-sm btn-info" href="{{ route('bills.show', $bill->id) }}" title="Exibir Pagamento"><span><i class="fa fa-eye"></i></span></a>
                                            <a class="btn btn-sm btn-info" href="{{route('bills.edit', $bill->id)}}" title="Editar Pagamento"><span><i class="fa fa-edit"></i></span></a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger float-right" title="Excluir Pagamento"><span><i class="fa fa-trash"></i></span></button>
                                        </form>

                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                        {!! $bills->links() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
