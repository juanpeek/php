<?php
function newCard($id,$titulo,$texto,$categoria,$fecha,$imagen){
    $card = "<div class='card card-custom ml-3 mt-3'>
                <img class='card-img-top card-img-custom' src='$imagen' alt='Card image cap'>
                <div class='card-body card-body-custom'>
                    <p class='idcard'>ID:$id</p>
                    <h5 class='card-title'>$titulo</h5>
                    <p class='card-text'>$texto</p>
                </div>
                    <div class='mr-2 mb-2 ml-2 mt-2'>
                        <span class='badge badge-pill badge-info badge-custom'>$categoria</span>
                        <span class='date-card float-right'>$fecha</span>
                    </div>
               </div>";
    echo $card;
}