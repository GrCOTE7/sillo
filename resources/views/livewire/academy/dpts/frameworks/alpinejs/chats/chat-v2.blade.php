<?php
include_once 'chat-v2.php';
?>

<div x-data="{ open: true }">

    <div :class="{ '-translate-y-0': open, 'translate-y-full': !open }"
        class="fixed transition-all duration-300 transform bottom-52 right-8 h-60 w-80" id='chatBlock'>
        <div class="mb-2">
            <button @click="open = !open" type="button"
                :class="{ 'text-indigo-600 dark:text-white hover:bg-transparent': open }"
                class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-indigo-400 dark:bg-indigo-600 dark:hover:bg-indigo-400">
                Chat

                <x-heroicon-o-chevron-up x-show="!open" x-cloak class="ms-auto block size-4" />
                <x-heroicon-o-chevron-down x-show="open" x-cloak class="ms-auto block size-4" />

            </button>
        </div>
        <div
            class="w-full h-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded overflow-auto flex flex-col px-2 py-4">
            <div x-ref="chatBox" class="flex-1 p-4 text-sm flex flex-col gap-y-1">
                @foreach ($messages as $message)
                    <div><span class="text-indigo-600">{{ $message['name'] }}:</span> <span
                            class="dark:text-white">{{ $message['message'] }}</span></div>
                @endforeach
            </div>
            <div>
                <x-header shadow separator progress-indicator />
                <form wire:submit.prevent="addMessage" class="flex gap-2">
                    <x-input wire:model="message" x-ref="messageInput" name="message" id="message"
                        class="block w-full" input="v2" />
                    <x-button class='btn-outline btn-primary'>
                        Send
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const chatBlock = document.getElementById('chatBlock');
            if (chatBlock) {
                chatBlock.classList.remove('hidden');
                chatBlock.classList.add('block');
            }
        }, 5000);
    });
</script> --}}
