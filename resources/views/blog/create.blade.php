@extends('templates.master')

@section('content')
    <form method="POST">
        {{ csrf_field() }}
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-group">
                <input class="col pt-3 pb-3" type="text" name="title" placeholder="標題" value="{{ old('title') }}"/>
            </div>
            <div class="form-group">
                @include('components.editor')
            </div>
            <div class="form-group">
                @include('components.validationErrorMessage')
            </div>
            <div class="form-group row justify-content-center">
                <input class="btn btn-primary col-4" type="submit" value="發佈" />
            </div>
        </div> 
    </form>
@endsection