<div class="space-1"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?php $this->renderPartial('_d_menu', array('vista'=>$vista)); ?>
        </div>
        <div class="col-md-9">
            <div class="conten_user_infor">
            <?php $this->renderPartial($vista, $params); ?>
            </div> 
        </div>  
    </div>
</div>
