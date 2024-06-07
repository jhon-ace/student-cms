<div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
    <div class="flex justify-between mb-4">
        <a href="{{ route('program.create') }}">
            <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">
                <i class="fa-solid fa-plus fa-sm" style="color: #ffffff;"></i> Add
            </button>
        </a>
        <div class="flex justify-center sm:justify-end w-full sm:w-auto">
            <input wire:model.live="search" type="text" class="border text-black border-gray-300 rounded-md p-2 w-64" placeholder="Search...">
        </div>
    </div>
    <div class="overflow-x-auto">
        @if($programs->isEmpty())
            <p class="text-black mt-10 text-center">No program found for matching "{{ $search }}"</p>
        @else
            <table class="table-auto border-collapse border border-gray-400 w-full text-center mb-4">
                <thead class="bg-gray-200 text-black">
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">
                            <button wire:click="sortBy('program_abbreviation')" class="w-full h-full flex items-center justify-center">
                                Program Abbreviation
                                @if ($sortField == 'program_abbreviation')
                                    @if ($sortDirection == 'asc')
                                        &nbsp;<i class="fa-solid fa-down-long fa-xs"></i>
                                        @else
                                        &nbsp;<i class="fa-solid fa-up-long fa-xs"></i> 
                                    @endif
                                @endif
                            </button>
                        </th>
                        <th class="border border-gray-400 px-4 py-2">
                            <button wire:click="sortBy('program_description')" class="w-full h-full flex items-center justify-center">
                                Program Description
                                @if ($sortField == 'program_description')
                                    @if ($sortDirection == 'asc')
                                        &nbsp;<i class="fa-solid fa-down-long fa-xs"></i>
                                        @else
                                        &nbsp;<i class="fa-solid fa-up-long fa-xs"></i> 
                                    @endif
                                @endif
                            </button>
                        </th>
                        <th class="border border-gray-400 px-4 py-2">
                            <button wire:click="sortBy('status')" class="w-full h-full flex items-center justify-center">
                                Program Status
                                @if ($sortField == 'status')
                                    @if ($sortDirection == 'asc')
                                        &nbsp;<i class="fa-solid fa-down-long fa-xs"></i>
                                        @else
                                        &nbsp;<i class="fa-solid fa-up-long fa-xs"></i> 
                                    @endif
                                @endif
                            </button>
                        </th>
                        <th class="border border-gray-400 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                        <tr>
                            <td class="text-black border border-gray-400 px-4 py-2">{{ $program->program_abbreviation }}</td>
                            <td class="text-black border border-gray-400 px-4 py-2">{{ $program->program_description }}</td>
                            <td class="text-black border border-gray-400 px-4 py-2">{{ $program->status }}</td>
                            <td class="text-black border border-gray-400 px-4 py-2">
                                <a href="{{ route('program.edit', $program->id) }}">
                                    <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">
                                        <i class="fas fa-edit fa-sm"></i> Edit
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $programs->links() }}
        @endif
    </div>
</div>
