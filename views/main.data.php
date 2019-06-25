 <?php foreach ($notifications as $i=>$notification): ?>
                <form action="/info" method="post">
                <input type="hidden" name="id" value="<?=$notification->id?>">
                <button type="submit" class="btn btn-success"><?=$notification->name?></button>
                </form>
            <?php endforeach?>
             <?= count($notifications) ?>
             <br><?=$lastoffset?>
        <?php if(count($notifications)>5):?>
            <form action="/main" method="post">
                <input type="hidden" name="offset" value="<?=$lastoffset+5?>">
                <button type="submit" class="btn btn-danger">Load More</button>
             </form>
      <?php endif ?>
</div>