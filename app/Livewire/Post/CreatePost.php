<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $post_id;
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public function mount($post_id = null)
    {
        $this->post_id = $post_id;

        if ($post_id) {
            $post = Post::find($post_id);

            if ($post) {
                $this->title = $post->title;
                $this->content = $post->content;
            }
        }
    }

    public function cancelEdit()
    {
        return redirect()->route('posts');
    }

    // public function handleUpdateOrSave()
    // {
    //     return redirect()->route('posts');
    // }

    // In your CreatePost.php file within the store method

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'content' => $this->content
        ]);

        session()->flash(
            'message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.'
        );
        return redirect()->route('posts');
    }

    public function render()
    {
        return view('livewire.post.create-post');
    }
}
