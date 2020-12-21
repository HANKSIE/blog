@extends('templates.master')

@section('content')

<form method="POST" class="row justify-content-center">
    {{ csrf_field() }}
    <div class="col col-7">
        <div class="form-group">
            <input class="col pt-3 pb-3" type="text" name="title" placeholder="標題" value="{{ old('title') }}"/>
        </div>
        <div class="form-group">
            <textarea id="ckeditor" name="content" value="{{ old('content') }}" class="vh-20"></textarea>
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