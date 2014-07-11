<?php
	include_once "../classes/webservice.php";
        session_start();
        $arrayDatos = $_SESSION['$datos'];
        $nombreDepto = $_GET["nombreDepto"];
        $msgNoData = "";
        $view = "";
        if (count($arrayDatos)==0){
            $msgNoData = "No se encontró Información";
            $view = "style='visibility: hidden;'";
        }
        //echo count($arrayDatos);
        //var_dump($arrayDatos);
        
        $ws = new webservice();
        //$ws->setURL($url);
        $ws->setURL($url);
        $claves = $ws->getClaves();
?>
<!DOCTYPE html>
<html style="background-color: #ccffcc; background-image: none;">
    <head>
        <meta charset="utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
        <link href="../../themes/jquery-ui-1.11.0.custom/jquery-ui.css" rel="stylesheet">
        <link href="../../css/openDatlas.css" rel="stylesheet">
        <style>
	body{
		font: 62.5% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	select {
		width: 200px;
	}
	</style>
        <!script src="../../themes/jquery-ui-1.11.0.custom/external/jquery/jquery.js" type="text/javascript"></script>
        <!script src="../../themes/jquery-ui-1.11.0.custom/jquery-ui.js" type="text/javascript"></script>

    </head>
    <body>
    	<header>
            <h1 class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">DEPARTAMENTO DE <?php echo $nombreDepto; ?></h1>
        </header>
       
        <article class="mapa">
            <h1 class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">MAPA</h1>
            <?php
                echo $msgNoData;
            ?>
            <div <?php echo $view;?> >
                <iframe src="<?php echo $arrayDatos[0][6]; ?>" width="400" height="300" frameborder="0" style="border:0;"></iframe>          
            </div>    
        </article>
        
        
            <?php
            for($i=0;$i<count($arrayDatos);$i++){
                echo "<article class='accordion'>";           
                echo "<h3>".$arrayDatos[$i][3]."</h3>";
                     
                //echo "<iframe src='../classes/tablaInfo.php?contador=".$i."'  width='96%' height='500px' frameborder='0' style='border:0;'></iframe>";
                
                echo'<table>';
                    echo"<a href='../classes/tablaInfo.php?contador=".$i."'>Info</a>";
                    //$contador2=0;
                    echo "<tr>";
                        //echo $claves[2];
                        for($il=2; $il < count($claves);$il++){
                            echo $contador;
                            echo "<td>";
                               echo $claves[$il];
                            echo "</td>";
                         }
                    echo "</tr>";
                    $ws->setURL($url);
                    $datos = $ws->getDatos();
                    //var_dump($datos);
                    for($n=0;$n<count($datos);$n++){
                        echo "<tr>";
                        for($m=2; $m<count($claves);$m++){
                            echo "<td>";
                                echo $datos[$n][$m];
                            echo "</td>";
                        }
                        echo "</tr>";
                     }
                 echo"</table>";
                
                
                echo "</article>";
            }
            ?>
        <a href="../classes/tablaInfo.php?contador="<?php echo$i?>>Info</a>
        <footer>
        </footer>
        <script src="../../themes/jquery-ui-1.11.0.custom/external/jquery/jquery.js"></script>
        <script src="../../themes/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
<script>

$( ".accordion" ).accordion();



var availableTags = [
	"ActionScript",
	"AppleScript",
	"Asp",
	"BASIC",
	"C",
	"C++",
	"Clojure",
	"COBOL",
	"ColdFusion",
	"Erlang",
	"Fortran",
	"Groovy",
	"Haskell",
	"Java",
	"JavaScript",
	"Lisp",
	"Perl",
	"PHP",
	"Python",
	"Ruby",
	"Scala",
	"Scheme"
];
</script>
    </body>
</html>