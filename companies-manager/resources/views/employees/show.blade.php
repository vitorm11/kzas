@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col">Funcionário: <b>{{$employee->name}}</b></div>
                            <div class="col-auto">
                                <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary text-white">
                                    Editar
                                </a>
                            </div>
                            <div class="col-auto">
                                <form action="{{route('employees.destroy', $employee->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-white">Excluir</button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <b>Empresa</b>
                                <p>{{$employee->company->name}}</p>

                                <b>Nome</b>
                                <p>{{$employee->name}}</p>

                                <b>E-mail</b>
                                <p>{{$employee->email}}</p>

                                <b>Celular</b>
                                <p>{{$employee->phone}}</p>

                                <b>CPF</b>
                                <p>{{$employee->cpf}}</p>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <b>CEP</b>
                                <p>{{$employee->address->zipCode}}</p>

                                <b>Endereço</b>
                                <p>{{$employee->address->address}}, {{$employee->address->number}} {{$employee->address->complement}}</p>

                                <b>Bairro</b>
                                <p>{{$employee->address->neighborhood}}</p>

                                <b>Cidade</b>
                                <p>{{$employee->address->city}}</p>

                                <b>State</b>
                                <p>{{$employee->address->state}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
