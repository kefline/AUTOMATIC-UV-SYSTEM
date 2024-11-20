@if (!empty(session('success')))
<div class="alert alert-success" role="alert">
    {{('success')}}
</div>
    
@endif
@if (!empty(session('error')))
<div class="alert alert-danger" role="alert">
    {{('error')}}

</div>
    
@endif