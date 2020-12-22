@extends('templates.master')

@section('content')
    <form method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-group">
                <input class="col pt-3 pb-3" type="text" name="title" placeholder="標題" value="@if (isset($title)){{ $title }}@else{{ old('title') }} @endif"/>
            </div>
            <div class="form-group">
                @include('components.editor')
            </div>
            <div class="form-group row justify-content-center">
                <input class="btn btn-primary col-4" type="submit" value="發佈" />
            </div>
        </div> 
        <input type="hidden" name="bid" value="{{ $bid }}">
    </form>
@endsection