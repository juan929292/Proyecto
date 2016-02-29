<?php 
session_start();
include_once("./db_configuration.php");
?>
<html>
<head> 
    <title>Film Review</title>
</head>
<body>
   <div id="page" style="float:left;">
	<div id="info1">
		    <?php
			echo "<table border=1>";
						echo "<tr>";
				echo "<td>"."<h2>Tablas de 'Cine'</h2>"."</td>"."<td>"."<h3>Añadir</h3>"."</td>";
				echo "<td>"."<h3>Borrar</h3>"."</td>";
				echo "<td>"."<h3>Editar</h3>"."</td>";
				echo "<td>"."<h3>Mostrar</h3>"."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>"."<h3>Peliculas</h3>"."</td>"."<td>"."<a href='sql/Peliculas/inserta_bd.php?id=Peliculas'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Peliculas/borra_bd.php?id=Peliculas'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Peliculas/edita_bd.php?id=Peliculas'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Peliculas/resultado.php?id=Peliculas'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info2" style="">
				    <?php
			echo "<tr>";
				echo "<td>"."<h3>Generos</h3>"."</td>"."<td>"."<a href='sql/Generos/inserta_bd.php?id=Generos'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Generos/borra_bd.php?id=Generos'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Generos/edita_bd.php?id=Generos'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Generos/resultado.php?id=Generos'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info3" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Directores</h3>"."</td>"."<td>"."<a href='sql/Directores/inserta_bd.php?id=Directores'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Directores/borra_bd.php?id=Directores'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Directores/edita_bd.php?id=Directores'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Directores/resultado.php?id=Directores'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info4" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Comentarios</h3>"."</td>"."<td>"."<a href='sql/Comentarios/inserta_bd.php?id=Comentarios'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Comentarios/borra_bd.php?id=Comentarios'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Comentarios/edita_bd.php?id=Comentarios'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Comentarios/resultado.php?id=Comentarios'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info5" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Usuarios</h3>"."</td>"."<td>"."<a href='sql/Usuarios/inserta_bd.php?id=Usuarios'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Usuarios/borra_bd.php?id=Usuarios'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Usuarios/edita_bd.php?id=Usuarios'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Usuarios/resultado.php?id=Usuarios'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info6" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Valoraciones</h3>"."</td>"."<td>"."<a href='sql/Valoraciones/inserta_bd.php?id=Valoraciones'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Valoraciones/borra_bd.php?id=Valoraciones'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Valoraciones/edita_bd.php?id=Valoraciones'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Valoraciones/resultado.php?id=Valoraciones'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info7" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Es(Peliculas-Generos)</h3>"."</td>"."<td>"."<a href='sql/Es/inserta_bd.php?id=Es'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Es/borra_bd.php?id=Es'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Es/edita_bd.php?id=Es'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Es/resultado.php?id=Es'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info8" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Tienen(Peliculas-Comentarios)</h3>"."</td>"."<td>"."<a href='sql/Tienen/inserta_bd.php?id=Tienen'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Tienen/borra_bd.php?id=Tienen'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Tienen/edita_bd.php?id=Tienen'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Tienen/resultado.php?id=Tienen'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
		<div id="info9" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Posee(Peliculas-Valoraciones)</h3>"."</td>"."<td>"."<a href='sql/Posee/inserta_bd.php?id=Posee'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Posee/borra_bd.php?id=Posee'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Posee/edita_bd.php?id=Posee'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Posee/resultado.php?id=Posee'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
		?>
	</div>
	<div id="info10" style="">
		      <?php
			echo "<tr>";
				echo "<td>"."<h3>Dirigida_por(Peliculas-Directores)</h3>"."</td>"."<td>"."<a href='sql/Dirigida_por/inserta_bd.php?id=Dirigida_por'><img width=40 src='/Proyecto/img/inserta.jpg'/></a>"."</td>";
				echo "<td>"."<a href='sql/Dirigida_por/borra_bd.php?id=Dirigida_por'><img width=40 src='/Proyecto/img/borra.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Dirigida_por/edita_bd.php?id=Dirigida_por'><img width=40 src='/Proyecto/img/edita.png'/></a>"."</td>";
				echo "<td>"."<a href='sql/Dirigida_por/resultado.php?id=Dirigida_por'><img width=40 src='/Proyecto/img/ojo.png'/></a>"."</td>";
			echo "</tr>";
			echo "</table>";
		?>
		
	</div>
	</div>
	<img src='/Proyecto/sql/BD_vista_grafica.jpg' style='float:left;height:500px;width:700;margin-left:10px;'/>
</body>
</html>
