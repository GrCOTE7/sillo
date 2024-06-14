<?php

use Livewire\Volt\Component;

new class extends Component {
    public $action;
    public $title;
    public $placeholder = '';
    public $cancelBtn = false;
}; ?>

<div>
    FORM HELPER
    <x-card title="{{ __($title) }}" shadow="hidden">
        <x-form wire:submit="createComment" class="mb-4">
            <x-textarea 
                label="" 
                wire:model="message"
                placeholder="{{ $placeholder ? __($placeholder) . '...' : '' }}" hint="{{ __('Max 1000 chars') }}"
                rows="1" 
                inline
            />
            <x-slot:actions>
                @if ($cancelBtn)
                    <!-- Bouton pour annuler la réponse -->
                    <x-button label="{{ __('Cancel') }}" wire:click="toggleAnswerForm(false)" class="btn-ghost" />
                @endif
                <!-- Bouton pour sauvegarder la réponse -->
                <x-button label="{{ __('Save') }}" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
{{-- 
<div>
    <x-card title="{{ __('Leave a comment') }}" shadow="hidden">
            <x-form wire:submit="createComment" class="mb-4">
                <x-textarea
                    label=""
                    wire:model="message"
                    placeholder="{{ __('Your comment') }} ..."
                    hint="{{ __('Max 1000 chars') }}"
                    rows="5"
                    inline />        
                <x-slot:actions>
                    <x-button label="{{ __('Save') }}" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        </x-card>
</div> 
--}}
