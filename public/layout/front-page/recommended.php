<!--- All included code is written by Ludvig Olausson --->
<div class="reco_container">
<?php 
  for($re_item = 1 ;$re_item <= 9; $re_item++){
    echo '<div class=rec_item' . $re_item .'>
            <div class="cont" onclick="window.location.href=\'product-page.php\'">
            <div class="img_c"><img src="http://ludvigolausson.se/school/img/mtn_bike_scott.jpg" width="90%"></div>
            <div class="brand_n">SCOTT</div>
            <div class="title">SCOTT Mountainbike</div>
            <div class="prize">6550kr</div>
        </div>
    </div>';
  }
  ?>
  <div class="more">
      Read More
</div>
</div>