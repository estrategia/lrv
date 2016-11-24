<?php foreach ($listModulos as $objModulo): ?>
    <?php $this->renderPartial('/contenido/modulo', array('objModulo' => $objModulo)) ?>
    <div class="space-1"></div>
<?php endforeach; ?>
