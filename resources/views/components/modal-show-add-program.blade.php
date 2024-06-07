<!-- resources/views/components/modal.blade.php -->
<div id="{{ $id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="modal-overlay fixed inset-0 bg-black opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">{{ $title }}</p>
                <span id="closeModal" class="text-2xl cursor-pointer">&times;</span>
            </div>
            <!-- Modal content -->
            {{ $slot }}
        </div>
    </div>
</div>
