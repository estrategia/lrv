<productos>
    <?php foreach ($listProductos as $objProducto): ?>
        <producto>
            <codigo><?php echo $objProducto->codigoProducto ?></codigo>
        </producto>
    <?php endforeach; ?>
</productos>