<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024.
 */

use App\Models\Quiz;
use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

new
#[Title('Quizzes'), Layout('components.layouts.admin')]
class extends Component {
    use Toast;
    use WithPagination;

    public array $sortBy = ['column' => 'title', 'direction' => 'asc'];

    // Définir les en-têtes de la table
    public function headers(): array
    {
        return [
            ['key' => 'title', 'label' => __('Title')],
            ['key' => 'user_name', 'label' => __('Creator')],
            ['key' => 'post_title', 'label' => __('Post')],
            ['key' => 'description', 'label' => __('Description')],
        ];
    }

    // Supprimer un quiz
    public function deleteQuiz(Quiz $quiz): void
    {
        $quiz->delete();
        $this->success(__('Quiz deleted'));
    }

    // Fournir les données nécessaires à la vue
    public function with(): array
    {
        return [
            'quizzes' => Quiz::select('id', 'title', 'description')
                                ->orderBy(...array_values($this->sortBy))
                                ->when(!Auth::user()->isAdmin(), fn (Builder $q) => $q->where('user_id', Auth::id()))
                                ->withAggregate('user', 'name')
                                ->withAggregate('post', 'title')
                                ->paginate(10),
            'headers' => $this->headers(),
        ];
    }
}; ?>

<div>
    <x-header title="{{__('Quizzes')}}" separator progress-indicator>
		<x-slot:actions>
		<x-button label="{{ __('Add a quiz') }}" class="btn-outline" link="{{ route('quizzes.create') }}" />
		</x-slot:actions>
	</x-header>

    <x-card>
        <x-table :headers="$headers" :rows="$quizzes" :sort-by="$sortBy" link="/admin/quizzes/{id}/edit">
            @scope('actions', $quiz)
            <x-popover>
                <x-slot:trigger>
                    <x-button 
                        icon="o-trash" 
                        wire:click="deleteQuiz({{ $quiz->id }})" 
                        wire:confirm="{{ __('Are you sure to delete this quiz?') }}" 
                        spinner 
                        class="text-red-500 btn-ghost btn-sm" />          
                </x-slot:trigger>
                <x-slot:content class="pop-small">
                    @lang('Delete')
                </x-slot:content>
            </x-popover>
          @endscope
        </x-table>
    </x-card>
</div>
