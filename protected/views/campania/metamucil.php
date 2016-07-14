
<?php $this->pageTitle = "Metamucil - La Rebaja Virtual"; ?>

<?php
    $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Metamucil es una fibra soluble multi-beneficios que facilita el tránsito intestinal ya que contiene Psyllium, el ingrediente activo de la fibra.'>
    <meta name='keywords' content='Facilita transito intestinal, estreñimiento, psyllium, fibra'>
	<!-- styles -->
	<style>
            @font-face {
                font-family: HelveticaBold;
                src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/helvetica-bold.otf);
            }
            @font-face {
                font-family: Interstate regular;
                src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/interstate-regular.ttf);
            }   
            .texto {font-family:Interstate regular;}
            .font-title{font-family:HelveticaBold;}
            .space{margin-top:30px;}
            .pattern-background{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/pattern.png);margin-top: -20px;background-size:cover;}
            .titulo {background-color:#B04996;color:#fff;font-size:30px;padding: 15px 0px 15px 50px;border-radius: 0px 22px 22px 0px;}
            .titulo_m { background-color: #B04996;color: #fff;font-size: 22px;padding: 15px 0px 15px 50px;border-radius: 0px 22px 22px 0px;}
            .list {list-style:none;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/ico.png);font-size: 24px;margin-left: 47px;}
            .list_m {list-style: none;list-style-image: url(/lrv/images/contenido/metamucil/ico.png); font-size: 20px;}
            .list_m li {margin-bottom: 10px;}
            .line-orange{margin-left: 52px;color: rgb(255, 255, 255);font-size: 17px;background-color: rgb(239, 138, 0);padding: 0px 24px;margin-bottom: 0px;width: 437px;}
            .img-video{margin-left: 37px;margin-top: -18px;width: 470px;}
            .img-entrega{width: 300px;margin: 0px auto;}
            .sobre-metamucil {background-color: rgb(255, 255, 255);border: 2px solid rgb(239, 138, 0);width: 400px;margin: 0px auto;padding: 15px}
            .sobre-metamucil_m { padding:15px; background-color: rgb(255, 255, 255); border: 2px solid rgb(239, 138, 0); width: 100%; margin: 0px auto;}
            .leer-mas{background-color: rgb(176, 73, 150);color: rgb(255, 255, 255);border-radius: 5px;padding: 5px 20px;}
            .sobre-metamucil .title {background-color: rgb(239, 138, 0);margin: 0px;color: rgb(255, 255, 255);font-weight: bolder;font-size: 23px;text-align: center;}
            .sobre-metamucil_m .title {background-color: rgb(239, 138, 0);margin: 0px;color: rgb(255, 255, 255);font-weight: bolder;font-size: 23px;text-align: center;}
            a:hover {text-decoration:none;}
            a{text-decoration:none;}
            .filtro{background-color:#fff;border:1px solid #000;border-radius: 15px;padding: 15px;text-align: center;}
            .contenedor-filtros {padding: 22px;}
            .title {background-color: rgb(239, 138, 0);margin: 0px;color: rgb(255, 255, 255);font-weight: bolder;font-size: 23px;text-align: center;}
	</style>

    <!--Codigo google analitycs-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-80765083-1', 'auto');
      ga('send', 'pageview');
    </script>

    ";
?>


<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banner.png" width="100%">
        </div>
        <div class="row pattern-background" style="margin-top: -40px;">
            <section>
                <p>&nbsp;</p>
                <div class="titulo_m font-title">Es una fibra, <span style="text-decoration: underline;">NO</span> un laxante</div>
            </section>
            <div class="space"></div>
            <section>
                <center>
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111298, 'descripcion' => 'METAMUCIL-NARANJA.html')) ?>"  data-ajax="false"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/entrega.png" class="img-responsive img-entrega"></a>
                </center>
            </section>
            <section style="padding-left: 28px;padding-right: 41px;">
                <ul class="list_m texto" style="margin:0;">
                    <li>Psyllium es el ingrediente activo una fibra vegetal 100% natural.</li>
                    <li>Gramo a gramo tiene la más alta concentración de fibra soluble entre todos los gramos.</li>
                    <li>Facilita el tránsito intestinal. Atrapa y elimina residuos que tu cuerpo ya no necesita.</li>
                    <li>Bebida sabor a naranja, fácil de preparar.</li>
                    <li>No irrita, es suave con tu organismo.</li>
                    <li>SIN azúcar.</li>
                    <li>Regulariza tu intestino sin estimulantes químicos</li>
                    <li>Te ayuda a reducir los niveles de colesterol+</li>
                    <li>Ayuda a sentirte más ligero</li>
                    <p class="texto" style="font-size: 15px; margin-left: 59px;">*Acompañado de una dieta baja en grasas saturadas y ejercicio regular.</p>
                </ul>              
            </section>  
            <div class="space"></div>
            <section style="width:82%; margin-left: 5%;">
                <div class="sobre-metamucil_m texto">
                    <div class="title"> Sobre Metamucil</div>
                    <p style="margin-top: 10px;">Hay muchos productos basados en fibra. ¿Pero estos productos usan la fibra qué es multi-beneficios?</p>
                    <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/sobre-metamucil" data-ajax="false"><span class="leer-mas">Leer más</span></a>
                </div>
            </section>        
            <div class="space"></div>    
            <section  style="width:82%; margin-left: 5%;">
               <div class="sobre-metamucil_m texto">
                    <div class="title"> ¿Porqué elegir Metamucil?</div>
                    <p style="margin-top: 10px;"><span style="font-weight:bolder;color:#EF8A00;">1.</span> Quiere estar en forma y esbelto naturalmente <br>
                    <span style="font-weight:bolder;color:#EF8A00;">2.</span> Un modo sencillo de agregar fibras a su dieta..</p>
                    <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/porque-elejir-metamucil" data-ajax="false"><span class="leer-mas">Leer más</span></a>
                </div>  
            </section>
            
            <section style="padding: 20px;">
                <div class="title">Razones para elegir metamucil</div>                
                <video  style="width:100%;" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/poster.png" style="margin-top: 20px;">
                   <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>  
            </section>            
            
            <section style="padding: 20px;">
                <div class="title">Fibra Psyllium</div>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/Il6Yqjy-WRM" frameborder="0" allowfullscreen></iframe>
            </section>
            


            <section>
                <div class="contenedor-filtros texto">
                    <div class="filtro">
                        <span>Productos relacionados</span>
                        <a href="<?php echo CController::createUrl('/catalogo/buscar', array('busqueda' => 'metamucil')) ?>" data-ajax="false"><img width="34" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
                    </div>
                    <div class="space"></div>
                    <div class="filtro">
                        Más información&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/mas-informacion-metamucil" data-ajax="false"><img width="34" style="margin-left: 17px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
                    </div>
                </div>
            </section>
            
            <section style="padding: 0px 29px 0px 22px; text-align: justify;">
                <p style="color:#EF8A00;">Es un medicamento fitoterapeútico. No exceder su consumo. Número de registro sanitario PFM2015-0002427. Leer indicaciones y contraindicaciones. Sí los síntomas persisten, consultar al médico.</p>
            </section>            
            
                     
        </div>
    </div>
<!--Versión movil-->   
<!--Versión escritorio-->
<?php else: ?>
    <div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banner.png" class="img-responsive">
        </div>
        <div class="row pattern-background">
            <div class="col-md-6" style="padding-left: 0px; margin-top: 40px;">
                <div class="titulo font-title">Es una fibra, <span style="text-decoration: underline;">NO</span> un laxante</div>
                <div class="space"></div>
                <ul class="list texto">
                    <li>Psyllium es el ingrediente activo una fibra<br> vegetal 100% natural.</li>
                    <li>Gramo a gramo tiene la más alta <br> concentración de fibra soluble <br> entre todos los gramos.</li>
                    <li>Facilita el tránsito intestinal. Atrapa y <br> elimina residuos que tu cuerpo ya no necesita.</li>
                    <li>Bebida sabor a naranja, fácil de preparar.</li>
                    <li>No irrita, es suave con tu organismo.</li>
                    <li>SIN azúcar.</li>
                    <li>Regulariza tu intestino sin estimulantes químicos</li>
                    <li>Te ayuda a reducir los niveles de colesterol*</li>
                    <li>Ayuda a sentirte más ligero</li>
                </ul>
                <p class="texto" style="font-size: 15px; margin-left: 59px;">*Acompañado de una dieta baja en grasas saturadas y ejercicio regular.</p>
                <div class="space"></div>
            </div>
            <div class="col-md-6" style="margin-top: 30px;">
                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111298, 'descripcion' => 'METAMUCIL-NARANJA.html')) ?>"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/entrega.png" class="img-responsive img-entrega"></a> 
                <div class="sobre-metamucil texto">
                    <div class="title"> Sobre Metamucil</div>
                    <p style="margin-top: 10px;">Hay muchos productos basados en fibra. ¿Pero estos productos usan la fibra qué es multi-beneficios?</p>
                    <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/sobre-metamucil"><span class="leer-mas">Leer más</span></a>
                </div>  
                <div class="space"></div>
                <div class="sobre-metamucil texto">
                    <div class="title"> ¿Porqué elegir Metamucil?</div>
                    <p style="margin-top: 10px;"><span style="font-weight:bolder;color:#EF8A00;">1.</span> Quiere estar en forma y esbelto naturalmente <br>
                    <span style="font-weight:bolder;color:#EF8A00;">2.</span> Un modo sencillo de agregar fibras a su dieta..</p>
                    <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/porque-elejir-metamucil"><span class="leer-mas">Leer más</span></a>
                </div>   
                <div class="space"></div>
                <div class="contenedor-filtros texto">
                    <div class="col-md-6 filtro">
                        <span>Productos relacionados</span>
                        <a href="<?php echo CController::createUrl('/catalogo/buscar', array('busqueda' => 'metamucil')) ?>"><img width="34" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
                    </div>
                    <div class="col-md-6 filtro">
                        Más información
                        <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/mas-informacion-metamucil"><img width="34" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
                    </div>
                </div>
            </div>
             <div class="col-md-12">
                 <div class="col-md-6">
                    <div class="title">Razones para elegir metamucil</div>                
                        <video  style="width:100%;" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/poster.png" style="margin-top: 20px;">
                            <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>  
                 </div>                 
                 <div class="col-md-6">
                    <div class="title">Fibra Psyllium</div>
                    <iframe width="100%" height="303" src="https://www.youtube.com/embed/Il6Yqjy-WRM" frameborder="0" allowfullscreen></iframe>
                 </div>

              </div>            
            <div class="col-md-12">
                <div class="space"></div>
                <p style="color:#EF8A00;">Es un medicamento fitoterapeútico. No exceder su consumo. Número de registro sanitario PFM2015-0002427. Leer indicaciones y contraindicaciones. Sí los síntomas persisten, consultar al médico.</p>
            </div>
        </div>
    </div>
 <!--Fin versión escritorio-->   
<?php endif;?>
