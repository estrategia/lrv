<ul data-role="listview" data-inset="true" class="cpanel_menu_ppal ui-nodisc-icon ui-alt-icon" >
    <?php foreach($listCategoriasHijas as $catHij):?>
        <li>
            <a href="<?php echo CController::createUrl('/usuario/autenticar') ?>" data-ajax="false" >
                <h2><?= $catHij->nombreCategoriaTienda?></h2>
            </a>
        </li>
     <?php endforeach;?>
</ul>