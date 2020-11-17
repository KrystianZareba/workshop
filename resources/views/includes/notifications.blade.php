@if (session('success') || session('error'))
<div class="toast" style="position: fixed; top: 10px; right: 10px;">
    <div class="toast-header">
        <i class="fas fa-square @if(session('success')) green-text @else red-text @endif pr-2"></i>
        <strong class="mr-auto">Powiadomienie</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        @if(session('success'))
            {{ session('success') }}
        @else
            {{session('error')}}
        @endif
    </div>
</div>

<script>
    $('.toast').toast({delay: 4000})
    $('.toast').toast('show')
</script>
@endif
