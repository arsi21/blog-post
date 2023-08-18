@props(['post'])

<div class="d-flex gap-1">
    <div class="col-12">
        <div class="g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="p-4 d-flex flex-column position-static">
            {{-- <strong class="d-inline-block mb-2 text-primary-emphasis">Name</strong> --}}
            <h3 class="mb-0 text-capitalize">{{ $post->title }}</h3>
            <div class="mb-1 text-body-secondary">By <span class="text-capitalize">{{ $post->user->name }}</span> | {{ $post->created_at->formatLocalized('%B %e %Y') }}</div>
            <p class="card-text mb-auto">{{ $post->description }}</p>
            <a href="{{ route('posts.show', [$post->id]) }}" class="gap-1 stretched-link">
                Continue reading
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            </div>
        </div>
    </div>
</div>