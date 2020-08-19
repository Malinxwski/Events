@component('mail::message')
# Приглашение

Уважаемый {{$name}} {{$surname}}, вы были приглашены на мероприятие {{ $eventName }}, которое состоится
в городе {{$eventCity}} в {{$eventDate}}.



Спасибо,<br>
{{ config('app.name') }}
@endcomponent

