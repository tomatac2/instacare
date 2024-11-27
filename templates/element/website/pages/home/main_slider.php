<div class="ltn__slide-active-2 slick-slide-arrow-1 slick-slide-dots-1 mb-30">
    <?php foreach($main as $v){?>
    <a href="<?=$v["link"]?>">
        <div class="ltn__slide-item ltn__slide-item-10 section-bg-1 bg-image"  loading="lazy" 
            data-bs-bg="<?= $this->Url->build('/').$v['photo'] ?>" style="height: 330px;">
        </div>
    </a>
    <?php }?>
</div>