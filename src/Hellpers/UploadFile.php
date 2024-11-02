<?php
namespace App\Hellpers;

class UploadFile {
    
   static function uploadSinglePhoto ($photoParamD ){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES[$photoParamD['photoName']]['name'] != null):
            $fileName    = $_FILES[$photoParamD['photoName']]['name'] ;
            $fileSize    = $_FILES[$photoParamD['photoName']]['size'] ;
            $fileTmpName = $_FILES[$photoParamD['photoName']]['tmp_name'] ;
            $fileType    = $_FILES[$photoParamD['photoName']]['type'] ;
            // Allowed Extention
            $code = 404 ;
            $allowedExtenation = array('jpg','png' ,'PNG','jpeg');
            $imgExtension      = end(explode('.' , $fileName));
            if(in_array($imgExtension , $allowedExtenation)):  //chk extentaion
                if($fileSize < 2000000): //chk size
                    $image = 'INSTACARE'.rand(1000,1000000).'.'.$imgExtension ;
                    move_uploaded_file( $fileTmpName,  WWW_ROOT.$photoParamD['path'].'/'.$image);
                    $returnIMG = $photoParamD['path'].'/'.$image ;
                    $imgProb   = "تم رفع الصور بنجاح " ;
                    $success   = true ; $code = 200 ;
                else: $imgProb = "مساحة الصورة اكبر من 2ميجابايت";$success = false ;
                endif;
            else: $imgProb = "امتداد الصور المسموح بها jpg - jpeg - png " ;$success = false ;
            endif;
        else: $imgProb = "برجاء ادخال الصور";  $success = false ;
        endif;
    return ["name"=> $returnIMG ,"msg"=> $imgProb , "success"=>$success ,'code'=>$code ];
    }


      /////////

      public static function uploadMultiPhotos($photoParamD , $key = 0){

        $fileName = $_FILES[$photoParamD['photoName']]['name'] ;
        $fileSize = $_FILES[$photoParamD['photoName']]['size'] ;
        $fileTmpName = $_FILES[$photoParamD['photoName']]['tmp_name'] ;
        $fileType = $_FILES[$photoParamD['photoName']]['type'] ;
    

      // Allowed Extention
      $allowedExtenation = array('jpg','png' ,'PNG','jpeg');
    
      $fileName[$key] !== null ? $imgExtension = end(explode('.' , $fileName[$key])) : ""  ;
       // dd($fileName );
      if(in_array($imgExtension , $allowedExtenation)):  //chk extentaion
    
         if($fileSize[$key] < 10000000): //chk size
              $image = 'more7'.rand(1000,1000000).'.'.$imgExtension ;
              move_uploaded_file( $fileTmpName[$key],  WWW_ROOT.$photoParamD['path'].'/'.$image);
              $returnIMG = $photoParamD['path'].'/'.$image ;
              $imgProb = "تم رفع الصور بنجاح " ;
              $success = true ; $code = 200 ;
    
        else: $imgProb = "مساحة الصورة اكبر من 10ميجابايت";$success = false ;
        endif;
    
    else: $imgProb = "امتداد الصور المسموح بها jpg - jpeg - jpeg-  png " ;$success = false ;$code=404;
    endif;
    
    ###############
    return ["name"=> $returnIMG ,"msg"=> $imgProb , "success"=>$success ,'code'=>$code ];
    // return  $returnIMG;
    }
        
}
