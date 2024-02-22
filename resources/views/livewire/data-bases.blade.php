<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Databases') }}
            </h2>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2 mb-2">
        <div class="flex justify-end bg-white shadow-xl sm:rounded-lg px-4 py-2">
            <span class="sr-only">Search</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20">
                    <!-- ... -->
                </svg>
            </span>
            <x-input type="text" class="w-full" placeholder="Search database" wire:model="search" />
            <x-button wire:click="$set('modal_create_event',true)" class="mx-2">Create new</x-button>
            <x-dialog-modal wire:model="modal_create_event">
                <x-slot name="title">Create new Database</x-slot>
                <x-slot name="content">
                    <form>
                        <div class="mb-4">
                            <x-label>Key event:</x-label>
                            <x-input type="text" wire:model="key" class="w-full" />
                            @error('key')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Name:</x-label>
                            <x-input type="text" wire:model="name" class="w-full" />
                            @error('name')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Date start:</x-label>
                            <x-input type="datetime-local" wire:model="date_start" class="w-full" />
                            @error('date_start')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Date end:</x-label>
                            <x-input type="datetime-local" wire:model="date_end" class="w-full" />
                            @error('date_end')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex items-center justify-end space-x-2">
                        <x-danger-button wire:click="$set('modal_create_event',false)">Cancel</x-danger-button>
                        <x-button wire:click="storeEvent()">Create</x-button>
                    </div>
                </x-slot>
            </x-dialog-modal>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg px-4">
                @foreach ($events as $event)
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex items-center justify-between gap-x-6 py-5">
                            <div class="min-w-0">
                                <div class="flex items-start gap-x-3">
                                    <p
                                        class="text-xl font-semibold leading-6 text-gray-900 hover:underline hover:decoration-2 cursor-pointer">
                                        {{ $event->name }}</p>
                                    @if ($event->status)
                                        <p
                                            class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                            Active</p>
                                    @else
                                        <p
                                            class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                            Inactive</p>
                                    @endif
                                </div>
                                <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                    <p class="whitespace-nowrap">Create at <time
                                            datetime="2023-03-17T00:00Z">{{ $event->created_at }}</time></p>
                                    <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    <p class="truncate">Last update at {{ $event->updated_at }}</p>
                                </div>
                            </div>
                            <div class="flex flex-none items-center gap-x-4">
                                <div wire:click="showCodes({{ $event }})"
                                    class="flex items-center cursor-pointer text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                                    </svg>
                                    <p>Codes</p>
                                </div>
                                <div wire:click="editEvent({{ $event }})"
                                    class="flex items-center cursor-pointer text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <p>Edit</p>
                                </div>
                                <div class="flex items-center cursor-pointer text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3.5 h-3.5">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p>Delete</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach
                <div class="p-3">
                    {{ $events->links() }}
                </div>
            </div>
            <x-dialog-modal wire:model="modal_edit_event">
                <x-slot name="title">Edit Database</x-slot>
                <x-slot name="content">
                    <form>
                        <div class="mb-4">
                            <x-label>Key event:</x-label>
                            <x-input type="text" wire:model="editEventForm.key" class="w-full" />
                            @error('editEventForm.key')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Name:</x-label>
                            <x-input type="text" wire:model="editEventForm.name" class="w-full" />
                            @error('editEventForm.name')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Date start:</x-label>
                            <x-input type="datetime-local" wire:model="editEventForm.date_start" class="w-full" />
                            @error('editEventForm.date_start')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Date end:</x-label>
                            <x-input type="datetime-local" wire:model="editEventForm.date_end" class="w-full" />
                            @error('editEventForm.date_end')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex items-center justify-end space-x-2">
                        <x-danger-button wire:click="$set('modal_edit_event',false)">Cancel</x-danger-button>
                        <x-button wire:click="updateEvent()">Update</x-button>
                    </div>
                </x-slot>
            </x-dialog-modal>
        </div>
    </div>
</div>
