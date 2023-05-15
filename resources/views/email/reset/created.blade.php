<x-mail::message>
# Mot de passe oublié

Vous recevez cet e-mail suite à votre demande de réinitialisation du mot de passe de votre compte.

<x-mail::button :url="$url">
   Reinitialisation
</x-mail::button>

Ce lien de réinitialisation du mot de passe expirera dans 60 minutes.
Si vous n'avez pas demandé de réinitialisation du mot de passe, aucune action supplémentaire n'est requise.

Bien à vous,<br>
{{ config('app.name') }}
</x-mail::message>
