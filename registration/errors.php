<?php
if(count($errors) > 0): ?>
    <div class="error">
        <?php foreach ($errors as $error):?>
           <p> <?= $error ?> </p>
        <?php endforeach;?>
    </div>

<?php
unset($errors);
endif;?>
