


<div class="container">
    <h2>WordPress Posts</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Type</th>
                <th>Image</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->post_id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->type }}</td>
                <td> <a href ="{{ $post->link }}">Click here</a></td>
                <td>{{ $post->modified_date }}</td>
                <td>
                    @if($post->featured_image_thumbnail)
                        <img src="{{ $post->featured_image_thumbnail }}" alt="thumbnail" width="50">
                    @endif
                </td>
                <td>{{ $post->author_name }}</td>
                <td>
                    <a href="{{ url('edit-post', $post->id )}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ url('delete-post', $post->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

