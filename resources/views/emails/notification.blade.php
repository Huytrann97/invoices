@php
    $totalPrice = 0;
    $itemCount = 0;
@endphp
@component('mail::message')
User {{$data['user_name']}} with ID {{$data['user_id']}} has just updated invoice at {{$data['date']}} <br>
@foreach ($data['items'] as $item)
@php
    $totalPrice += $item['price'];
    $itemCount++;
@endphp
@endforeach
Total items : {{$itemCount}} <br>
Total Amount : {{$totalPrice}} <br>
@endcomponent
