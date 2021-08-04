<!-- Breadcrumb section  -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> @yield('pageTitle')</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page"> @yield('pageUrl') </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <span class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius"> Date: {{ \Carbon\Carbon::now()->format('D, d-M-Y') }}</span>
            </div>
        </div>
    </div>
</div>
