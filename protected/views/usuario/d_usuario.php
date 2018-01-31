<div class="container-fluid container-semifluid">
    <div class="row">
      <div class="col-md-12">
        <h2 class="title-micuenta">Tu cuenta</h2>
        <hr>
      </div>
        <div class="col-md-3">
            <?php $this->renderPartial('_d_menu', array('vista'=>$vista)); ?>
        </div>
        <div class="col-md-9">
            <div class="conten_user_info">
            <?php $this->renderPartial($vista, $params); ?>
            </div>
        </div>
    </div>
</div>
