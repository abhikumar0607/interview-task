


<div class="container">
    <h2>Add New WordPress Post</h2>

    <form action="{{ route('wp-posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Post ID</label>
            <input type="text" name="post_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control">
        </div>

        <div class="form-group">
            <label>Type</label>
            <input type="text" name="type" class="form-control">
        </div>

        <div class="form-group">
            <label>Link</label>
            <input type="url" name="link" class="form-control">
        </div>

        <div class="form-group">
            <label>Excerpt</label>
            <textarea name="excerpt" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label>Author Name</label>
            <input type="text" name="author_name" class="form-control">
        </div>

        <div class="form-group">
            <label>Author Link</label>
            <input type="url" name="author_link" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Full)</label>
            <input type="text" name="featured_image_full" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Medium)</label>
            <input type="text" name="featured_image_medium" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Medium Large)</label>
            <input type="text" name="featured_image_medium_large" class="form-control">
        </div>

        <div class="form-group">
            <label>Featured Image (Thumbnail)</label>
            <input type="text" name="featured_image_thumbnail" class="form-control">
        </div>

        <div class="form-group">
            <label>Modified Date</label>
            <input type="text" name="modified_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Post</button>
        <a href="{{ route('wp-posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

