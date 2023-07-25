@php
    $totalPrice = 0;
    $itemCount = 0;
@endphp
@component('mail::message')
User {{$request['user_name']}} with ID {{$request['user_id']}} has just updated invoice at {{$request['date']}} <br>
@foreach ($request['items'] as $item)
@php
    $totalPrice += $item['price'];
    $itemCount++;
@endphp
@endforeach
Total items : {{$itemCount}} <br>
Total Amount : {{$totalPrice}} <br>
@endcomponent
