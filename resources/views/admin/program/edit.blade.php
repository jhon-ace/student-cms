<x-system-layout>
<x-user-route-page-name :routeName="'program.edit'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Edit Program</div>
                    <div class="container mx-auto p-4">
                        <div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
                            <div class="flex justify-end mb-4">
                                <a href="{{ route('program.index') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Back to list</button></a>
                            </div>
                            <form action="{{ route('program.update', $program->id) }}" method="POST" class="">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 text-md font-bold mb-2">Program Abbreviation:</label>
                                    <input type="text" name="program_abbreviation" id="name" value="{{ old('program_abbreviation', $program->program_abbreviation) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 text-md font-bold mb-2">Program Description:</label>
                                    <input type="text" name="program_description" id="name" value="{{ old('program_description', $program->program_description) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mt-4">
                                    <label for="status" class="block text-gray-700 text-md font-bold mb-2">Status:</label>
                                    <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autocomplete="status">
                                        @if($program->status)
                                            <option value="{{ $program->status }}" selected>{{ $program->status }}</option>
                                        @else
                                            <option value="" selected>Select status</option>
                                            <option value="Offered" selected>Offered</option>
                                        @endif
                                        <option value="Offered">Offered</option>
                                        <option value="Not yet offered">Not yet offered</option>
                                    </select>
                                </div>
                                <div class="flex  mb-4 mt-5 justify-center">
                                        <button type="submit" class="w-80 bg-blue-500 text-white px-4 py-2 rounded-md">
                                            <i class="fa-solid fa-pen" style="color: #ffffff;"></i> Update
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-system-layout>