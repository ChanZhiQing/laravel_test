@extends('layout.header');

@section('content') 
  
 @foreach($transactions as $transaction)
 <div>
     {{$loop->index}}
     {{$transaction->total_spent}} 
     <?php
     if($name == $transaction->customer_id)
        $count = 1;
      ?>
    </div>
 @endforeach

 @if($name == 1)
  {{ $name }}
@else 
  <script>window.location = "/";</script>
@endif