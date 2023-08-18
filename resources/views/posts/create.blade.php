<x-layout>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-6 mt-3">
            <h1 class="mb-3">Create Post</h1>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Title...">
                    @error('title')
                        <div class="form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Body" class="form-label">Body</label>
                    <textarea class="form-control" name="body" id="body" rows="3" placeholder="Body...">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Post" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</x-layout>