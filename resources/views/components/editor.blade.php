<textarea id="ckeditor" name="content" class="vh-20">
    {{ isset($content) ? $content : old('content') }}
</textarea>
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