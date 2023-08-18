<x-layout>
    <div class="mt-3">
        @include('components.message')
        
        <div class="mb-3">
            @include('components.search')
        </div>

        @unless(count($posts) == 0)
            @foreach($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
            {{ $posts->links() }}
        @else
            <div class="text-center mt-5 text-secondary">
                <p>No post available!</p>
            </div>
        @endunless
    </div>
</x-layout>