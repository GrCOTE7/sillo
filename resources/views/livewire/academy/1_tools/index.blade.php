<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new #[Title('Tools')] #[Layout('components.layouts.academy')] class extends Component {
    //
}; ?>

<div>

    <x-header class="mb-0" title="Outils préconisés" shadow separator progress-indicator />
    
@markdown
    
# Oki

```php{1,2}{3}
echo "We're highlighting line 1 and 2";
echo "And focusing line 3";
```

@endmarkdown
    <x-markdown>
        # My title

        This is a [link to our website](https://spatie.be)

        <div class="text-center">
            <p>oki</p>

            ![image](./assets/image.jpg)
        </div>

        ```php
        echo 'Hello world';
        ```
    </x-markdown>
    {{-- @endmarkdown --}}

    @php
        $content = file_get_contents(resource_path('views/livewire/academy/1_tools/README.md'));
    @endphp

    //2do Présentation des outils présentés ici + liens / page des détails

    {!! $content !!}

</div>
