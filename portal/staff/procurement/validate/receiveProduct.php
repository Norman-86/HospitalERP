<?php                                                                        
    // Check if delete button active, start this
    if(isset($_POST['receive'])){
        if(isset($_POST['checkbox'])){
            $check=$_POST['checkbox'];
                
                $id=base64_encode(serialize($check));
                echo '<script type="text/javascript"> document.location = "receive.php?no='.$id.'"; </script>';
                
            
        }else{
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Item was selected!</span>
                </div>';
            
        }
    }else
    if(isset($_POST['pharmacy_receive'])){
        if(isset($_POST['checkbox'])){
            $check=$_POST['checkbox'];
                
                $id=base64_encode(serialize($check));
                echo '<script type="text/javascript"> document.location = "receive.php?no='.$id.'&r=p"; </script>';
                
            
        }else{
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Item was selected!</span>
                </div>';
            
        }
    }
?>                                                             