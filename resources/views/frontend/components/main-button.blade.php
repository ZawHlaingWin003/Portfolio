@props(['buttonId' => '', 'iconName' => ''])

<button {{ $attributes->merge(['class' => 'main-btn']) }} id="{{ $buttonId }}">
    <span class="btn-loader" id="{{ $buttonId }}-loader" style="display: none;">
        <x-fetch-loader class="button-loader" />
    </span>
    <span class="btn-icon" id="{{ $buttonId }}-icon">
        <i class="fa-solid {{ $iconName }}"></i>
    </span>
    <span class="btn-text">
        {{ $slot }}
    </span>
</button>
