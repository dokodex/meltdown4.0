<?php
	include 'php/businessLogic/businessLogic.php';

	function tableComingShows(){

		$bl = new businessLogic();

		$result = $bl->getcomingshows();

		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";       

		// output data of each row
		while($row = $result->fetch_assoc()) {
			$row = array_map("utf8_encode", $row);
		    echo "<tr  class='tour-dates--row tour-dates__table--body'>";
		    echo "<td>" . $row['fecha'] . "</td>";
		    $place=$row['lugar'];
		    $sepplace=explode(' / ', $place);
		    echo "<td>" . $sepplace[0] . "</td>"; 
		    echo "<td class='tour-dates__venue'>" . $sepplace[1] . "</td>";
		    echo "<td class='tour-dates__country'>" . $sepplace[2] . "</td>";
		    echo "<td class='tour-dates__bands'>" . $row['con'] . "</td>";

		    if (empty($row['evento'])){

		    	echo "<td class='tour-dates__event'>*Not available</td>";

		    }

		    else{
		    $evento=$row['evento'];

			    echo "<td class='tour-dates__button tour-dates__button--tickets'><a class='tour-dates--link' href='$evento' target='_blank'><div class='tour-dates--button'>Go</div></a></td>";
               
		    }

		    if (empty($row['tickets'])){

		    	echo "<td class='tour-dates__tickets'>*Not available</td>";
		        echo "</tr>";

		    }

		    else{
		    $ticket=$row['tickets'];

			    echo "<td class='tour-dates__button tour-dates__button--tickets'><a class='tour-dates--link' href='$ticket' target='_blank'><div class='tour-dates--button'>Buy</div></a></td>";
			    echo "</tr>";
               
		    }		    


		}
	}


	function tablePastShows(){

		$bl = new businessLogic();

		$result = $bl->getpastshows();

		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        while($row = $result->fetch_assoc()) {
        	$row = array_map("utf8_encode", $row);
            echo "<tr>";
            echo "<td>" . $row['fecha'] . "</td>";
            $place=$row['lugar'];
            $sepplace=explode(' / ', $place);
            echo "<td>" . $sepplace[0] . "</td>";
            echo "<td>" . $sepplace[1] . "</td>";
            echo "<td>" . $sepplace[2] . "</td>";
            echo "<td>" . $row['con'] . "</td>";

        }
    }

    function login($usuario,$pass){
		$bl = new businessLogic();

		$result = $bl->login($usuario,$pass);

		if($result=='0'){
			echo "Usuario o contraseña incorrectos";
		}

		else{

			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $usuario;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
			echo "Bienvenido! " . $_SESSION['username'];
    	}
    }

?>