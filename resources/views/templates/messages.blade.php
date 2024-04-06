@if ($errors->any())
<div class="py-1 alert alert-danger alert-dismissible fade show text-right d-flex align-items-center justify-content-between" role="alert">
    <strong class="d-block mb-2">لطفا خطاهای زیر را رفع کرده و دوباره تلاش کنید 👇</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button style="position: unset;" type="button" class="btn-close py-3" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('success'))
<div class="py-1 alert alert-success alert-dismissible fade show text-right d-flex align-items-center justify-content-between" role="alert">
    {{ session('success') }}
    <button style="position: unset;" type="button" class="btn-close py-3" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('info'))
<div class="py-1 alert alert-info alert-dismissible fade show text-right d-flex align-items-center justify-content-between" role="alert">
    {{ session('info') }}
    <button style="position: unset;" type="button" class="btn-close py-3" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif