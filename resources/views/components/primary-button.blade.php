<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-acento fw-bold']) }}>
    {{ $slot }}
</button>