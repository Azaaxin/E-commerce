<!--- All included code is written by Ludvig Olausson --->
<?php
    $img_url = array(
        1    => "https://assets.newatlas.com/dims4/default/fdb2144/2147483647/strip/true/crop/1918x1080+0+0/resize/1440x811!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Farchive%2Fgalaxy-s10-s9-comparison-26.png",
        2    => "https://www.idg.se/editorial/980/path/1.628672.1589272443!imageUploader/3540086811.jpg",
    );
?>

<div id="slides">
    <div class="slide showing" onclick="window.location.href='#index.php'" style="background-image: url(<?php echo $img_url[1]; ?>);">
      <div class="btn-container">
        <div class="button" onclick="back();"></div>
        <div class="button" onclick="forward();"></div>
      </div>
  </div>
    <div class="slide" onclick="window.location.href='#index.php'" style="background-image: url(<?php echo $img_url[2]; ?>);">
      <div class="btn-container">
        <div class="button" onclick="back();"></div>
        <div class="button" onclick="forward();"></div>
      </div>
  </div>
</div>