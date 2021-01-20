@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Funcionário: <b>{{$employee->name}}</b></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <form action="{{route('employees.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Empresa</label>
                                                <select name="company_id" class="form-control @error('option') is-invalid @enderror" required>
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
                                                <input type="text" value="{{old('name', optional($employee)->name)}}" class="form-control @error('name') is-invalid @enderror" name="name" required>
                                                @if($errors->has('name'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('name')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" value="{{old('email', optional($employee)->email)}}" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                                @if($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('email')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Celular</label>
                                                <input type="text" value="{{old('phone', optional($employee)->phone)}}" class="form-control @error('phone') is-invalid @enderror" name="phone" required>
                                                @if($errors->has('phone'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('phone')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>CPF</label>
                                                <input type="text" value="{{old('cpf', optional($employee)->cpf)}}" class="form-control @error('cpf') is-invalid @enderror" name="cpf" required>
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
                                                <input type="text" value="{{old('zipCode', optional($employee->address)->zipCode)}}" class="form-control @error('zipCode') is-invalid @enderror" name="zipCode" required>
                                                @if($errors->has('zipCode'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('zipCode')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input type="text" value="{{old('address', optional($employee->address)->address)}}" class="form-control @error('address') is-invalid @enderror" name="address" required>
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
                                                        <input type="text" value="{{old('number', optional($employee->address)->number)}}" class="form-control @error('number') is-invalid @enderror" name="number" required>
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
                                                        <input type="text" value="{{old('complement', optional($employee->address)->complement)}}" class="form-control" name="complement">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" value="{{old('neighborhood', optional($employee->address)->neighborhood)}}" class="form-control @error('neighborhood') is-invalid @enderror" name="neighborhood" required>
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
                                                        <input type="text" value="{{old('city', optional($employee->address)->city)}}" class="form-control @error('city') is-invalid @enderror" name="city">
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
                                                        <input type="text" value="{{old('state', optional($employee->address)->state)}}" class="form-control @error('state') is-invalid @enderror" name="state">
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
