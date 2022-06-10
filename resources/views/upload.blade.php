@extends('layout.header')

@section('content')
 
<?php $id = 0;
    $id1 = 0;
    $startdate ="";
     $enddate = "";
     $today = date('Y-m-d H:i:s');
     ?>
 @foreach($vouchers as $voucher) 
     <?php 
     if($voucher-> mode == 0)
     $id = $voucher-> id;
  
      ?> 
 @endforeach 
 @foreach($events as $event) 
     <?php 
     if($event-> mode == 0)
     $id1 = $event-> id;


     $startdate = $event-> start_datetime;
     $enddate = $event-> end_datetime;
      ?> 
 @endforeach 
 @if($id > 0 && $id1 > 0 && $today > $startdate && $today < $enddate)
<form method='POST' action"/upload" enctype="multipart/form-data">
    @csrf
<h1>Upload Image</h1> 
 <h6>Upload your Selfie with ABC product you will get an voucher</h6>
 
<input type="file" name="photo"><br/>
<input type="submit">
 
<input type="hidden" name="id" value='<?php echo $id; ?>'>
 

</form>
@else  
<?php //if not jump back  ?>

  <script>window.location = "/";</script>
@endif

 