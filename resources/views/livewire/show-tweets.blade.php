<div>
    <p>Tweets</p>

    <form method="post" wire:submit.prevent="create">
        <textarea name="content" id="content" wire:model="content" col="50" row="10">
        </textarea>
        @error('content')
            {{ $message }}
        @enderror
        <button class="btn btn-primary" type="submit">Publicar</button>
    </form>

    <br/>

    <hr>

    @foreach($tweets as $tweet)
        <div class="flex">
            <div class="w-2/8">
                @if($tweet->user->photo)
                    <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}" class="rounded-full h-10 w-10">
                @else
                    <img src="{{ url('imgs/no-image.png') }}" alt="{{ $tweet->user->name }}" class="rounded-full h-10 w-10">
                @endif
                {{ $tweet->user->name }}
            </div>
            <div class="w-6/8">
                {{ $tweet->content }} ({{ $tweet->likes_count }})
                @if($tweet->likes->contains('user_id', auth()->user()->id))
                    <a href="javascript:void(0);" wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
                @else
                    <a href="javascript:void(0);" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
                @endif
            </div>
        </div>
        <br/>
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
