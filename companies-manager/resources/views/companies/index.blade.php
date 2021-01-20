@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col">Empresas</div>
                            <div class="col-auto">
                                <a href="{{route('companies.create')}}" class="btn btn-success text-white">
                                    Cadastrar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($companies->count())
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Site</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td><img src="{{$company->logo}}" width="150"></td>
                                            <td class="align-middle">{{$company->name}}</td>
                                            <td class="align-middle">{{$company->email}}</td>
                                            <td class="align-middle"><a target="_blank" href="{{$company->website}}">{{$company->website}}</a></td>
                                            <td class="align-middle text-center">
                                                <a href="{{route('companies.show', $company->id)}}" class="btn-sm btn-primary text-white text-decoration-none">Visualizar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{$companies->links()}}

                        @else

                            <div class="d-flex flex-column p-5 align-items-center justify-content-center">
                                <p>Nenhuma empresa cadastrada!</p>
                                <a href="{{route('companies.create')}}" class="btn btn-success text-white text-decoration-none">
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
