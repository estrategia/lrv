<?php foreach ($listModulos as $objModulo): ?>
    <?php $this->renderPartial('//contenido/d_modulo', array('objModulo' => $objModulo)) ?>
    <div class="space-1"></div>
<?php endforeach; ?>
