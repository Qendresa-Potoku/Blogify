@extends('layouts.main')

@section('title', 'My Posts')

@section('content')
    <h2 class="text-2xl font-bold mb-6">My Posts</h2>

    <button onclick="openCreateModal()" class="bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-2 px-6 rounded-md mb-6">
        ➕ Create New Post
    </button>

    <div id="createPostModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-[999]">
        <div class="bg-white p-6 rounded w-96 relative">
            <button onclick="closeCreateModal()" class="absolute top-2 right-2 text-xl">&times;</button>
            <h3 class="text-xl mb-4">Create Post</h3>
            <form action="/create-post" method="POST" class="space-y-4">
                @csrf
                <input name="title" type="text" placeholder="Post Title" required class="w-full p-2 border rounded">
                <textarea name="content" placeholder="Post Content..." required class="w-full p-2 border rounded" rows="5"></textarea>
                <button type="submit" class="bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-2 px-6 rounded-md w-full">Add Post</button>
            </form>
        </div>
    </div>

    <div id="editPostModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded w-96 relative">
            <button onclick="closeEditModal()" class="absolute top-2 right-2 text-xl">&times;</button>
            <h3 class="text-xl mb-4">Edit Post</h3>
            <form id="editPostForm" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <input id="editTitle" name="title" type="text" placeholder="Post Title" required class="w-full p-2 border rounded">
    <textarea id="editContent" name="content" placeholder="Post Content..." required class="w-full p-2 border rounded" rows="5"></textarea>
    <button type="submit" class="bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-2 px-6 rounded-md w-full">Save Changes</button>
</form>
        </div>
    </div>

    <div class="flex flex-wrap justify-center">
        @foreach($posts as $post)
            <div class="bg-white border border-gray-200 rounded-2xl p-5 w-60 h-80 flex flex-col justify-between hover:shadow-lg hover:scale-105 transition transform duration-300 overflow-hidden m-4">
                <div class="flex-grow">
                    <h3 class="text-lg font-bold mb-2 truncate">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm overflow-hidden line-clamp-6">{{ $post->content }}</p>
                </div>
                <div class="mt-4">
                    <div class="text-gray-400 text-xs text-right mb-5">
                        Posted: {{ $post->created_at->format('d M Y') }}
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="openEditModal('{{ $post->id }}', `{{ e($post->title) }}`, `{{ e($post->content) }}`)" class="bg-[#5a243c] hover:bg-[#4a1d34] text-white text-sm font-bold px-4 py-2 rounded-md w-1/2">
                             Edit
                        </button>

                        <form action="/delete-post/{{ $post->id }}" method="POST" class="w-1/2">
                            @csrf
                            @method('DELETE')
                            <button class="bg-[#5a243c] hover:bg-[#4a1d34] text-white text-sm font-bold px-4 py-2 rounded-md w-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-12 mb-8">
        {{ $posts->links('pagination.pagination') }}
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('createPostModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createPostModal').classList.add('hidden');
        }

        function openEditModal(id, title, content) {
            const form = document.getElementById('editPostForm');
            form.action = `/edit-post/${id}`;
            document.getElementById('editTitle').value = title;
            document.getElementById('editContent').value = content;
            document.getElementById('editPostModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editPostModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const createModal = document.getElementById('createPostModal');
            const editModal = document.getElementById('editPostModal');

            if (event.target === createModal) {
                closeCreateModal();
            }
            if (event.target === editModal) {
                closeEditModal();
            }
        }
    </script>
@endsection
