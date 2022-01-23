
<main>
    <div class="mosaic">
        <?php
        foreach ($var as $item){?>
            <div class="boxImg">
                <img src='/img/photo-project/<?= $item->getImage() ?>'
                     alt="<?= $item->getImageTitle() ?>"
                     title="<?= $item->getImageTitle() ?>"/>
                <span class="boxText"><?= $item->getImageTitle() ?></span>
            </div>
            <?php
        }?>
    </div>
</main>
