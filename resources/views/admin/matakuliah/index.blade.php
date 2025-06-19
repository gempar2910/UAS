@extends('admin.layouts.app')



    {{-- Modal Edit --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 transition duration-300">
        <div class="bg-white p-6 rounded shadow w-full max-w-md transform transition-all scale-95 opacity-0">
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <h2 class="text-xl font-semibold mb-4">Edit Mata Kuliah</h2>

                <div class="mb-3">
                    <label class="block mb-1 text-sm">Kode Mata Kuliah</label>
                    <input type="text" name="kode" id="editKode" required class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-3">
                    <label class="block mb-1 text-sm">Nama Mata Kuliah</label>
                    <input type="text" name="nama" id="editNama" required class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm">SKS</label>
                    <input type="number" name="sks" id="editSks" required class="w-full border rounded px-3 py-2">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Delete Confirmation --}}
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 transition duration-300">
        <div class="bg-white p-6 rounded shadow w-full max-w-sm transform transition-all scale-95 opacity-0 text-center">
            <h2 class="text-xl font-semibold mb-4">Hapus Mata Kuliah?</h2>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Ya, Hapus</button>
                <button type="button" onclick="closeDeleteModal()" class="ml-2 px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</button>
            </form>
        </div>
    </div>

    <script>
        function openCreateModal() {
            const modal = document.getElementById('createModal');
            const content = modal.querySelector('div');
            modal.classList.remove('hidden');
            setTimeout(() => content.classList.remove('scale-95', 'opacity-0'));
            setTimeout(() => content.classList.add('scale-100', 'opacity-100'), 10);
        }
        function closeCreateModal() {
            const modal = document.getElementById('createModal');
            const content = modal.querySelector('div');
            content.classList.add('scale-95', 'opacity-0');
            content.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        function openEditModal(data) {
            document.getElementById('editKode').value = data.kode;
            document.getElementById('editNama').value = data.nama;
            document.getElementById('editSks').value = data.sks;
            document.getElementById('editForm').action = `/admin/matakuliah/${data.id}`;

            const modal = document.getElementById('editModal');
            const content = modal.querySelector('div');
            modal.classList.remove('hidden');
            setTimeout(() => content.classList.remove('scale-95', 'opacity-0'));
            setTimeout(() => content.classList.add('scale-100', 'opacity-100'), 10);
        }
        function closeEditModal() {
            const modal = document.getElementById('editModal');
            const content = modal.querySelector('div');
            content.classList.add('scale-95', 'opacity-0');
            content.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = `/admin/matakuliah/${id}`;
            const modal = document.getElementById('deleteModal');
            const content = modal.querySelector('div');
            modal.classList.remove('hidden');
            setTimeout(() => content.classList.remove('scale-95', 'opacity-0'));
            setTimeout(() => content.classList.add('scale-100', 'opacity-100'), 10);
        }
        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const content = modal.querySelector('div');
            content.classList.add('scale-95', 'opacity-0');
            content.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }
    </script>
@endsection
