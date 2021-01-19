@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="margin-bottom: 0;">Funcionário: {{$employee->name}}</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <form action="{{route('employees.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Empresa</label>
                                                <select name="company_id" class="form-control {{$errors->has('company_id') ? 'is-invalid' : ''}} {{!is_null(old('company_id')) && !$errors->has('company_id') ? 'is-valid' : ''}}">
                                                    <option value="">Selecione uma empresa</option>
                                                    @foreach($companies as $company)
                                                        <option {{$company->id == $employee->company->id ? 'selected' : ''}} value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
                                                </select>

                                                @if($errors->has('company_id'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('company_id')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" value="{{is_null(old('name')) ? $employee->name : old('name')}}" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} {{!is_null(old('name')) && !$errors->has('name') ? 'is-valid' : ''}}" name="name">
                                                @if($errors->has('name'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('name')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" value="{{is_null(old('email')) ? $employee->email : old('email')}}" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}} {{!is_null(old('email')) && !$errors->has('email') ? 'is-valid' : ''}}" name="email">
                                                @if($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('email')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Celular</label>
                                                <input type="text" value="{{is_null(old('phone')) ? $employee->phone : old('phone')}}" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}} {{!is_null(old('phone')) && !$errors->has('phone') ? 'is-valid' : ''}}" name="phone">
                                                @if($errors->has('phone'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('phone')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>CPF</label>
                                                <input type="text" value="{{is_null(old('cpf')) ? $employee->cpf : old('cpf')}}" class="form-control {{$errors->has('cpf') ? 'is-invalid' : ''}} {{!is_null(old('cpf')) && !$errors->has('cpf') ? 'is-valid' : ''}}" name="cpf">
                                                @if($errors->has('cpf'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('cpf')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text" value="{{is_null(old('zipCode')) ? $employee->address->zipCode : old('zipCode')}}" class="form-control {{$errors->has('zipCode') ? 'is-invalid' : ''}} {{!is_null(old('zipCode')) && !$errors->has('zipCode') ? 'is-valid' : ''}}" name="zipCode">
                                                @if($errors->has('zipCode'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('zipCode')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input type="text" value="{{is_null(old('address')) ? $employee->address->address : old('address')}}" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}} {{!is_null(old('address')) && !$errors->has('address') ? 'is-valid' : ''}}" name="address">
                                                @if($errors->has('address'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('address')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Número</label>
                                                        <input type="text" value="{{is_null(old('number')) ? $employee->address->number : old('number')}}" class="form-control {{$errors->has('number') ? 'is-invalid' : ''}} {{!is_null(old('number')) && !$errors->has('number') ? 'is-valid' : ''}}" name="number">
                                                        @if($errors->has('number'))
                                                            <div class="invalid-feedback">
                                                                {{$errors->first('number')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Complemento</label>
                                                        <input type="text" value="{{is_null(old('complement')) ? $employee->address->complement : old('complement')}}"class="form-control" name="complement">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" value="{{is_null(old('neighborhood')) ? $employee->address->neighborhood : old('neighborhood')}}" class="form-control {{$errors->has('neighborhood') ? 'is-invalid' : ''}} {{!is_null(old('neighborhood')) && !$errors->has('neighborhood') ? 'is-valid' : ''}}" name="neighborhood">
                                                @if($errors->has('neighborhood'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('neighborhood')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Cidade</label>
                                                        <input type="text" value="{{is_null(old('city')) ? $employee->address->city : old('city')}}"class="form-control {{$errors->has('city') ? 'is-invalid' : ''}} {{!is_null(old('city')) && !$errors->has('city') ? 'is-valid' : ''}}" name="city">
                                                        @if($errors->has('city'))
                                                            <div class="invalid-feedback">
                                                                {{$errors->first('city')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Estado</label>
                                                        <input type="text" value="{{is_null(old('state')) ? $employee->address->state : old('state')}}" class="form-control {{$errors->has('state') ? 'is-invalid' : ''}} {{!is_null(old('state')) && !$errors->has('state') ? 'is-valid' : ''}}" name="state">
                                                        @if($errors->has('state'))
                                                            <div class="invalid-feedback">
                                                                {{$errors->first('state')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block">
                                        Atualizar
                                    </button>

                                    <input type="hidden" name="_method" value="PUT">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
      $(document).ready(function($) {
        $('input[name="phone"]').mask('(99) 99999-9999');
        $('input[name="cpf"]').mask('999.999.999-99');
        $('input[name="zipCode"]').mask('99999-999');

        $('input[name="zipCode"]').on('keyup', function(){
          console.log('aqui', this.value)
          if (this.value.length === 9) {
            $.get( "https://viacep.com.br/ws/"+this.value+"/json/", function( data ) {
              $('input[name="address"]').val(data.logradouro);
              $('input[name="neighborhood"]').val(data.bairro);
              $('input[name="city"]').val(data.localidade);
              $('input[name="state"]').val(data.uf);
            });
          }
        })
      });
    </script>
@endsection
