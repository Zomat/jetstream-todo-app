<div>
    <table class="table-fixed w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Item</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-4 py-2">{{ $item->description }}</td>
                <td class="border px-4 py-2 text-center font-bold">@if($item->done)Done @else To Do @endif</td>
                <td class="border px-4 py-2 text-center">
                    @if($item->done)
                        <button wire:click="markAsToDo({{ $item->id }})"
                        class="bg-red-100 text-red-600 px-6 rounded-full">
                            {{ __('Mark as ToDo') }}
                        </button>
                    @else
                        <button wire:click="markAsDone({{ $item->id }})"
                        class="bg-green-300 text-white px-6 rounded-full">
                            {{ __('Mark as Done') }}
                        </button>
                    @endif

                    <button wire:click="deleteItem({{ $item->id }})"
                    class="bg-red-100 text-red-600 px-6 rounded-full">
                        Delete Permanently
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
