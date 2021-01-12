<div>
    <h3>Atualizar foto de perfil</h3>
    <hr>
    <br/>
    <form action="#" method="post" wire:submit.prevent="storagePhoto">
        <input type="file" name="photo" id="photo" wire:model="photo">
        @error('photo') {{ $message }} @enderror
        <br/>
        <button type="submit">Upload Photo</button>
    </form>
</div>
