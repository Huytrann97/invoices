@php
    $totalPrice = 0;
@endphp

@component('mail::message')
Dear    {{$data['user_name']}} <br>
Your {{$data['date']}} invoices has been updated <br> <br>
Here is what you've updated: <br>
Items: <br>
@foreach ($data['items'] as $item)
@php
    $totalPrice += $item['price'];
@endphp
- Item name: {{ $item['name'] }} .
  Price: {{ $item['price'] }} <br>
@endforeach
Total : {{$totalPrice}} <br>
{{-- {{dd($data['items'])}} --}}
@endcomponent
