@if(request()->session()->has('success'))
    <div class='alert alert-success flash'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class='font-breeSerif'><i class="fa fa-check fa-lg" aria-hidden="true"></i> Congratulation!</h4>
        <span class='font-breeSerif'>{{ request()->session()->pull('success') }}</span>
    </div>
@elseif(request()->session()->has('info'))
    <div class='alert alert-info flash'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class='font-breeSerif'><i class="fa fa-info-circle" aria-hidden="true"></i> Notification!</h4>
        <span class='font-breeSerif'>{{ request()->session()->pull('info') }}</span>
    </div>
@elseif(request()->session()->has('warning'))
    <div class='alert alert-warning flash'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class='font-breeSerif'><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warning!</h4>
        <span class='font-breeSerif'>{{ request()->session()->pull('warning') }}</span>
    </div>
@elseif(request()->session()->has('failed'))
    <div class='alert alert-danger flash'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class='font-breeSerif'><i class="fa fa-times-circle-o" aria-hidden="true"></i> Sorry!</h4>
        <span class='font-breeSerif'>{{ request()->session()->pull('failed') }}</span>
    </div>
@elseif(count($errors)>0)
    <div class='alert bg-danger text-danger flash'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
        <span class='font-breeSerif'><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> <strong>Form submission failed!</strong></span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script>
    $(function(){
        $('.flash').delay(8000).fadeOut('slow');
    });
</script>