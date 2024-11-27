<?php
//  echo json_encode($gifts);
if ($gifts["success"]) {
    $session = $this->request->getSession();
    $totalPoints = $session->read('totalPoints') ?? -1;
    $totalPoints == -1 ? $totalPoints= $gifts["myPoints"] : $totalPoints; 

    $giftArrSession = $session->read('Gift') ?? [];
    $giftArr = [] ;
    !empty($giftArrSession) ? $giftArr = array_column($giftArrSession,'product_id') :"" ;

    echo '
        <div id="app">
        <h3 class="list-count">  عدد النقاط: ' . $totalPoints. '</h3>
        <div id="resGift"></div>
        <ul class="session-container">
    ';
    foreach ($gifts["data"] as $k => $v):
         in_array( $v["product_id"],$giftArr) ? $styleArr = ["li"=>"pointer-events:none;background:#0a9a73;color:gold" , "i" => "color:gold"] 
                                                :$styleArr = ["li"=>"" , "i" => ""];
        //echo $style ; 
        echo '<li class="addToCartGift" id="cartBtnGift_'.$v["product_id"].'" style="'.$styleArr["li"].'" > 
                <input type="hidden" name="product_id" value="'.$v["product_id"].'">                        
                <i class="fa fa-gift" style=" padding: 5px;color:#0a9a73;'.$styleArr["i"].'"></i>' .
          $v["description"] .
           '</li>';
    endforeach;
    echo '</ul></div>';
} else {
    echo '
    <table class="table">
        <tbody style="border: none;">
            <tr>
                <td style="border: none;text-align: center;">قم بتسجيل الدخول أولاً  
                    <br>
                    <a href="'.URL.'users/login" class="btn btn-success" style=" margin:5px; padding:10px !important; border: 1px solid;border-radius: 5px !important;">   تسجيل الدخول</a> 
                </td>
            </tr>
        </tbody>
    </table>
    ';
}


?>


<script>
    $(function(){
        $(".addToCartGift").click(function(){
           
            var proID = $(this).find("input[name='product_id']").val();


                $.ajax({
                        url: '<?=$this->Url->build('/')?>gifts/addToGift?proID='+proID ,//+'&qun='+qun+'&price='+price,
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                            var response = $.parseJSON(res) ; 
                            console.log(response.success)
                            if(response.success == true){
                                var cartCount =  $("sup").text();
                                $("sup").text(cartCount ++ +1);
                                $("#cartBtnGift_"+proID).css("background","#0a9a73").css("pointer-events","none").css("color","gold");
                                $("#cartBtnGift_"+proID+">i").css("color","gold");
                                $("#resGift").text(response.msg).css('color','green').css('text-align','center');
                                $(".list-count").text("عدد النقاط: "+response.remaining_points);
                            }else{
                             $("#resGift").text(response.msg).css('color','red').css('text-align','center'); 
                            }

                          //console.log($.parseJSON(res));
                            
                       }
                });
            })
        })
    </script>


