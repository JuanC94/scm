@if(session()->has('success'))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Bien hecho!</strong> {!! session('message') !!}
</div>
@endif
@if(session()->has('error'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Opss!</strong> {!! session('message') !!}
    </div>
@endif