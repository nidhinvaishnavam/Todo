@component('mail::message')
# New Todo created : {{$todo->title}}
<b>here is the description</b><br><br>
{{$todo->description}}

@component('mail::button', ['url' => url('/todos/'.$todo->id)])
View Todo
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
