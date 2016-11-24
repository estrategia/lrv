<?php
/*
  $this->widget('CStarRating', array(
  'name' => 'rating_55',
  'readOnly' => true,
  'minRating' => 1,
  'maxRating' => 5,
  //'cssFile' => Yii::app()->request->baseUrl . '/css/rating.css',
  'starCount' => 5,
  'value' => 3
  ));
 * 
 */
?> 

<div id="raty"></div>
<script>
    $('#raty').raty({
        starOn: requestUrl + '/libs/raty/images/star-on.png',
        starOff: requestUrl + '/libs/raty/images/star-off.png',
        starHalf: requestUrl + '/libs/raty/images/star-half.png',
        cancelOn: requestUrl + '/libs/raty/images/cancel-on.png',
        cancelOff: requestUrl + '/libs/raty/images/cancel-off.png'
    });
</script>