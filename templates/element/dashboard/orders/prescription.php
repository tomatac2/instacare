<dialog id="details_<?=$data["id"]?>" style="margin-top:20px">
    <p>
        <img src="<?=URL.$data["prescription_file"]?>" style=" width: 75%; height: 130px;">
        <a href="<?=URL.$data['prescription_file']?>" download="Prescription" style="color:blue">Download Prescription</a>
        <p class="notes">  <?=$data["notes"]?>  </p>
    </p>

    <button class="closeDialog">
        X
        <input type="hidden" class="orderID" value="<?=$data["id"]?>">   
    </button>
</dialog>


<script>
    $(function(){
     
            var orderId , orderIdClose ;

            $(".orderDetails").click(function(){
                 orderId = $(this).find(".orderID").val();
                $("#details_"+orderId).css("display","block") ; 

           
            })

            $(".closeDialog").click(function(){
                orderIdClose =  $(this).find(".orderID").val();
                $("#details_"+orderIdClose).css("display","none") ; 
            })
          
        })
</script>
