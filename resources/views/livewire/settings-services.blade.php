<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
        {{ $service->title }}
    </h2>
</x-slot>

<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-1 p-3">
            <div class="border-b border-gray-200 pb-5 sm:pb-0">
                <h3 class="font-semibold leading-6 text-gray-900 mb-4 text-xl">Settings</h3>
                <div class="hidden sm:block">
                    <nav class="-mb-px flex space-x-8">
                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                        <a wire:click="selectAction('1')"
                            class="flex cursor-pointer items-center  {{ $actionSelect == '1' ? 'border-indigo-500 text-indigo-600 ' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>
                            Databases</a>
                        <a wire:click="selectAction('2')"
                            class="flex cursor-pointer items-center {{ $actionSelect == '2' ? 'border-indigo-500 text-indigo-600' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium"
                            aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                            Dors</a>
                        <a wire:click="selectAction('3')"
                            class="flex cursor-pointer items-center  {{ $actionSelect == '3' ? 'border-indigo-500 text-indigo-600' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-transparent' }} whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            Users</a>

                    </nav>
                </div>
            </div>

            @if ($actionSelect == 1)
                <p class="text-gray-800 text-md mt-6">Select the databases you want to use: </p>
                <form wire:submit.prevent="update">
                    <div class="grid grid-cols-2 gap-3 p-4">
                        @foreach ($events as $event)
                            <div>
                                <input type="checkbox" wire:model="databases" value="{{ $event->id }}">
                                {{ $event->name }} <span class="text-sm text-gray-400">({{ $event->key }})</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-end">
                        <x-button>Update</x-button>
                    </div>
                </form>
                {{-- Events: {{ var_export($databases) }} --}}
            @endif
            @if ($actionSelect == 2)
                <div>
                    {{ dd($dors) }}
                </div>
            @endif
            @if ($actionSelect == 3)
                <p class="text-gray-800 text-md mt-6">Select the users you want to use: </p>
                <form wire:submit.prevent="updateUsers">
                    <div class="grid grid-cols-2 gap-3 p-4">
                        @foreach ($users as $user)
                            <div>
                                <input type="checkbox" wire:model="scanners" value="{{ $user->id }}">
                                {{ $user->name }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-end">
                        <x-button>Update</x-button>
                    </div>
                </form>
                {{-- Events: {{ var_export($scanners) }} --}}
            @endif
        </div>
    </div>
</div>
