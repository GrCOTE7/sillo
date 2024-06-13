<?php
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new 
// #[Layout('components.layouts.auth')] 
class extends Component {
    // Propriétés de la classe
    // public ?data $data = null; // Série actuelle (ou null si aucune)

    public string $text = 'abc';
    // public int $charsNbLeft;
    public int $charsMax;
    public $var = 3;
    public $value = 55;
    public $textareaContent = 'abc';

    /**
     * Méthode de montage initiale appelée lors de la création du composant.
     */
    public function mount(): void
    {
        // $this->charsMax = env('APP_NUMBER_OF_CHARS_IN_COMMENTS_FORM', 700) ?? 700;
        // $this->charsNbLeft = $this->charsMax;
        $this->textareaContnet = 'xyz';
    }

    public function updatedText()
    {
        // $this->charsNbLeft = $this->charsMax - strlen($this->text);
        // $this->var *= 2;
    }

    public function updateCharsNbLeft()
    {
        $this->charsNbLeft = $this->charsMax - strlen($this->text);
    }
    // update lié au meilleur choix
    public function updatedTextareaContent()
    {
        // $this->textareaContent = substr($this->textareaContent, 0, 12);
        $this->charsNbLeft = $this->charsMax - strlen($this->textareaContent);
    }

    public function save_form()
    {
        echo 'save_form()';
        error_log(
            'updatedText has been called: ' .
                $this->text .
                '
			',
            3,
            'error.log',
        );
    }

    // Définit les variables passées à la vue.
    public function with(): array
    {
        return [
                // 'charsNbLeft' => $this->charsNbLeft,
                // 'var' => 789,
            ];
    }
};
?>
<x-textarea id="msg" maxlength="20" />
<p id="count"><br><br></p>

{{-- Meilleur choix  --}}
{{-- wire:ignore  --}}
{{-- ; $wire.call('updateCharsNbLeft'); --}}
{{-- wire:dirty.class="border-yellow" --}}
<div x-data="{ text: '', maxChars: '{{ $this->charsNbLeft }}' }">aaa
    <x-textarea wire:model="textareaContent" wire:dirty.class="border-yellow"
        x-on:input="text = $event.target.value.slice(0, maxChars) " maxlength="{{ $charsNbLeft }}" />
    <p
        x-text="
    (charsNbLeft = maxChars - text.length) + ' caractères restants {{ __('Home') }} - ' +
     charsNbLeft+ ' - {{ trans_choice('uuu :nbCharsLeft', 2, ['charsNbLeft' => $charsNbLeft]) }}  '">
    </p>

    {{--     
    +'
    
    {{ trans_choice('Left: :n chars', '+charsNbLeft+', ['charsNbLeft' => '+charsNbLeft+', 'charsMax' => '+maxChars+']) }}' --}}
    {{-- <hr class="my-3">
    <p x-text="text"></p>
    <hr class="my-3">
    {{ trans_choice('Left: :charsNbLeft chars', $charsNbLeft, ['charsNbLeft' => $charsNbLeft, 'charsMax' => $this->charsMax]) }} --}}
    {{-- </p> --}}
</div>

{{-- $this->charsNbLeft: {{ $this->charsNbLeft ?? 'undefined' }} --}}

{{-- <hr class="my-3"> --}}
{{-- <x-card title="{{ __('Edit a comment') }}" shadow separator progress-indicator>
    <x-form wire:submit="save_form">
        <x-textarea wire:model="text" label="{{ __('Content') }}" hint="{{ __('Max n chars') }}" rows="5"
            inline></x-textarea>
        <x-slot:actions>
            <x-button label="{{ __('Cancel') }}" icon="o-hand-thumb-down" class="btn-outline"
                link="/admin/comments/index" />
            <x-button label="{{ __('Save') }}" icon="o-paper-airplane" spinner="save" type="submit"
                class="btn-primary" />
        </x-slot:actions>
        Nb chars: {{ $nbchars }}
    </x-form>
</x-card> --}}
{{-- wire:dirty.class="border-yellow" --}}

{{-- 
@php
    // $max_chars = 777;
@endphp
{{-- <div wire:ignore>
<x-textarea wire:model.live.debounce.10ms="text" label="{{ __('Content') }}" rows="5" inline
    hint="{{ trans_choice('Left: :charsNbLeft chars', $charsNbLeft, ['charsNbLeft' => $charsNbLeft, 'charsMax' => $this->charsMax]) }}">
    <textarea id="myTextarea"></textarea>
</x-textarea>
{{-- </div> --}}
{{-- 
<br>
$this->charsNbLeft: {{ $this->charsNbLeft ?? 'undefined' }}
<br>
$charsNbLeft: {{ $charsNbLeft ?? 'undefined' }}
<br>
<br>
$this->charsMax: {{ $this->charsMax ?? 'undefined' }}
<br>
<br>
$charsMax: {{ $charsMax ?? 'undefined' }}
<br>

$this->var: {{ $this->var ?? 'undefined' }}
<br>
$var: {{ $var ?? 'undefined' }}
<br> --}}
{{-- <script>
    document.addEventListener('livewire:update', function() {
        document.getElementById('myTextarea').focus();
        console.log('ok');
    });
</script> --}}
