@php
    $config = [
        'upcoming'  => ['bg' => '#FEF3C7', 'text' => '#92400E', 'label' => 'Upcoming'],
        'ongoing'   => ['bg' => '#D1FAE5', 'text' => '#065F46', 'label' => 'Ongoing'],
        'finished'  => ['bg' => '#F3F4F6', 'text' => '#6B7280', 'label' => 'Finished'],
        'cancelled' => ['bg' => '#FEE2E2', 'text' => '#991B1B', 'label' => 'Cancelled'],
    ];
    $s = $config[$status] ?? $config['upcoming'];
@endphp
<span class="text-xs font-normal px-3 py-1 rounded-full"
      style="background:{{ $s['bg'] }};color:{{ $s['text'] }};font-family:'Syne',sans-serif;">
    {{ $s['label'] }}
</span>
