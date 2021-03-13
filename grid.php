<?php

// number of cards in the game
$CARDS_NUM = 40;

//  directory structure:
//
//    cards/
//      big/            <- side A full size
//      big-back/       <- side B full size
//      thumb/          <- size A thumbnail
//      cover.jpg
//
//  all pictures in "ImageNN.jpg" format, NN goes from 01 to $CARDS_NUM with
//  zero padding to two digits
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Card game sample</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="grid.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>

  <body class="py-4">

<main>
  <div id="welcome" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Card game title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Hey, this is a game.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mb-3">
      <div class="col-md-8 ">
          <?php
          $nums = range(1,$CARDS_NUM);
          shuffle($nums);
          foreach($nums as $i){ ?>
          <button class="thumb" data-rel="Image<?php printf('%02d', $i+1)?>.jpg">
            <img src="cards/thumb/Image<?php printf('%02d', $i)?>.jpg">
          </button>
          <?php } ?>
      </div>
      <div class="col-md-4 ">
        <div class="big-card" id="big-card">
          <img src="cards/cover.jpg">
        </div>
      </div>
    </div>
</main>

<script>
  $(".thumb").click(function () {
      var imgUrl = $(this).data('rel');
      $("#big-card").html("<img src='cards/big/" + imgUrl + "'  />");
      $("#big-card").click({imgUrl : imgUrl}, flipCard);
      function flipCard(event) {
          $("#big-card").html("<img src='cards/big-back/" + event.data.imgUrl + "'  />");
        }
  });
  $(window).on('load', function() {
      $('#welcome').modal('show');
  });
</script>


  </body>
</html>
