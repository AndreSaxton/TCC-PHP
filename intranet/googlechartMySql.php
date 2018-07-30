<html>
  <head>
<?php
		$tabela ="";
		$tipo =  $_GET["nTipoConta"];
		$mes =  $_GET["nMesConta"];
		$ano =  $_GET["nAnoConta"];
		require_once('conexao.php');
		
		if($mes == 0)
			$consulta = "SELECT MONTH(dt_vencimento_conta), SUM(vl_conta) FROM conta  WHERE cd_movimentacao_conta = '$tipo' AND YEAR(dt_vencimento_conta) = '$ano' GROUP BY MONTH(dt_vencimento_conta)";
		else
			$consulta = "SELECT DAY(dt_vencimento_conta), SUM(vl_conta) FROM conta  WHERE cd_movimentacao_conta = '$tipo' AND MONTH(dt_vencimento_conta) = '$mes' AND YEAR(dt_vencimento_conta) = '$ano' GROUP BY DAY(dt_vencimento_conta)";
			
		$busca = $conexao->query($consulta);
		//$tabela = array();
		while($info = $busca->fetch_assoc()){
			if($mes == 0){
				//$tabela .= "['".$info['MONTH(dt_vencimento_conta)']."',".$info['SUM(vl_conta)']."],";
				setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
				//$tabela .= "['".utf8_encode( strftime("%B de %Y", strtotime("2001-" . $info['MONTH(dt_vencimento_conta)'] . "-01")));
				$tabela .= "['".
				ucfirst( utf8_encode( strftime("%B", strtotime("2017-" . $info['MONTH(dt_vencimento_conta)'] . "-01")))).
				"',".$info['SUM(vl_conta)']."],";
				//echo ucfirst( utf8_encode( strftime("%B de %Y", strtotime("2016-09-22") ) ) );
				//$tabela .= "['".date("F", strtotime("2001-" . $info['MONTH(dt_vencimento_conta)'] . "-01"))."',".$info['SUM(vl_conta)']."],";
				//date("F", strtotime("2001-" . $month . "-01"));
			}
			else
				$tabela .= "['".$info['DAY(dt_vencimento_conta)']."',".$info['SUM(vl_conta)']."],";
        }
?>       
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
        ['Dia', 'R$ Total'],
<?php
echo $tabela;
?>//*/          
        ]);

        // Set chart options
		if(<?php echo $tipo?>==1)
			var tipo = "Lucro ";
		else
			var tipo = "Gasto ";
		
		if(<?php echo $mes?>==0)
			var tipo = tipo + "Anual";
		else{
			var months = new Array(12);
				months[0] = "Janeiro";
				months[1] = "Fevereiro";
				months[2] = "Março";
				months[3] = "Abril";
				months[4] = "Maio";
				months[5] = "Junho";
				months[6] = "Julho";
				months[7] = "Agosto";
				months[8] = "Setembro";
				months[9] = "Outubro";
				months[10] = "Novembro";
				months[11] = "Dezembro";
				
				var tipo = tipo + " de " + months[<?php echo $mes-1?>];
		}
		
        var options = {
			'title': tipo,
			'width':1000,
			'height':300,
			'vAxis':{title: 'Valor'},
			'hAxis':{title: 'Periodo'}
			}
			;

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
	<center>
    <div id="chart_div"></div>
	</center>
  </body>
</html>