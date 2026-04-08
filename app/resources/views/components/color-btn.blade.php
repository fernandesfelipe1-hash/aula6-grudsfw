@props([
    'name' => '',
    'color' => ''
])

<label class="btn btn-default text-center active">
    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
    {{ $name }}
    <br>
    <i class="fas fa-circle fa-2x text-{{ $color }}"></i>
</label>