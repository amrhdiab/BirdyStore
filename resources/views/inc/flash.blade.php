@if(count($errors) >0)
    <ul>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger" style="list-style: none">{{$error}}</li><br>
        @endforeach
    </ul>
@endif