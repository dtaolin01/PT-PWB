{{-- Tombol Ubah & Hapus. Kirim lewat @include: edit (URL), hapus (URL), nama (untuk teks konfirmasi) --}}
<div class="flex items-center gap-2">
    <a href="{{ $edit }}" title="Ubah" class="flex h-8 w-8 items-center justify-center rounded-md bg-blue-700 text-xs text-white hover:bg-blue-800">
        <i class="fa-solid fa-pen"></i>
    </a>
    <form method="POST" action="{{ $hapus }}"
          onsubmit="return confirm({{ \Illuminate\Support\Js::from('Hapus '.$nama.'? Data yang dihapus tidak bisa dikembalikan.') }})">
        @csrf
        @method('DELETE')
        <button type="submit" title="Hapus" class="flex h-8 w-8 items-center justify-center rounded-md bg-red-600 text-xs text-white hover:bg-red-700">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</div>
