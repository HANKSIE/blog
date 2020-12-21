@if($errors && count($errors))
    @foreach($errors->all() as $err)
        <div style="color: red">* {{ $err }} </div>
    @endforeach
@endif