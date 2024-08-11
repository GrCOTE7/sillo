<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use GrahamCampbell\Markdown\Facades\Markdown;

new #[Title('Tools')] #[Layout('components.layouts.academy')] class extends Component {
    public $content;
    public function mount()
    {
        $file = file_get_contents(resource_path('views/livewire/academy/1_tools/README.md'));
        $file = $this->adjustImagePaths($file);
        $this->content = Markdown::convert($file)->getContent();
    }
    private function adjustImagePaths($markdownContent)
    {
        return preg_replace_callback(
            '/!\[([^\]]*)\]\(([^)]+)\)/',
            function ($matches) {
                $altText = $matches[1];
                $path = $matches[2];

                // Ajuster le chemin en utilisant la fonction asset()
                $url = asset('assets/' . basename($path));

                return "![{$altText}]({$url})";
            },
            $markdownContent,
        );
    }
}; ?>

<div>

    <x-header class="mb-0" title="Outils préconisés" shadow separator progress-indicator />

    //2do Présentation des outils présentés ici + liens / page des détails

{{-- {{ $content }} --}}
{!! $content !!}

    @markdown
# Source

**[The GrahamCampbell Laravel-Markdown repository](https://github.com/GrahamCampbell/Laravel-Markdown)**

---

    @endmarkdown

    @markdown
# Uhhh

Sdfhsghsd sdfdsf:

- 1 Ok
- 2 Très ok
    @endmarkdown

</div>
