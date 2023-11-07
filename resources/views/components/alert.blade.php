@if (session('success'))
    <div class="alert alert-success d-flex align-items-center">
        <span class="material-symbols-outlined text-succcess me-2">
            task_alt
        </span>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center">
        <span class="material-symbols-outlined text-danger me-2">
            error
        </span>
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning d-flex align-items-center">
        <span class="material-symbols-outlined text-warning me-2">
            warning
        </span>
        {{ session('warning') }}
    </div>
@endif
