@props(['buttonId' => '', 'loaderId' => '', 'iconName' => '', 'iconId' => ''])

<button {{ $attributes->merge(['class' => 'main-btn']) }} id="{{ $buttonId }}">
    <x-fetch-loader class="button-loader" id="{{ $loaderId }}" style="display: none;" />
    <span class="btn-icon" id="{{ $iconId }}">
        <i class="fa-solid {{ $iconName }}"></i>
    </span>
    <span class="btn-text">
        {{ $slot }}
    </span>
</button>
