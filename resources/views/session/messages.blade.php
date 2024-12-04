@if(session()->has('success'))
<script>
    toastr.success("{{ session('success') }} ")
</script>
@endif


@if(session()->has('error'))
<script>
    toastr.error("{{ session('error') }} ")
</script>
@endif