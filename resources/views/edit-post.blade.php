
<div class="container">
    <h2>Edit WordPress Post</h2>

    <form action="{{ route('update.post', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Post ID</label>
            <input type="hidden" name="post_id" value="{{ $post->post_id }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" value="{{ $post->status }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Type</label>
            <input type="text" name="type" value="{{ $post->type }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Link</label>
            <input type="url" name="link" value="{{ $post->link }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Excerpt</label>
            <textarea name="excerpt" class="form-control" rows="3">{{ $post->excerpt }}</textarea>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5">{{ $post->content }}</textarea>
        </div>

        <div class="form-group">
            <label>Author Name</label>
            <input type="text" name="author_name" value="{{ $post->author_name }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Author Link</label>
            <input type="url" name="author_link" value="{{ $post->author_link }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Full)</label><br>
            @if($post->featured_image_full)
                <img src="{{ $post->featured_image_full }}" width="100"><br><br>
            @endif
            <input type="text" name="featured_image_full" value="{{ $post->featured_image_full }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Medium)</label>
            <input type="text" name="featured_image_medium" value="{{ $post->featured_image_medium }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Medium Large)</label>
            <input type="text" name="featured_image_medium_large" value="{{ $post->featured_image_medium_large }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Thumbnail)</label>
            <input type="text" name="featured_image_thumbnail" value="{{ $post->featured_image_thumbnail }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Modified Date</label>
            <input type="text" name="modified_date" value="{{ $post->modified_date }}" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Update Post</button>
        <a href="{{ url('wp-post-list') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>

