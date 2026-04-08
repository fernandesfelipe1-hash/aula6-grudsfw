@props([
    'color' => 'gray',
    'price' => 0,
    'tax' => 0
])

<div class="bg-{{ $color }} py-2 px-3 mt-4">
    <h2 class="mb-0">
        ${{ $price }}
    </h2>
    <h4 class="mt-0">
        <small>Delivery Tax: {{ $tax }}% </small>
    </h4>
</div>