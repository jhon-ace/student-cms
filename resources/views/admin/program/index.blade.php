<x-system-layout>
    <x-user-route-page-name :routeName="'admin.program.index'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48">
            <div class="max-w-full mx-auto mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10">
                <div class="text-gray-500 text-md ml-5 sm:ml-10 md:ml-15 lg:ml-12">Manage Program</div>
                <div class="grid grid-cols-1 p-4 rounded-md sm:px-24 md:px-12 lg:px-10 xl:px-10">
                    <livewire:program-show-table />
                </div>
            </div>
        </div>
    </div>
</x-system-layout>

