<?php
if(count($success) > 0): ?>
    <div class="success">
        <?php foreach ($success as $succes):?>
           <p> <?= $succes ?> </p>
        <?php endforeach;?>
    </div>
<?php endif;?>
