<x-app-layout>
    <div class="container bg-gray-500">
        <h1>Blog Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>
                            @if(Auth::check() && Auth::user()->id === $post->user_id)
                                <a href="{{ route('posts.edit', $post->id) }}" style="color: blue;">Edit</a>
                                <form action="{{ route('posts.delete', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: red;">Delete</button>
                                </form>
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>

