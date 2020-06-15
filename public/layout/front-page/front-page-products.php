<!--- All included code is written by Ludvig Olausson --->
<div class="block_cont">
  <div class="_procontainer">
    <!--- brand looper starts here --->
    <div class="brands" onmousemove="showCoords(event)">
      <div class="branding">
        <?php 
    $brand_list= array(
        1    => "img/logotypes/scott.png",
        2    => "img/logotypes/trek.png",
        3    => "img/logotypes/yeti.png",
        4    => "img/logotypes/rockymountain.png",
        5    => "img/logotypes/specialized.png",
    );
  for($brand = 1 ;$brand <= count($brand_list); $brand++){
    echo '<div id="brand' . $brand . '">
        <img src="' . $brand_list[$brand] . '" width="100%">
    </div>';
  }
  ?>
      </div>
    </div>
    <!--- brand looper end here --->
    <div class="pointer"><img id="arrow_y" src="img/doublearrow.svg" alt="Arrow" width="32"></div>
    <!--- Products looper ---->

    <script>front_page_ajax();</script>

  </div>
</div>
<!--- Products looper END ---->