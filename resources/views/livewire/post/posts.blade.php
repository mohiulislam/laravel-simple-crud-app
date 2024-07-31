<div class="container mx-auto px-4 sm:px-8">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex justify-end mt-4">
        <a href="posts/create" class="rounded inline-block cursor-pointer bg-cyan-500 p-4" wire:navigate>Create post</a>
    </div>
    <table class="table-fixed w-full mt-5">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Content</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="border text-white px-4 py-2">{{ $post->title }}</td>
                    <td class="border text-white px-4 py-2">
                        {{ strlen($post->content) > 100 ? substr($post->content, 0, 97) . '...' : $post->content }}
                    </td>
                    <td class="border text-white px-4 py-2 text-center">
                        <button wire:click="redirectToEdit({{ $post->id }})"
                            class="bg-blue-500 px-4 py-1 rounded-md mr-2">Edit</button>
                        <button wire:click="delete({{ $post->id }})"
                            class="bg-red-500 px-4 py-1 rounded-md">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
