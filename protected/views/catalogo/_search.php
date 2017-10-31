

<?php foreach($models as $model): ?>
    <?php echo $model->descripcionProducto?><br/>
<?php endforeach; ?>

<br/>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>