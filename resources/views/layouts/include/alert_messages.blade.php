@if (session('success_message'))
    <div class="row justify-content-center">
        <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
            <strong>Success!</strong> {{ session('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

@if (session('error_message'))
    <div class="row justify-content-center">
        <div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
            <strong>Error!</strong> {{ session('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

@if (session('warning_message'))
    <div class="row justify-content-center">
        <div class="alert alert-warning alert-dismissible fade show col-6" role="alert">
            <strong>Warning!</strong> {{ session('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif