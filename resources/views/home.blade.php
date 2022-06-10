@extends('layout.header')

@section('content') 
 

<?php $trancount=0; ?>
 @foreach($transactions as $transaction)
 
 <?php //get transactiondata  ?>
 <div> 
     ${{$transaction->total_spent}}
     {{$transaction->transaction_at}} 
     <?php 
     $trancount =$loop->count;
      ?>
    </div>
 @endforeach 


 <?php //check validation ?>
 @if($trancount >=3)
 <h6>You have {{$trancount}} with more than $100 transaction in lasts 60 days</h6>

    @if($vouchers->count() == 0)
     
 <h4>Congratulation!</h4>
 <h6>you will be eligible for this event</h6>

<?php //if customer dont have any voucher  ?>
    <form>
 <a href='/upload?name={{$name}}'> <input type='button' value='upload'></a>
    </form>
    @else 
     
 @foreach($vouchers as $voucher)
 
<?php //if have a voucher then cant get more  ?>
 <div>  
    <h4>You already have a ${{$voucher->discount}}  voucher</h4>
     <h5>{{$voucher->redeemed_time}}</h5>
      
    </div>
 @endforeach 
    @endif

@else  
<?php //if not jump back  ?>

  <script>window.location = "/";</script>
@endif

 