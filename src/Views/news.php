<?php
/** @var array $data -arrays news */
?>
<h2>News</h2>

<div class="news-block">
    <?php foreach ($data as $item): ?>
        <div class="news-item" style="border: 1px solid black">
            <div class="title">
                <span><?= $item['Title']; ?></span>
            </div>

            <div class="description">
<!--                <span>--><?php
                //= $item['Address']; ?><!--</span>-->
            </div>
        </div>
        <br/>
    <?php endforeach; ?>
</div>
