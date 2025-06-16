@extends('main')
@section('content')
<form action="{{ route('sops.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
  @csrf
  <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

    {{-- Title Input --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Judul SOP</label>
      <input type="text" name="title" required
        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:border-blue-500"
        placeholder="Masukkan judul SOP" />
    </div>

    {{-- File Upload Input --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Upload File PDF</label>
      <input type="file" name="file" accept="application/pdf" required
        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-200 file:text-sm file:font-semibold hover:file:bg-gray-300" />
    </div>

    {{-- Status Switch --}}
    <div class="flex items-center space-x-4">
      <label class="text-sm font-medium text-gray-700">Status</label>
      <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
        <input type="checkbox" name="status" id="status"
          class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
          checked>
        <label for="status"
          class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
      </div>
      <span id="status-text" class="text-sm text-gray-600">Aktif</span>
    </div>

  </div>

  {{-- Submit Button --}}
  <div class="pt-4">
    <button type="submit"
      class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 shadow-sm">Simpan</button>
  </div>
</form>

{{-- Toggle styling --}}
<style>
  .toggle-checkbox:checked {
    right: 0;
    border-color: #2563EB;
  }

  .toggle-checkbox:checked + .toggle-label {
    background-color: #2563EB;
  }
</style>

{{-- Script untuk teks status --}}
<script>
  const checkbox = document.getElementById('status');
  const statusText = document.getElementById('status-text');

  checkbox.addEventListener('change', function () {
    statusText.textContent = this.checked ? 'Aktif' : 'Nonaktif';
  });
</script>

@endsection