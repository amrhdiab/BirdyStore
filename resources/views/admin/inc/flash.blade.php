@if(count($errors) >0)
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
    </ul>
@endif


{{--@if(session('success'))--}}
    {{--<div class="alert alert-success">--}}
        {{--{{session('success')}}--}}
    {{--</div>--}}
{{--@endif--}}

{{--@if(session('error'))--}}
    {{--<div class="alert alert-danger">--}}
        {{--{{session('error')}}--}}
    {{--</div>--}}
{{--@endif--}}