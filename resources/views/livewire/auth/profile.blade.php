<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024.
 */

use App\Models\User;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

// Définition du composant avec les attributs de titre et de mise en page
new #[Title('Profile')] #[Layout('components.layouts.auth')] class extends Component
{
	use Toast;

	// Déclaration des propriétés
	public User $user;
	public string $email                 = '';
	public string $password              = '';
	public string $password_confirmation = '';
	public bool $isStudent               = false;

	// Méthode pour initialiser le composant
	public function mount(): void
	{
		// Récupération de l'utilisateur authentifié
		$this->user = Auth::user();
		// Remplissage des données de l'utilisateur dans le formulaire
		$this->fill([
			'email'     => $this->user->email,
			'isStudent' => $this->user->isStudent,
		]);
	}

	// Méthode pour sauvegarder les modifications du profil
	public function save(): void
	{
		// Validation des données
		$data = $this->validate([
			'email'     => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
			'password'  => 'nullable|confirmed|min:8',
			'isStudent' => 'boolean',
		]);

		// Hashage du mot de passe
		if (empty($data['password']))
		{
			unset($data['password']);
		}
		else
		{
			$data['password'] = Hash::make($data['password']);
		}

		// Mise à jour des données de l'utilisateur
		$this->user->update($data);

		// Affichage d'un message de succès
		$this->success(__('Profile updated with success.'), redirectTo: '/profile');
	}

	// Méthode pour supprimer le compte utilisateur
	public function deleteAccount(): void
	{
		// Suppression du compte utilisateur
		$this->user->delete();
		// Affichage d'un message de succès
		$this->success(__('Account deleted with success.'), redirectTo: '/');
	}

	// Méthode pour générer un mot de passe sécurisé
	public function generatePassword($length = 16): void
	{
		// Génération d'un mot de passe aléatoire
		$this->password              = Str::random($length);
		$this->password_confirmation = $this->password;
	}
}; ?>

<div>
    <!-- Formulaire de mise à jour du profil -->

    <x-card class="flex items-center justify-center h-screen" title="">

        <a href="/" title="{{ __('Go on site') }}">
            <x-card class="items-center py-0" title="{{ __('My personal informations') }}" shadow separator
                progress-indicator></x-card>
        </a>

        <x-form wire:submit="save">

            <!-- Avatar de l'utilisateur -->
            <x-avatar :image="Gravatar::get($user->email)" class="!w-24">
                <!-- Nom et prénom de l'utilisateur -->
                <x-slot:title class="pl-2 text-xl">
                    {{ $user->name }}
                </x-slot:title>
                <!-- Informations supplémentaires -->
                <x-slot:subtitle class="flex flex-col gap-1 pl-2 mt-2 text-gray-500">
                    <x-icon name="o-hand-raised" label="{!! __('Your name can\'t be changed') !!}" />
                    <a href="https://fr.gravatar.com/">
                        <x-icon name="c-user" label="{{ __('You can change your profile picture on Gravatar') }}" />
                    </a>
                </x-slot:subtitle>
            </x-avatar>

            <!-- Champ d'email -->
            <x-input label="{{ __('E-mail') }}" wire:model="email" icon="o-envelope" required />

            <hr>

            <!-- Champ de mot de passe -->
            <x-input label="{{ __('Password') }}" wire:model="password" icon="o-key" />
            <!-- Confirmation du mot de passe -->
            <x-input label="{{ __('Confirm Password') }}" wire:model="password_confirmation" icon="o-key" />
            <!-- Bouton pour générer un mot de passe sécurisé -->
            <x-button label="{{ __('Generate a secure password') }}" wire:click="generatePassword()" icon="m-wrench"
                class="btn-outline btn-sm" />
            <!-- Option pour devenir étudiant -->
            <x-popover>
                <x-slot:trigger>
                    <x-checkbox label="{{ __('Academy access') }}" wire:model="isStudent" />
										{{-- //2do here btn pour accès direct academy si coché  --}}
                </x-slot:trigger>
                <x-slot:content class="pop-small">
                    @lang('Gives access to numerous helping scripts, spaces to test...')
                </x-slot:content>
            </x-popover>
			<p class="text-xs text-gray-500"><span class="text-red-600">*</span> @lang('Required information')</p>

            <!-- Actions du formulaire -->
            <x-slot:actions>
                <!-- Bouton pour annuler -->
                <x-button label="{{ __('Cancel') }}" link="/" class="btn-ghost" />
                <!-- Bouton pour supprimer le compte -->
                <x-button label="{{ __('Delete account') }}" icon="c-hand-thumb-down"
                    wire:confirm="{{ __('Are you sure to delete your account?') }}" wire:click="deleteAccount"
                    class="btn-warning" />
                <!-- Bouton pour sauvegarder les modifications -->
                <x-button label="{{ __('Save') }}" icon="o-paper-airplane" spinner="save" type="submit"
                    class="btn-primary" />
            </x-slot:actions>

        </x-form>
    </x-card>
</div>
