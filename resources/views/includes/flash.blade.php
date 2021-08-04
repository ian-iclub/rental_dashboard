<style>
    .alert {
        position: absolute;
        top: 150px;
        right: 0;
        z-index: 999;
        margin: 0 auto;
    }
    .close {
        margin-left: 10px;
        top: 50%;
    }
</style>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <i class="fa fa-check-circle mr-2"></i>
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <i class="fa fa-times-circle mr-2"></i>
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <i class="fa fa-exclamation-circle mr-2"></i>
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <i class="fa fa-info-circle mr-2"></i>
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <li>
            @foreach($errors->all() as $error)
                <a>{{ $error }}</a>
            @endforeach
        </li>
    </div>
@endif

<script>
    $('.alert').on('close.bs.alert', function(e) {
        // stop Bootstrap animation
        e.stopPropagation();
        // Use my own animation
        $(this).closest('.alert')
            .animate({
                height: 'toggle',
                opacity: 'toggle'
            });
    });
</script>
