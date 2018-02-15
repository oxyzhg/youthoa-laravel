@if(count($errors))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach($errors->all() as $error)
            <p><i class="fa fa-exclamation-circle"></i> {{$error}}</p>
        @endforeach
    </div>
@elseif(session('status'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><i class="fa fa-exclamation-circle"></i> {{session('status')}}</p>
    </div>
@endif