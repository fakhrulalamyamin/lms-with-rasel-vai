<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Join Date</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($user->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="mr-3" href="{{ route('user.edit', $user->id) }}">
                            @include('components.icons.edit')
                        </a>

                        <form onsubmit="return confirm('Are you SURE?')"
                            wire:submit.prevent="userDelete({{ $user->id }})">
                            <button type="submit">@include('components.icons.trash')</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>
