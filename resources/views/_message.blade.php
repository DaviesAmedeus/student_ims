@if(!empty(session('success')))
<div x-data="{show:true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="alert alert-success alert-dismissible " role="alert">
{{ session('success') }}
</div>
@endif

@if(!empty(session('error')))
<div x-data="{show:true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="alert alert-danger alert-dismissible" role="alert">
{{ session('error') }}
</div>
@endif


@if(!empty(session('warning')))
<div x-data="{show:true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="alert alert-warning alert-dismissible " role="alert">
{{ session('warning') }}
</div>
@endif

@if(!empty(session('info')))
<div x-data="{show:true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="alert alert-info alert-dismissible " role="alert">
{{ session('info') }}
</div>
@endif
