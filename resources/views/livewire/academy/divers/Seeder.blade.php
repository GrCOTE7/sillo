<?php
include_once 'Seeder.php';
?>

<div>
    <x-header title="Seeder" shadow separator progress-indicator>
    </x-header>

    {{-- @dump($users[0]) --}}
    
    @foreach ($users as $user)
        {{  $user->firstname }}
        {{  $user->name }}
        <br>
    @endforeach

</div>
