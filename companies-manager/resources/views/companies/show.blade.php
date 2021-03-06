@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col">Empresa: <strong>{{$company->name}}</strong></div>
                            <div class="col-auto">
                                <a href="{{route('companies.edit', $company->id)}}" class="btn btn-primary text-white">
                                    Editar
                                </a>
                            </div>
                            <div class="col-auto">
                                <form action="{{route('companies.destroy', $company->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-white">Excluir</button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-center d-flex align-items-center justify-content-center">
                                <img src="{{$company->logo}}" width="150" class="logo-placeholder" />
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <b>Nome</b>
                                <p>{{$company->name}}</p>

                                <b>Email</b>
                                <p>{{$company->email}}</p>

                                <b>Website</b>
                                <p><a target="_blank" href="{{$company->website}}">{{$company->website}}</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="card-header border-top">Funcionários</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if($company->employees->count())
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>E-mail</th>
                                                <th>Telefone</th>
                                                <th>CPF</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($company->employees as $employee)
                                            <tr>
                                                <td>{{$employee->name}}</td>
                                                <td>{{$employee->email}}</td>
                                                <td>{{$employee->phone}}</td>
                                                <td>{{$employee->cpf}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('employees.show', $employee->id)}}" class="btn-sm btn-primary text-white text-decoration-none">Visualizar</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


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
        </div>
    </div>
@endsection
