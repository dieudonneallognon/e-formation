<div class="alert alert-{{ $type }} d-flex align-items-center @if ($dimissable) alert-dismissible fade show @endif" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        @switch($type)
            @case('primary')
                <use xlink:href="#info-fill" />
            @break

            @case('success')
                <use xlink:href="#check-circle-fill" />
            @break

            @case('warning')
                <use xlink:href="#exclamation-triangle-fill" />
            @break

            @case('danger')
                <use xlink:href="#exclamation-triangle-fill" />
            @break
        @endswitch
    </svg>
    <div>
        {{ $message }}
    </div>
    @if ($dimissable)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
