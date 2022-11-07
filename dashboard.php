<?php
include 'header.php';

if (isset($_GET['subb'])) {
	$dateEnd=$_GET['dateChoice'];
} else {
$dateEnd = date('Y-m-d'); }
$diff=0;
$reds = array();
$blues = array();
$redsPos = array();
$bluesPos = array();
for ($i=0; $i < 15; $i++) {
	$reqSells="SELECT SUM(total_ht) AS sumSells FROM devis WHERE date_devis='".date('Y-m-d', strtotime($dateEnd.' -'.$i.' day'))."'";
	$reqExpanses="SELECT SUM(prix_total) AS sumExpanses FROM commandes_fournisseur WHERE date_commande='".date('Y-m-d', strtotime($dateEnd.' -'.$i.' day'))."'";
	$resSells = mysqli_query($conn, $reqSells) or die("bad query");
	$resExpanses = mysqli_query($conn, $reqExpanses) or die("bad query");
	$redVal = mysqli_fetch_assoc($resSells);
	$blueVal = mysqli_fetch_assoc($resExpanses);
	array_push($reds,$redVal['sumSells']);
	array_push($blues,$blueVal['sumExpanses']);
	$diff+=$redVal['sumSells']-$blueVal['sumExpanses'];
}
$maxVal=max(max($reds),max($blues));
$minVal=min(min($reds),min($blues));
if ($maxVal==0) {
	$maxVal=1;
}

for ($i=0; $i < 15; $i++) {
	$redsPos[$i]=(-$reds[$i] * 77 / ($maxVal-$minVal))+77;
	$bluesPos[$i]=(-$blues[$i] * 77 / ($maxVal-$minVal))+77;
}

?>
<link rel="stylesheet" href="style/stats.css">
<div class="container">
    <form method="GET" action="">
        Rapport au : <input type="date" name="dateChoice" value="<?php echo $dateEnd;?>">
        <input type="SUBMIT" value="Valider" name="subb" class="rechercher">
    </form>
	<div class="subcontainer">
		<div class="card">
			<div class="statheader">
				<span class="stattitle big">Rapport ventes / achats</span>
				<span class="date small"><?php echo date('d/m/Y', strtotime($dateEnd.' -14 day')).' - '.date('d/m/Y', strtotime($dateEnd)); ?></span>
				<span class="type small">Différence</span>
				<span class="value"><?php echo $diff;?></span>
			</div>
			<div class="clearfix"></div>
			<div class="parameter">
				<span class="red">Ventes</span>
				<span class="blue">Achats</span>
			</div>
			<div class="statistic">
				<div class="line-1"></div>
				<div class="line-2"></div>
				<div class="line-3"></div>
				<div class="data red">
					<svg><?php
						echo '<polyline points="9,'.$redsPos[14].' 50,'.$redsPos[13].' 90,'.$redsPos[12].' 130,'.$redsPos[11].' 171,'.$redsPos[10].' 211,'.$redsPos[9].' 251,'.$redsPos[8].' 291,'.$redsPos[7].' 331,'.$redsPos[6].' 371,'.$redsPos[5].' 411,'.$redsPos[4].' 451,'.$redsPos[3].' 491,'.$redsPos[2].' 531,'.$redsPos[1].' 571,'.$redsPos[0].'"></polyline>';
						?></svg>
					<div class="points"><?php
						for ($i=14; $i >= 0; $i--)
						if($reds[$i])
					echo'
						<div class="point-'.(15-$i).'" style="top:'.($redsPos[$i]-3).'px;">
							<div class="tooltip">'.$reds[$i].'</div>
						</div>
						';
						else
						echo'
							<div class="point-'.(15-$i).'" style="top:'.($redsPos[$i]-3).'px;">
								<div class="tooltip">0</div>
							</div>
							';
						?></div>
				</div>
				<div class="data blue">
					<svg><?php
						echo '<polyline points="9,'.$bluesPos[14].' 50,'.$bluesPos[13].' 90,'.$bluesPos[12].' 130,'.$bluesPos[11].' 171,'.$bluesPos[10].' 211,'.$bluesPos[9].' 251,'.$bluesPos[8].' 291,'.$bluesPos[7].' 331,'.$bluesPos[6].' 371,'.$bluesPos[5].' 411,'.$bluesPos[4].' 451,'.$bluesPos[3].' 491,'.$bluesPos[2].' 531,'.$bluesPos[1].' 571,'.$bluesPos[0].'"></polyline>';
						?></svg>
						<div class="points"><?php
							for ($i=14; $i >= 0; $i--)
							if($blues[$i])
						echo'
							<div class="point-'.(15-$i).'" style="top:'.($bluesPos[$i]-3).'px;">
								<div class="tooltip">'.$blues[$i].'</div>
							</div>
							';
							else
							echo'
								<div class="point-'.(15-$i).'" style="top:'.($bluesPos[$i]-3).'px;">
									<div class="tooltip">0</div>
								</div>
								';?></div>
				</div>
			</div>
			<div class="days">
				<?php
				for ($i=14; $i >= 0; $i--)
					echo '<span class="day">'.date('d', strtotime($dateEnd.' -'.$i.' day')).'</span>';
				?>
			</div>
		</div>
	</div>
	<div class="subcontainer">
		<div>
			<div class="pie animate" style="--p:40;--c:orange"> 40%</div>
			<h2 class="pietext">Papier A3<br/>80 g / m<sup>2</sup></h2>
		</div>
		<div>
			<div class="pie animate" style="--p:75;--c:yellow"> 75%</div>
			<h2 class="pietext">Papier A3<br/>toilé 300 g / m<sup>2</sup></h2>
		</div>
		<div>
			<div class="pie animate" style="--p:20;--c:red"> 20%</div>
			<h2 class="pietext">Adhésif<br/>soft touch</h2>
		</div>
		<div>
			<div class="pie animate" style="--p:90;--c:lightgreen"> 90%</div>
			<h2 class="pietext">Encre<br/>CMJN Xerox</h2>
		</div>
	</div>
</div>
</div>