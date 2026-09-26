<x-mail::message>
# Hello, {{ $user->name }}!

Welcome to our platform. We are thrilled to have you on board!

<x-mail::button :url="url('/dashboard')">
Go to Dashboard
</x-mail::button>

Thanks,<br>
Team {{ config('app.name') }}
</x-mail::message>