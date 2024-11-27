
<?= $this->element('dashboard/header') ?>


<?php if($auth->role_id != 1){
    echo '<script> 
        alert("غير مسموح الدخول لهذه الصفحة") ;
        window.location.href = "'.URL.'";
    </script>' ;
}else{ ?>

<?= $this->fetch('content') ?>

<?= $this->element('dashboard/footer') ?>
<?php } ?>