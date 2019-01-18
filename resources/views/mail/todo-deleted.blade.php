@component('mail::message')
# Todo: {{$todo->title}} has been Deleted 

This is to inform you that the task  {{$todo->title}} has been deleted

@component('mail::button', ['url' => url('/todos')])
goto Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
