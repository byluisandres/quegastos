<?php if (isset($data['errores'])) : ?>
    <?php if (count($data['errores']) > 0) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($data['errores'] as $key => $valor) : ?>
                <?php print $valor; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif ?>