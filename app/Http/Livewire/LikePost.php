<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post)
    {
        $this->isLiked = $post->ckeckLike(auth()->user());
        $this->likes = $post->likes()->count();
    }

    public function like()
    {
        if ($this->post->ckeckLike(auth()->user())) {
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            $this->isLiked = false;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
        }
        $this->likes = $this->post->likes()->count();
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
