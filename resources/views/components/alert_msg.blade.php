@props(['msg', 'type'])

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if($type === 'success')
            Swal.fire({
                title: 'Success!',
                text: '{{ $msg }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @elseif($type === 'error')
            Swal.fire({
                title: 'Error!',
                text: '{{ $msg }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
