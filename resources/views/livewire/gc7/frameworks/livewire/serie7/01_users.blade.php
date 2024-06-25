<?php
include_once '01_users.php';
?>

<div>
    <x-header class="mb-0 pt-3" title="Série 7 - Users" shadow separator progress-indicator></x-header>

    <section class="mt-5">
        <div class="max-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                <div class="flex items-center justify-between p-4 my-2">
                    <div class="flex w-full justify-between">
                        <div class="relative x-full ml-3">
                            <x-input type="text" class="bg-gray-700 border border-gray-300" wire:model.live.debounce.300ms="search" placeholder="Search..."
                                required />
                        </div>
                        <p class="mr-5 text-right italic">Owner: {{ $name }}</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 rounded">
                        <thead class="text-xs text-gray-400 uppercase">
                            <tr>
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $user->id }}</td>
                                    <td class="px-4 py-3">{{ $user->firstname }} {{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">{{ $user->gender }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-3" colspan="4">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="py-4 px-3">
                    <div class="flex space-x-4 iems-center mb-3">
                        <labelfor="PerPage">Per Page</labelfor=>
                        <select class="ml-4" wire:model.live="perPage" name="" id="">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class="flex flex-wrap">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>