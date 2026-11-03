@props(['warna' => 'blue'])
@php
    $kelas = [
        'green' => 'bg-green-100 text-green-600',
        'blue'  => 'bg-blue-100 text-blue-700',
        'red'   => 'bg-red-100 text-red-600',
        'amber' => 'bg-amber-100 text-amber-700',
    ][$warna] ?? 'bg-slate-100 text-slate-600';
@endphp
<span {{ $attributes->merge(['class' => "inline-flex items-center justify-center rounded-full px-4 py-1.5 text-xs font-bold $kelas"]) }}>
    {{ $slot }}
</span>
