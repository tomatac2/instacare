
<?php foreach($sub as $v){?>
    <div class="ltn__banner-item">
        <div class="ltn__banner-img">
            <a href="<?=$v["link"]?>"><img style="height: 150px;width: 100%;" loading="lazy" 
                 src="<?= $this->Url->build('/').$v['photo'] ?>" alt="Banner Image">
            </a>
        </div>
    </div>
<?php } ?>