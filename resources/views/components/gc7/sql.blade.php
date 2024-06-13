<?php
use Livewire\Volt\Component;

new class extends Component {
    public $db_connection;

    public function mount(): void
    {
        $this->db_connection = env('DB_CONNECTION', 'mysql');
    }

    public function with(): array
    {
        return [
            'db_connection' => $this->db_connection,
        ];
    }
}; ?>

<div class="relative grid items-center w-full px-1 py-1 mx-auto md:px-1 max-w-7xl">
    <p>{{ $this->db_connection }}</p>
</div>
