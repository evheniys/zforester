@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="list-group">

                    @if ($fcount > 0)
                        <h4>Всего скачано файлов: {!! $fcount !!}</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Номер телефона</th>
                                <th>Скачаный файл</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($flogs as $flog)
                                <tr>
                                    <td>{!! $flog->phonenumber !!}</td>
                                    <td>{!! $flog->filename !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection