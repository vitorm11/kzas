@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="margin-bottom: 0;">Empresas</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <br/>
                                                <input type="file" id="logoImage" name="logoImage" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" value="{{old('name')}}" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} {{!is_null(old('name')) && !$errors->has('name') ? 'is-valid' : ''}}" name="name">
                                                @if($errors->has('name'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('name')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" value="{{old('email')}}" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}} {{!is_null(old('email')) && !$errors->has('email') ? 'is-valid' : ''}}" name="email">
                                                @if($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('email')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="url" value="{{old('website')}}" class="form-control {{$errors->has('website') ? 'is-invalid' : ''}} {{!is_null(old('website')) && !$errors->has('website') ? 'is-valid' : ''}}" name="website">
                                                @if($errors->has('website'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('website')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block">
                                        Cadastrar
                                    </button>

                                    <input type="hidden" name="logo" id="logo" />
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
        $(document).ready(function() {
          $('#logoImage').change(function(e) {
            let fileName = $('#logo').attr('filename');
            if(fileName !== undefined) {
              $.ajax({
                url: 'http://localhost:3001',
                dataType: 'json',
                data: {fileName: fileName},
                type: 'post',
                success: function (response) {},
              });
            }

            var form_data = new FormData();
            form_data.append('logo', e.target.files[0]);

            $.ajax({
              url: 'http://localhost:3001',
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              type: 'post',
              success: function (response) {
                $('#logo').val(response.fullPath).attr('fileName', response.fileName);
              },
            });
          });
        });
    </script>
@endsection
