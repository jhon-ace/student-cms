<!-- <div class="bg-white shadow-lg rounded-md  p-10  text-black font-medium "> -->
<div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
    <div class="flex justify-center sm:justify-end mb-4 w-full">
        <input wire:model="search" type="text" class="border text-black border-gray-300 rounded-md p-2 w-64" placeholder="Search...">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="table-auto border-collapse border border-gray-400 w-full">
            <thead class="bg-gray-200 text-black">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">ID</th>
                    <th class="border border-gray-400 px-4 py-2">Name</th>
                    <th class="border border-gray-400 px-4 py-2">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td class="border border-gray-400 px-4 py-2">{{ $program->id }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $program->program_abbreviation }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $user->program_description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    {{ $programs->links() }}

</div>

