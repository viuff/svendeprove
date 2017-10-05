<!--################ -SvendeProve- ######################-->
<?php
include('includes/session_start.php');
include('header.php');
 ?>
  <div class="container text-left">
<!--#############################- venstre sidenav-###################################-->

      <div class="col-sm-2 sidenav">
        <!--<div class="well">-->
          <h4>Velkommen Hos DJ Grunk.</h4>
          <p>
          Her hos DJ Grunk kan du være med til at bestemme hvilken musik der skal indkøbes til Musikbiblioteket.
          Hvis du ikke allerede er oprettet som bruger så skynd dig at blive det. Så får du nemlig også 1500 Grunker som du kan bruge til at “købe” for i musikbutikken.
          De cd’er der bliver købt flest gange havner på hitlisten her til venstre og hvis du er med til at få dine favoritter på hitlisten er der større chance for at du hurtigere kan låne dem på Musikbiblioteket.
          Du kan også lave dine egne anmeldelser, så andre brugere kan se hvilken musik der er på toppen i øjeblikket.
          Kik dig omkring og vær med til at sætte liv i kludene.</p>
          <p>DJ Grunk.</p>
        <!--</div>-->
    <!--    <div class="well">

        </div>
        <?php

        ?>
-->
  </div>
<!--#############################- sidebar slut -###################################-->

<!--############################# center ###################################-->

      <div class="col-sm-8 text-left" id="centerpage">

        <section>
        <?php
          mysqli_query($dbcon, "SET NAMES utf8");
          $query = "SELECT * FROM albums ORDER BY album_sale_no DESC LIMIT 6";
          $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
        ?>

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">
            <h1>Hit listen</h1>
          </div>
          <div class="panel-body">
            <p>Her er en liste over de mest "solgte" albummer</p>
          </div>

          <!-- Table -->
          <table class="table">
            <tr>
              <th>Artist</th>
              <th>Navn</th>
              <th>Genre</th>
              <th>Cover</th>
              <th>"solgt"</th>
            </tr>
            <!-- start while løkke  -->
          <?php
          while ($row = mysqli_fetch_assoc ($result)) { ?>
            <tr>
              <td><?php echo $row['album_artist']; ?></td>
              <td><?php echo $row['album_title']; ?></td>
              <td><?php echo $row['album_genre']; ?></td>
              <td> <img src="img/Albums/small/<?php echo $row['album_img']?>" class="img-thumbnail" alt="The Album" width="50" height="50"></td>
              <td><?php echo $row['album_sale_no']; ?></td>
            </tr>
            <!-- slut while løkke  -->
            <?php } ?>
          </table>

        </section>
      </div>
<!--#############################- højre sidenav-###################################-->

<div class="col-sm-2 sidenav">
  <section>

    <h4>Husk Hør også:</h4>

    <?php
      mysqli_query($dbcon, "SET NAMES utf8");
      $query = "SELECT album_img FROM albums ORDER BY RAND()";
      $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
    ?>
    <div class="well">
      <div class="cycle-slideshow" data-cycle-speed="6100">
    <?php
    while ($row = mysqli_fetch_assoc ($result)) { ?>
      <img src="img/Albums/big/<?php echo $row['album_img']?>" class="" alt="" width="100%" height="">
    <?php } ?>
    </div>
    </div>

    <?php
      mysqli_query($dbcon, "SET NAMES utf8");
      $query = "SELECT album_img FROM albums ORDER BY RAND()";
      $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
    ?>
    <div class="well">
    <div class="cycle-slideshow" data-cycle-speed="4900">
    <?php
    while ($row = mysqli_fetch_assoc ($result)) { ?>
      <img src="img/Albums/big/<?php echo $row['album_img']?>" class="" alt="" width="100%" height="">
    <?php } ?>
    </div>
    </div>

    <?php
      mysqli_query($dbcon, "SET NAMES utf8");
      $query = "SELECT album_img FROM albums ORDER BY RAND()";
      $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
    ?>
    <div class="well">
    <div class="cycle-slideshow" data-cycle-speed="6500">
    <?php
    while ($row = mysqli_fetch_assoc ($result)) { ?>
      <img src="img/Albums/big/<?php echo $row['album_img']?>" class="" alt="" width="100%" height="">
    <?php } ?>
    </div>
    </div>

  </section>
</div>
<!--#############################-over out-###################################-->
  </div>
</div>

  <?php
  include('footer.php');
   ?>
