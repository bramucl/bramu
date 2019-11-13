cl<?php
  $pla_id = 2;
  //$conexion = mysqli_connect("localhost", "root", "");
  //mysqli_select_db($conexion, "dmd");
  $conexion = mysqli_connect("localhost", "bramucl_jcabello", "J@Cm3oLi92");
  mysqli_select_db($conexion, "bramucl_dmd");
  $consulta = mysqli_query($conexion, "SELECT * FROM plantillas WHERE pla_id = '$pla_id'");
  $fila = mysqli_fetch_assoc($consulta);
  $seccion1ID = $fila['pla_seccion1'];
  $seccion2ID = $fila['pla_seccion2'];
  $seccion3ID = $fila['pla_seccion3'];
  $consulta = mysqli_query($conexion, "SELECT img_imagen FROM imagenes WHERE img_id = '$seccion1ID'");
  $fila = mysqli_fetch_assoc($consulta);
  $seccion1 = $fila['img_imagen'];
  $consulta = mysqli_query($conexion, "SELECT vid_video FROM videos WHERE vid_id = '$seccion2ID'");
  $fila = mysqli_fetch_assoc($consulta);
  $seccion2 = $fila['vid_video'];
  if($seccion2 != null)
  {
    $seccion2 = "https://www.youtube.com/embed/" .$seccion2 ."?autoplay=1&controls=0&fs=0&mute=1&modestbranding=1&showinfo=0&loop=1&playlist=" .$seccion2;
  }
  $consulta = mysqli_query($conexion, "SELECT img_imagen FROM imagenes WHERE img_id = '$seccion3ID'");
  $fila = mysqli_fetch_assoc($consulta);
  $seccion3 = $fila['img_imagen'];
  $consulta = mysqli_query($conexion, "SELECT imagenes.img_id, imagenes.img_imagen, galerias.gal_orden FROM galerias, imagenes WHERE galerias.pla_id = '$pla_id' AND galerias.img_id = imagenes.img_id ORDER BY galerias.gal_orden ASC");
  $datosGaleria = array();
  $contador = 0;
  while($fila = mysqli_fetch_assoc($consulta))
  {
    $datosGaleria[$contador] = $fila['img_imagen'];
    $contador++;
  }
?>
<!DOCTYPE html>
<html class="html-vitrina" lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../main.css">
  <title>DMD | Vitrina</title>
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
  <script language="JavaScript" type="text/javascript">
    function show5()
    {
      if (!document.layers&&!document.all&&!document.getElementById)
        return
      var Digital=new Date()
      var hours=Digital.getHours()
      hours = hours - 3
      var minutes=Digital.getMinutes()
      var seconds=Digital.getSeconds()
      if (hours>23)
        hours=hours-23
      if (hours==0)
        hours=23
      if (minutes<=9)
        minutes="0"+minutes
      if (seconds<=9)
        seconds="0"+seconds
      if (hours<10)
        hours = "0"+hours
      //change font size here to your desire
      myclock=""+hours+":"+minutes/*+":"
      +seconds*/+"</b>"
      if (document.layers)
      {
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
      }
      else if (document.all)
        liveclock.innerHTML=myclock
      else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
    }
    window.onload=show5
  </script>
</head>
<body class="body-vitrina">
  <div class="contenedor">
    <div class="seccion-0" style="text-align:center;padding:1em 0;">
        <span id="liveclock" style="left:0;top:0px; font-size:110px; font-family: 'Fredoka One', cursive; color:#0B2B40;"></span>
    </div>
    <div class="seccion-1">
      <img class="img-banner" src="<?php echo "../" . $seccion1 ?>">
    </div>
    <div class="seccion-2">
      <iframe id="youtube" src="<?php echo $seccion2 ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="seccion-3">
      <img class="img-banner2" src="<?php echo "../" . $seccion3 ?>">
    </div>
    <div class="seccion-4">
      <?php
        if(count($datosGaleria) == 1)
        {
          echo '<div class="slider-1">';
          echo '<ul>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[0] . '">';
          echo '</li>';
          echo '</ul>';
          echo '</div>';

        }
        else if(count($datosGaleria) == 2)
        {
          echo '<div class="slider-2">';
          echo '<ul>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[0] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[1] . '">';
          echo '</li>';
          echo '</ul>';
          echo '</div>';
        }
        else if(count($datosGaleria) == 3)
        {
          echo '<div class="slider-3">';
          echo '<ul>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[0] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[1] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[2] . '">';
          echo '</li>';
          echo '</ul>';
          echo '</div>';
        }
        else if(count($datosGaleria) == 4)
        {
          echo '<div class="slider-4">';
          echo '<ul>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[0] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[1] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[2] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[3] . '">';
          echo '</li>';
          echo '</ul>';
          echo '</div>';
        }
        else if(count($datosGaleria) == 5)
        {
          echo '<div class="slider-5">';
          echo '<ul>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[0] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[1] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[2] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[3] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[4] . '">';
          echo '</li>';
          echo '</ul>';
          echo '</div>';
        }
        else if(count($datosGaleria) == 6)
        {
          echo '<div class="slider-6">';
          echo '<ul>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[0] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[1] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[2] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[3] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[4] . '">';
          echo '</li>';
          echo '<li>';
          echo '<img class="img-slider" src="../' . $datosGaleria[5] . '">';
          echo '</li>';
          echo '</ul>';
          echo '</div>';
        }
      ?>
    </div>
  </div>
</body>
</html>
