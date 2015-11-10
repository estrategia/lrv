<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->renderPartial('_d_menu'); ?>
        </div>
        <div class="col-md-9">
            <?php $this->renderPartial($vista, $params); ?>
        </div>  
    </div>
</div>
