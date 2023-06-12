<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scanner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form wire:submit.prevent='scanBarcode'>
                    <div class="mx-auto p-4 text-center">
                        <x-label class="mb-4" value="Codigo:" />
                        <x-input class="w-full text-center" type="text" wire:model="barcode" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            window.addEventListener('valid', event => {
                Swal.fire({
                    title: event.detail.title,
                    html: event.detail.html,
                    icon: event.detail.icon,
                    timer: event.detail.timer,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            });
        </script>
    @endpush
</div>
