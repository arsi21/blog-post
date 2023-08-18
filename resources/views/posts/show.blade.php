<x-layout>
    <div class="mt-3">
        @include('components.message')
        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" ><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
        <div class="row justify-content-center">
            <article class="blog-post mt-2 col-12 col-lg-7">
                <h2 class="display-5 mb-1 text-capitalize fw-semibold">{{ $post->title }}</h2>
                <p class="blog-post-meta text-secondary">By <span class="text-capitalize">{{ $post->user->name }}</span> | {{ $post->created_at->formatLocalized('%B %e %Y') }}</p>

                <p>{{ $post->description }}</p>
                <hr>
                <p>{{ $post->body }}</p>
            </article>

            {{-- <hr> --}}

            <section class="col-12">
                <h2>Comments</h2>
                
                @unless(count($post->comments) == 0)
                <div class="card">
                    <ul class="list-group list-group-flush">
                    @foreach($post->comments as $comment)
                        <li class="list-group-item">
                            <div class="d-flex flex-column gap-0">
                                <span class="fw-bold text-capitalize">{{ $comment->user->name }}</span>
                                <span class="text-secondary">{{ $comment->user->created_at->diffForHumans() }}</span>
                                <span>{{ $comment->body }}</span>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                @else
                <div class="text-center text-secondary">
                    <p>No available comment!</p>
                </div>
                @endunless
                <form action="{{ route('comments.store', [$post->id]) }}" method="post">
                    @csrf
                    <div class="mt-3 mb-3">
                        <label for="body" class="form-label">Write a Comment</label>
                        <textarea class="form-control" name="body" id="body" rows="3" placeholder="Comment...">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </section>
        </div>
    </div>
</x-layout>