@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 style="margin-bottom: 0;">
                                    Funcionários
                                </h2>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('employees.create')}}" class="btn btn-success text-white">
                                    Cadastrar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($employees->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>CPF</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$employee->company->name}}</td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>{{$employee->cpf}}</td>
                                            <td>
                                                <a href="{{route('employees.show', $employee->id)}}" class="btn-sm btn-primary text-white mr-1">Visualizar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{$employees->links()}}

                        @else

                            <div class="d-flex flex-column p-5 align-items-center justify-content-center">
                                <p>Nenhum funcionário cadastrado!</p>
                                <a href="{{route('employees.create')}}" class="btn btn-success text-white">
                                    Cadastrar
                                </a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
