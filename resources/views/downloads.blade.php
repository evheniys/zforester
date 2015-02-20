@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="list-group">
                    @foreach($files as $file)
                    <a href="{!! URL::action('FilesController@download',$file->id) !!}" class="list-group-item">
                        <p class="list-group-item-text">{{ $file->description }}</p>
                    </a>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection