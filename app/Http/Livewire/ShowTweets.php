<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = null;

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with(['user','likes'])->withCount('likes')->latest()->paginate(10);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        $this->content = null;
    }

    public function like(Tweet $tweet)
    {
        $tweet->likes()->create();
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->where('user_id', auth()->user()->id)->delete();
    }
}
