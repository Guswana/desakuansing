
<div class="stunting-area" style="margin-bottom:20px;">
<div class="rowsame margin-minlr-5">
    <?php 
        $listIcon = ['fa-female','fa-child', 'fa-female','fa-child','fa-child','fa-child','fa-child'];
    ?>
    <?php foreach($widgets as $index => $item): ?>
    <div class="stunting-col">
        <div class="bordered <?= $item['bg-color'] == 'bg-gray' ? 'bg-danger' : $item['bg-color'] ?>"  style="border-radius:5px;padding:5px">
            <div class="hiddenrelative flexleft" style="padding:10px 5px;">
                <div class="icon-stunting flexcenter"><i class="fa fa-2x <?= $listIcon[$index] ?? 'fa-female' ?>"></i></div>
                <p style="margin-right:10px;"><?= $item['title'] ?></p>
                <h2 style="float:right;margin:0 0 0 auto;"><?= $item['total'] ?></h2>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
</div>
