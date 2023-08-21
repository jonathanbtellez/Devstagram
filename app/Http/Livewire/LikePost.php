<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{   

    // Props are attr.
    public $post;

    // reactive element
    public $hasLike;

    public $likes;

    // livecicle 
    // Is as a contructor is execute when the component is mounted
    public function mount($post){
        // Check is the user give like to this post
        $this->hasLike = $post->checkLike(auth()->user());
        $this->likes = $post->likes()->count();
    }

    public function like()
    {
        if( $this->post->checkLike(auth()->user()) ){
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();    
            $this->hasLike = false;    
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->hasLike = true;    
        }
        $this->likes = $this->post->likes()->count();
    }
    
    public function render()
    {
        return view('livewire.like-post');
    }
}
