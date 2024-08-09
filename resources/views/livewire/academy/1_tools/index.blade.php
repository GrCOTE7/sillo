<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new #[Title('Tools')] #[Layout('components.layouts.academy')] class extends Component {
    //
}; ?>

<div>
    <x-header class="mb-0" title="Outils préconisés" shadow separator progress-indicator />

    //2do Présentation des outils présentés ici + liens / page des détails

    <x-markdown>
        @include('livewire.academy.1_tools/README.md')
    </x-markdown>

</div>
