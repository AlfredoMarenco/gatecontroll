<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-1 p-3">
                <div class="border-b border-gray-200 pb-5 sm:pb-0">
                    <h3 class="text-base font-semibold leading-6 text-gray-900 mb-2">Acctions</h3>
                    {{-- <div class="mt-3 sm:mt-4">
                        <!-- Dropdown menu on small screens -->
                        <div class="sm:hidden">
                            <label for="current-tab" class="sr-only">Select a tab</label>
                            <select id="current-tab" name="current-tab"
                                class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option>Search</option>
                                <option>Add</option>
                                <option selected>Interview</option>
                                <option>Offer</option>
                                <option>Hired</option>
                            </select>
                        </div> --}}
                    <!-- Tabs at small breakpoint and up -->
                    <div class="hidden sm:block">
                        <nav class="-mb-px flex space-x-8">
                            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                            <a wire:click="selectAction('1')"
                                class="flex cursor-pointer items-center  {{ $actionSelect == '1' ? 'border-indigo-500 text-indigo-600 ' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                Search</a>
                            <a wire:click="selectAction('2')"
                                class="flex cursor-pointer items-center  {{ $actionSelect == '2' ? 'border-indigo-500 text-indigo-600' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Add</a>
                            <a wire:click="selectAction('3')"
                                class="flex cursor-pointer items-center {{ $actionSelect == '3' ? 'border-indigo-500 text-indigo-600' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium"
                                aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>
                                Import</a>
                            <a wire:click="selectAction('4')"
                                class="flex cursor-pointer items-center  {{ $actionSelect == '4' ? 'border-indigo-500 text-indigo-600' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>

                                Export</a>
                            <a wire:click="selectAction('5')"
                                class="flex cursor-pointer items-center {{ $actionSelect == '5' ? 'border-indigo-500 text-indigo-600' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                                </svg>
                                Clear</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($actionSelect == 1)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative mb-2">
                <x-input wire:model="search" type="text" value="{{ $search }}"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></x-input>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3">
                    {{ $codes->links() }}
                </div>
                <ul role="list" class="divide-y divide-gray-100 p-4">
                    @forelse ($codes as $code)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                @switch($code->status_id)
                                    @case(1)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="h-8 w-8 flex-none rounded-full bg-gray-50 text-green-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    @break

                                    @case(2)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="h-8 w-8 flex-none rounded-full bg-gray-50 text-orange-300">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                        </svg>
                                    @break

                                    @case(3)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="h-8 w-8 flex-none rounded-full bg-gray-50 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    @break

                                    @default
                                @endswitch
                                <div class="min-w-0 flex-auto">
                                    <p class="text-2xl font-semibold leading-6 text-gray-900">{{ $code->barcode }}</p>
                                    <p class="mt-1 truncate text-sm leading-5 text-gray-500">
                                        Section: {{ $code->section }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <div wire:click="editCode({{ $code }})"
                                    class="flex items-center cursor-pointer text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <p>Edit</p>
                                </div>
                                <div wire:click="delete({{ $code }})"
                                    class="flex items-center cursor-pointer text-red-500">
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
                        @empty
                            <div>
                                <p class="text-xl text-center text-gray-600 font-semibold">Edit</p>
                                <p class="text-sm text-center text-gray-600 font-semibold">Add barcode values or import a
                                    CSV file to start validating scans and generating barcodes.</p>
                            </div>
                        @endforelse
                    </ul>

                    <div class="p-3">
                        {{ $codes->links() }}
                    </div>
                </div>
            </div>
            <x-dialog-modal wire:model="modal_edit_code">
                <x-slot name="title">Edit Barcode</x-slot>
                <x-slot name="content">
                    <form>
                        <div class="mb-4">
                            <x-label>Barcode:</x-label>
                            <x-input type="text" wire:model="editBarcodeForm.barcode" class="w-full" />
                            @error('editBarcodeForm.barcode')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Secction:</x-label>
                            <x-input type="text" wire:model="editBarcodeForm.section" class="w-full" />
                            @error('editBarcodeForm.section')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label>Status:</x-label>
                            @foreach ($statuses as $status)
                                <label for="">{{ $status->name }}</label>
                                <x-input type="radio" wire:model="editBarcodeForm.status"
                                    value="{{ $status->id }}" />
                            @endforeach
                            @error('editBarcodeForm.status')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex items-center justify-end space-x-2">
                        <x-danger-button wire:click="$set('modal_edit_code',false)">Cancel</x-danger-button>
                        <x-button wire:click="updateCode()">Update</x-button>
                    </div>
                </x-slot>
            </x-dialog-modal>
            {{-- Modal para eliminar codigo --}}
            <x-dialog-modal wire:model="modal_delete_code">
                <x-slot name="title">Delete Barcode</x-slot>
                <x-slot name="content">
                    <p class="text-red-500">Are you sure you want to delete this Barcode Value? You will not be able to
                        undo this action</p>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex items-center justify-end space-x-2">
                        <x-danger-button wire:click="$set('modal_delete_code',false)">Cancel</x-danger-button>
                        <x-button wire:click="deleteCode()">Delete</x-button>
                    </div>
                </x-slot>
            </x-dialog-modal>
        @endif
        @if ($actionSelect == 2)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-1 p-3">
                    <h2 class="text-3xl">Add a Barcode Value</h2>
                    @if (session()->has('message'))
                        <div class="w-full px-2 py-4 bg-green-600 text-white">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="flex gap-x-4 items-center">
                        <div>
                            <label for="" class="block">Barcode value</label>
                            <x-input type="text" aria-placeholder="Barcode Value" wire:model="barcode" />
                            @error('barcode')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="block">Section</label>
                            <x-input type="text" aria-placeholder="Barcode Value" wire:model="section" />
                            @error('section')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="block">Status</label>
                            @foreach ($statuses as $status)
                                <input type="radio" value="{{ $status->id }}" wire:model="status">
                                <label for="" class="mr-2">{{ $status->name }}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <x-button wire:click="addBarcode">Add new</x-button>
                    </div>
                </div>
            </div>
        @endif
        @if ($actionSelect == 3)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-1 p-3">
                    <h3 class="text-3xl font-semibold">CSV Import</h3>
                    <p clas="text-sm text-sm">Save time over manual data entry.</p>
                    <form wire:submit.prevent="import">
                        <input type="file" wire:model="file">

                        <div class="col-span-full">
                            {{-- <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover
                                photo</label>
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div> --}}
                        </div>
                        @error('file')
                            <p>
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            </p>
                        @enderror

                        <div class="mt-2">
                            <x-button type="submit">Upload file</x-button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

    </div>
    </div>
