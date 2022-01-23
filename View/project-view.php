
<main>
    <?php
    foreach ($var as $item){?>
        <div class="square" >
            <span><?= $item->getTitle() ?></span>
            <div class="description">
                <p><?= $item->getDescription() ?></p>
            </div>
            <!-- get first project image -->
        </div>
        <?php
    }?>
</main>
