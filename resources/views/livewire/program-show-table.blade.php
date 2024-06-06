<div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
    <div class="flex justify-between mb-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Add</button>
        <div class="flex justify-center sm:justify-end w-full sm:w-auto">
            <input wire:model.live="search" type="text" class="border text-black border-gray-300 rounded-md p-2 w-64" placeholder="Search...">
        </div>
    </div>
    <div class="overflow-x-auto">
        @if($programs->isEmpty())
            <p class="text-black mt-10 text-center">No programs found for matching "{{ $search }}"</p>
        @else
            <table class="table-auto border-collapse border border-gray-400 w-full">
                <thead class="bg-gray-200 text-black">
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">ID</th>
                        <th class="border border-gray-400 px-4 py-2">Name</th>
                        <th class="border border-gray-400 px-4 py-2">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                    <tr>
                        <td class="text-black border border-gray-400 px-4 py-2">{{ $program->id }}</td>
                        <td class="text-black border border-gray-400 px-4 py-2">{{ $program->program_abbreviation }}</td>
                        <td class="text-black border border-gray-400 px-4 py-2">{{ $program->program_description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $programs->links() }}
        @endif
    </div>
</div>
