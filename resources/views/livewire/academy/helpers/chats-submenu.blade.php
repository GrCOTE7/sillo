<?php
use Livewire\Volt\Component;

new class() extends Component
{
	public $btns;
	public $nochoice;
	public $btn;
};
?>

<div x-data="{
    choice: null,
    btns: {{ json_encode($btns) }},
    isVisible(btn) {
        return this.choice === btn;
    },
    focusInput(btn) {
        if (!btn) return; // Ajout de cette vérification
        setTimeout(() => {
            const input = document.querySelector(`input[input=${btn.toLowerCase()}]`);
            if (input) {
                console.log(`Trouvé elt input ${btn.toLowerCase()} pour focus()`);
                input.focus();
            }
        }, 700);
    }
}" x-init="$watch('choice', value => {
    if (value) focusInput(value);
});
document.addEventListener('DOMContentLoaded', () => focusInput('v1'));
window.addEventListener('focus', () => focusInput(choice || 'v1'));">


    <div class="w-full flex justify-evenly items-center mb-0 mt-[-27px] p-0">

        <template x-for="btn in btns" :key="btn">

            <button class='pb-0 mb-0 mr-3 btn btn-sm' :class="choice !== btn ? 'btn-primary' : 'btn-secondary'"
                x-on:click="choice = btn; console.log('choice = ' + choice); $dispatch('update-subtitle', { newSubtitle: btn })"
                :id="btn">
                <span x-text="btn"></span>
            </button>

        </template>

        <p class="flex items-center justify-between w-1/4">N.B.:
            <x-icon name="o-academic-cap" class="w-7 h-7 text-cyan-500" />
            <x-icon-smiley />
        </p>
    </div>

    <hr class="mb-1">

    {{-- Choice: <span x-text="choice"></span> --}}

    {!! $nochoice !!}

    @foreach ($btns as $btn)
        <div x-cloak x-transition.opacity.duration.700ms x-show="choice === '{{ $btn }}'">
            <div wire:key="chat-title-component-{{ $btn }}">
                @livewire('academy.dpts.frameworks.alpinejs.chats.chat-title', ['btn' => $btn, key('chat-' . $btn)])
            </div>
        </div>
    @endforeach

    {{-- <ul class="flex flex-col h-[calc(100vh-700px)]"> --}}
    <ul class="flex flex-col h-[calc(100vh-100px)] top-96">
        @foreach ($btns as $btn)
            <li class="h-full" x-cloak x-transition.opacity.duration.700ms x-show="isVisible('{{ $btn }}')"
                x-effect="if (isVisible('{{ $btn }}')) { focusInput() }">

                <div class="h-full overflow-y-auto" wire:key="chat-component-{{ $btn }}">
                    @livewire('academy.dpts.frameworks.alpinejs.chats.chat-' . strtolower($btn), key('chat-' . $btn))
                </div>
            </li>
        @endforeach
    </ul>

<script>
    window.onload = function() {

        setTimeout(function() {

            // Choix du bouton cliqué par défaut
            let btn = null; // Default: null or 'V1' or 'V2'
            if (!btn) {
                console.log('Pas de bouton cliqué par défaut')
            } else {

                console.log('Je clique sur ' + btn);
                const btnTabs = document.querySelector('button[id=' + btn + ']');
                if (btnTabs) {
                    btnTabs.click();
                } else {
                    console.log("Le bouton '" + btn + "' n'a pas été trouvé.");
                }
            }
        }, 100); // Attend .1 seconde avant d'exécuter le script
    };
</script>

</div>
