<x-layout>
    <div class="mt-3">
        @include('components.message')
    </div>
    
    <p class="mt-3 text-muted">My Posts</p>
    <div class="mb-5 overflow-auto">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @unless(count($posts) == 0)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at->formatLocalized('%B %e %Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a type="button" href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>
                            <form action="{{ route('posts.destroy', [$post->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i> Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3" class="text-center text-secondary">No post available!</td>
            </tr>
            @endunless
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</x-layout>