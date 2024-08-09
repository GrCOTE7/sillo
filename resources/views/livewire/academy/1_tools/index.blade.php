<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use GrahamCampbell\Markdown\Facades\Markdown;

new #[Title('Tools')] #[Layout('components.layouts.academy')] class extends Component {
    public $content;
    public function mount()
    {
        $file = file_get_contents(resource_path('views/livewire/academy/1_tools/README.md'));
        $this->content = Markdown::convert($file)->getContent();
    }
}; ?>

<div>

    <x-header class="mb-0" title="Outils préconisés" shadow separator progress-indicator />

    //2do Présentation des outils présentés ici + liens / page des détails

    {!! $content !!}


    @markdown
# Ohohoh
        
---
    @endmarkdown

@markdown

---

# Uhhh

Sdfhsghsd sdfdsf:

    - 1 Ok
    - 2 Très ok

@endmarkdown

</div>
