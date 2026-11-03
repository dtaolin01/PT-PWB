{{-- Paginasi tampilan saja (belum fungsional). Nanti ganti dengan {{ $data->links() }} --}}
<div class="mt-5 flex items-center justify-between">
    <p class="text-sm font-bold text-slate-800">{{ $info }}</p>
    <div class="flex items-center gap-2 text-sm">
        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-md border border-pwb-line bg-white">‹</a>
        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-md bg-pwb-blue font-bold text-white">1</a>
        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-md border border-pwb-line bg-white">2</a>
        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-md border border-pwb-line bg-white">3</a>
        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-md border border-pwb-line bg-white">›</a>
    </div>
</div>
