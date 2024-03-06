<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Services') }}
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
            <x-input type="text" class="w-full" placeholder="Search service" wire:model="search" />
            <x-button wire:click="$set('modal_create_service',true)" class="mx-2">Create new</x-button>
            <x-dialog-modal wire:model="modal_create_service">
                <x-slot name="title">Create new service</x-slot>
                <x-slot name="content">
                    <form>
                        @if ($step1)
                            <div class="mb-4">
                                <x-label>Name:</x-label>
                                <x-input type="text" wire:model="title" class="w-full" />
                                @error('title')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <x-label>Start Date:</x-label>
                                <x-input type="datetime-local" wire:model="date_start" class="w-full" />
                                @error('title')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <x-label>End Date:</x-label>
                                <x-input type="datetime-local" wire:model="date_end" class="w-full" />
                                @error('title')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <x-label>Description:</x-label>
                                <textarea type="text" wire:model="description" class="w-full h-44 rounded-md border-gray-400"> </textarea>
                                @error('description')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        @if ($step2)
                            <p class="text-gray-800 text-md mt-6">Select the databases you want to use: </p>
                            <div class="grid grid-cols-2 gap-3 p-4">
                                @foreach ($events as $event)
                                    <div>
                                        <input type="checkbox" wire:model="databases" value="{{ $event->id }}">
                                        {{ $event->name }} <span
                                            class="text-sm text-gray-400">({{ $event->key }})</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex items-center justify-end space-x-2">
                        <x-danger-button wire:click="$set('modal_create_service',false)">Cancel</x-danger-button>
                        @if ($step1)
                            <x-button wire:click="storeService()">Create</x-button>
                        @endif
                        @if ($step2)
                            <x-button wire:click="assignDatabases()">Assign</x-button>
                        @endif
                    </div>
                </x-slot>
            </x-dialog-modal>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg px-4">
                <div class="p-3">
                    {{ $services->links() }}
                </div>
                @foreach ($services as $service)
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex items-center justify-between gap-x-6 py-5">
                            <div class="min-w-0">
                                <div class="flex items-center gap-x-2">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1 .9-2.7L5.737 5.1a3.375 3.375 0 0 1 2.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 0 1 .9 2.7m0 0a3 3 0 0 1-3 3m0 3h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Zm-3 6h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Z" />
                                        </svg>
                                    </span>
                                    <p
                                        class="text-2xl font-semibold leading-6 text-gray-900 hover:underline hover:decoration-2 cursor-pointer">
                                        {{ $service->title }}</p>

                                    @if ($service->status)
                                        <p
                                            class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                            Enable</p>
                                    @else
                                        <p
                                            class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                            Disable</p>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400 p-2">
                                        {{ $service->description }}
                                    </p>
                                    <div class="text-sm text-gray-600 px-2">
                                        Databases include:
                                        @foreach ($service->events as $event)
                                            <span class="text-xs text-gray-400 hover:text-gray-700 cursor-pointer">-
                                                ({{ $event->key }})
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-1 flex items-center px-2 gap-x-2 text-xs leading-5 text-gray-500">
                                    <p class="whitespace-nowrap">Create at <time
                                            datetime="2023-03-17T00:00Z">{{ $service->created_at }}</time></p>
                                    <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    <p class="truncate">Last update at {{ $service->updated_at }}</p>
                                </div>
                            </div>
                            <div class="flex flex-none items-center gap-x-4">
                                <div wire:click="showService({{ $service }})"
                                    class="flex items-center cursor-pointer text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                                    </svg>

                                    <p>Settings</p>
                                </div>
                                <div wire:click="editEvent({{ $service }})"
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
                    {{ $services->links() }}
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
