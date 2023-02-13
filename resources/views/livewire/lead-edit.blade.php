<div>
    <form wire:submit.prevent="leadEditSubmit" class="mb-5">
        <div class="flex -mx-4 mb-3">
            <div class="flex-1 px-4">
                <label class="lms-label" for="name">Name</label>
                <input wire:model="name" type="text" class="lms-input" id="name">

                @error('name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label class="lms-label" for="email">Email</label>
                <input wire:model="email" type="email" class="lms-input" id="email">

                @error('email')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label class="lms-label" for="phone">Phone</label>
                <input wire:model="phone" type="tel" class="lms-input" id="phone">

                @error('phone')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div wire:loading.flex wire:target="leadEditSubmit" class="items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 animate-spin mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>

            <span>Loading ...</span>

        </div>

        <button wire:loading.remove wire:target="leadEditSubmit" class="lms-btn" type="submit">Update</button>
    </form>

    <h3 class="font-bold text-xl mb-4">Notes</h3>

    @foreach ($notes as $note)
        <div class="p-4 border border-gray-200 mb-2">
            {{ $note->description }}
        </div>
    @endforeach


    <h4 class="font-bold mb-2">Add New Note</h4>
    <form wire:submit.prevent="newNote">
        <textarea wire:model="note" class="lms-input mb-2" placeholder="Type Note ..."></textarea>

        @error('note')
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror

        <button type="submit" class="lms-btn">Save</button>
    </form>

</div>
