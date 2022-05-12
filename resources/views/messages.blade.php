@if (Session::has('success'))
<div class="row">
<div class="col-12">
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{session()->get('success')}}
</div>
</div>
</div>
@endif
@if (Session::has('error'))
<div class="row">
<div class="col-12">
<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{session()->get('error')}}
</div>
</div>
</div>
@endif 