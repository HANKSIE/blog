@extends('templates.master')

@section('content')

<form method="POST" class="row justify-content-center">
    {{ csrf_field() }}
    <div class="col-lg-8 col-md-10 mx-auto">
        @if (isset($Blog))
            <input type="hidden" name="bid" value="{{$Blog->id}}">
        @endif
        
        <div class="form-group">
            <input class="col pt-3 pb-3" type="text" name="title" placeholder="標題" value="
                @if (isset($Blog))
                    {{$Blog->title}}
                @else
                    {{old('title')}}
                @endif
            "/>
        </div>
        <div class="form-group">
            <textarea id="ckeditor" name="content" class="vh-20">
                @if (isset($Blog))
                    {{$Blog->content}}
                @else
                    {{old('content')}}
                @endif
            </textarea>
        </div>
        <div class="form-group row justify-content-center">
            <input class="btn btn-primary col-4" type="submit" value="發佈" />
        </div>
    </div>
</form>
<script src="{{ url('js/ckeditor5/index.js') }}"></script>
<script src="{{ url('js/ckeditor5/config.js') }}"></script>
<script>
    ckeditorInit(document.querySelector("#ckeditor"), "{{url('api/imageUpload')}}");
</script>
<style>
    .ck-editor__editable_inline {
      min-height: 30vh;
    }
</style>
@endsection