@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">File upload</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
    {!! Form::open(['files' => true],['action' => 'FilesController@store']) !!}
                            <div class="form-group">
                                {!! Form::label('description','Описание:',['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('description') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('attachedfile','Файл:',['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::file('attachedfile') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit('Добавить файл'); !!}
                               </div>
                            </div>
       {!! Form::close() !!}
            </div>
        </div>
    </div>
        </div>
    </div>
    </div>
@endsection