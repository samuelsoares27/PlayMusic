<?php

$path = "musicas";
$diretorio = dir($path);
$musicas = [];
$total = 0;

while ($arquivo =  $diretorio -> read()) {

  if ($arquivo != '.' && $arquivo != '..'){
    array_push($musicas, $arquivo);
  }

}

$diretorio -> close();
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">  
  
  <title>PlayMúsic</title>

  <!--Link Icone-->
  <link rel="icon" href="icones/music-ico.png" />
  
  <!--Link boostrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!--Link css-->
  <link href="css\estilo.css" rel="stylesheet">

</head>
<body class="fundo">

  <div class="container">
    <div class="Row">    
      <h1 class="titulo">PlayMusic</h1>   
      <div class="col-md">
        <div class="divLista">
          <table id="playlist" class="table">
            <thead style="color: white;">
              <tr>
                <th>#</th>
                <th>Artista</th>
                <th>Música</th>
                <th>Play</th>
              </tr>
            </thead>
            <tbody id="corpo" style="color: white;">
              <?php               
                foreach ($musicas as &$value) {
                $total ++;
              ?>
              <tr>
                <th scope="row"><?php echo $total; ?></th>
                <td> Desconhecido </td>
                <td> <?php echo $value?> </td>
                <td><button id="<?php echo $value?>" onclick="PlayMusic()" type="button" class="btn btn-light"> Play</button></td>
              </tr>  
              <?php } ?>                                                                                 
            </tbody>
          </table>
        </div>

        <audio id="player" controls="controls" class="controles">
          <source id="player-source" src="musicas/ferida-curada.mp3" type="audio/mpeg"/>
        </audio>  

        <script>

          function PlayMusic(){        

            var tabela = document.getElementById("playlist");
            var linhas = table.getElementsByTagName("tr");
            
            for (i = 0; i < linhas.length; i++) {

              var currentRow = tabela.rows[i];
              var createClickHandler = function(row) {
                return function() {
                  var cell = row.getElementsByTagName("td")[1];
                  
                  if(!cell) return;
                  
                  var id = cell.innerHTML;
                  var musica = 'musicas/' + id;
                  var res = musica.replace(" ", "");
                  alert(res);
                  document.getElementById('player').src =res;
              
                   var playPromise = player.play();

                };
              };
              currentRow.onclick = createClickHandler(currentRow);
            }

        </script>

      </div>

    </div>

  
  </div> 




<!--

Link api spotify
  <script src="https://sdk.scdn.co/spotify-player.js"></script>
  
  <script>
    window.onSpotifyWebPlaybackSDKReady = () => {
      const token = 'BQDbbdeN4zHl200p3W5HnR8jTfrwJ6tnl6udFKiZRRHL-Pe-N_83qHBVA4X0ejvTmY9RXvrEtUxtE7CzOsWRh9nkHasPdnK7dNzzBBrP01SUR73U9PYthE0X49nldBnIEIVP4NryZlYwaHEeWMxh5DH1ULz9amN7kDG_KGVuFLZjk2JcVxwwpuU';
      const player = new Spotify.Player({
        name: 'Web Playback SDK Quick Start Player',
        getOAuthToken: cb => { cb(token); }
      });

      // Error handling
      player.addListener('initialization_error', ({ message }) => { console.error(message); });
      player.addListener('authentication_error', ({ message }) => { console.error(message); });
      player.addListener('account_error', ({ message }) => { console.error(message); });
      player.addListener('playback_error', ({ message }) => { console.error(message); });

      // Playback status updates
      player.addListener('player_state_changed', state => { console.log(state); });

      // Ready
      player.addListener('ready', ({ device_id }) => {
        console.log('Ready with Device ID', device_id);
      });

      // Not Ready
      player.addListener('not_ready', ({ device_id }) => {
        console.log('Device ID has gone offline', device_id);
      });

      // Connect to the player!
      player.connect();
    };
  </script> -->

  <!--Link boostrap javascript-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>