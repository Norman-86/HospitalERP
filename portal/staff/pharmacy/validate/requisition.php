<?php                                                                        
    // Check if delete button active, start this
    if(isset($_POST['request'])){
        if(isset($_POST['checkbox'])){
            $check=$_POST['checkbox'];
            
                $id=base64_encode(serialize($check));
                echo '<script type="text/javascript"> document.location = "requisition_items.php?id='.$id.'"; </script>';
                
            
        }else {
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning"><i class="fa fa-warning"></i> &nbsp; No item was selected!</span>
                </div>';
            }
    }
?>                                                             