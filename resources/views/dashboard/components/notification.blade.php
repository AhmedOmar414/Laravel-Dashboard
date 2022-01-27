
<script>
    // success message popup notification
    @if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}");
    @endif
    @if(Session::has('del'))
    toastr.success("{{ Session::get('del') }}");
    @endif

    // info message popup notification
{{--    @if(Session::has('info'))--}}
{{--    toastr.info("{{ Session::get('info') }}");--}}
{{--    @endif--}}

{{--    // warning message popup notification--}}
{{--    @if(Session::has('warning'))--}}
{{--    toastr.warning("{{ Session::get('warning') }}");--}}
{{--    @endif--}}

{{--    // error message popup notification--}}
{{--    @if(Session::has('error'))--}}
{{--    toastr.error("{{ Session::get('error') }}");--}}
{{--    @endif--}}
</script>
