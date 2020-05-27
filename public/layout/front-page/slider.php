<!--- All included code is written by Ludvig Olausson --->
<?php
    $img_url = array(
        1    => "https://www.w3schools.com/howto/img_mountains_wide.jpg",
        2    => "https://www.w3schools.com/howto/img_nature_wide.jpg",
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