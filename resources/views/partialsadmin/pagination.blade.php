{{-- Paginasi. Kirim paginator lewat @include: ['data' => $data] --}}
@if ($data->total() === 0)
    <p class="mt-5 text-sm font-bold text-slate-800">Belum ada data.</p>
@else
    @php $kotak = 'flex h-9 w-9 items-center justify-center rounded-md border border-pwb-line bg-white'; @endphp
    <div class="mt-5 flex items-center justify-between">
        <p class="text-sm font-bold text-slate-800">Menampilkan {{ $data->firstItem() }}-{{ $data->lastItem() }} dari {{ $data->total() }} data</p>

        @if ($data->hasPages())
            <div class="flex items-center gap-2 text-sm">
                @if ($data->onFirstPage())
                    <span class="{{ $kotak }} opacity-40">‹</span>
                @else
                    <a href="{{ $data->previousPageUrl() }}" class="{{ $kotak }}">‹</a>
                @endif

                @foreach ($data->getUrlRange(1, $data->lastPage()) as $halaman => $url)
                    @if ($halaman === $data->currentPage())
                        <span class="flex h-9 w-9 items-center justify-center rounded-md bg-pwb-blue font-bold text-white">{{ $halaman }}</span>
                    @else
                        <a href="{{ $url }}" class="{{ $kotak }}">{{ $halaman }}</a>
                    @endif
                @endforeach

                @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}" class="{{ $kotak }}">›</a>
                @else
                    <span class="{{ $kotak }} opacity-40">›</span>
                @endif
            </div>
        @endif
    </div>
@endif
