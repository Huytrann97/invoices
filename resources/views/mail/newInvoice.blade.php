@component('mail::message')
Dear {{$name}},<br>
Your {{$content['date']}} invoices have been updated. <br>

{{-- {{dd($content['items'])}} --}}

Here is what you've updated: <br>
Items: <br>
@foreach ($content['items'] as $item)
- Item name: {{ $item['name'] }} .
  Price: {{ $item['price'] }} <br>
@endforeach
@endcomponent
