<?php
/**@var \App\Models\Customer $customer */
?>
<div class="col">
    <div class="card h-100">

        <div class="card-body">
            <h5 class="card-title">({{$customer->id}}){{ $customer->firstname}}</h5>

        </div>
        <div class="card-footer">
            <div class="float-start">


            </div>
            <div class="float-end"> ₺</div>
        </div>
    </div>
</div>