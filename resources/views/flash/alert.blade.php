@if (Session::has('flash_notification.alert'))
<script>
    $(document).ready(function() {
            $.Notify({
                keepOpen: '{{ Session::get('flash_notification.keepOpen') }}',
                type: '{{ Session::get('flash_notification.level') }}',
                caption: '{{Session::get('flash_notification.title')}}',
                content: '{{Session::get('flash_notification.message')}}'
            });

    });
</script>
@endif
