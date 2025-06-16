@extends ('main')
@section('content')
<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
  <!-- Header dan tombol -->
  <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Data Dokumen</h3>

    <div class="flex items-center gap-3">
      <!-- Tombol Tambah -->
    <form action="{{ route('sops.create') }}" method="GET">
      <button
        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-400 shadow cursor-not-allowed dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
      >
        Tambah
      </button>
    </form>
    </div>
  </div>

  <!-- Tabel -->
  <div class="w-full overflow-x-auto">
    <table class="min-w-full">
      <thead>
        <tr class="border-y border-gray-100 dark:border-gray-800 text-left text-xs text-gray-500 dark:text-gray-400">
          <th class="py-3">Judul</th>
          <th class="py-3">File</th>
          <th class="py-3">Tanggal Publikasi</th>
          <th class="py-3">Status</th>
          <th class="py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-sm text-gray-700 dark:text-gray-300">
        @foreach ($sops as $item)
          <tr class="border-b border-gray-100 dark:border-gray-800">
            <td class="py-3">{{ $item->title }}</td>
            <td class="py-3">
              <span class="text-blue-600">{{ $item->file }}</span>
            </td>
            <td class="py-3">{{ \Carbon\Carbon::parse($item->publish_date)->format('d M Y') }}</td>
            <td class="py-3">
              <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer" {{ $item->status === 'aktif' ? 'checked' : '' }} disabled />
                <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:bg-green-500 transition-all duration-300"></div>
              </label>
            </td>
            <td class="py-3 text-center">
              <div class="flex items-center justify-center gap-2 text-sm text-gray-400">
                <span class="cursor-not-allowed">Edit</span>
                <span class="cursor-not-allowed">Hapus</span>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection