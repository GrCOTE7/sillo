<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new #[Title('Tools')] #[Layout('components.layouts.academy')] 
class extends Component {
    //
}; ?>

<div>
    @php
        $content = file_get_contents(resource_path('views/livewire/academy/1_tools/README.md'));
    @endphp
    <x-header class="mb-0" title="Outils préconisés" shadow separator progress-indicator />

    //2do Présentation des outils présentés ici + liens / page des détails
    
    {!! $content !!}
    
</div>
