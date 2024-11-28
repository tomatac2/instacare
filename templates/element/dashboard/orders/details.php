
<dialog id="details_<?=$data["id"]?>" style="margin-top:20px">
    
<div>
    <table class="tabelClass" style="width: 90%;">
        <tr>
            <td style="    background: #ddd;">  العنوان: <?=$data["address"]["full_address"]?></td>
        </tr>
    </table>
    <br>
    <h5>المنتجات</h5>
    <table class="tableClass">
        <tr>
            <th>الإسم</th>
            <th>الكمية</th>
            <th>السعر</th>
            <th>الإجمالي</th>
        </tr>
    <?php
        foreach($data["cart"] as $key=>$val):
            $val["type"]=="gift" ? $arr = ["price"=> '<i class="fa fa-gift" style=" padding: 5px;color:#0a9a73;"></i> هديه',"total"=> '<i class="fa fa-gift" style=" padding: 5px;color:#0a9a73;"></i> هديه',"style"=>"background: #42edbf42;"]
                                :  $arr = ["price"=>$val["product"]["price"].' جنيه مصري' ,"total"=>$val["quantity"]*$val["product"]["price"].' جنيه مصري',"style"=>""];
  
            echo '<tr style="'.$arr["style"].'">';
                echo '<td>'.$val["product"]["name_ar"].'</td>';
                echo '<td>'.$val["quantity"].'</td>';
                echo '<td>'.$arr["price"].'</td>';
                echo '<td>'.$arr["total"].'</td>';
            echo '</tr>';
        endforeach ; 
     ?>
    </table>
    <table class="tableClass">
        <tr>
            <td>المنتجات  </td>
            <td> <?=$data["items_amount"].' جنيه'?></td>
        </tr>
        <tr>
            <td>التوصيل  </td>
            <td> <?=$data["delivery_cost"].' جنيه'?></td>
        </tr>
       <tr>
            <td>الإجمالي  </td>
            <td> <?=$data["total_amount"].' جنيه'?></td>
        </tr>
    </table>
    <p class="notes">  <?=$data["notes"]?>  </p>
</div>

    <button class="closeDialog">
        X
        <input type="hidden" class="orderID" value="<?=$data["id"]?>">   
    </button>
</dialog>


<script>
    $(function(){
            /////////////////
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



<style>
    .tableClass {
    border: 1px solid;
    width: 90%;
}
.tableClass>tbody>tr{
    border: 1px solid; 
    text-align: center;  
}
.tableClass>tbody>tr>td{
    border: 1px solid; 
}
</style>