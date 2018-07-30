function gerarGrafico(){
			var buscarPor = document.getElementById("iTipoConta").value;
			var mes = document.getElementById("iMesConta").value;
			var ano = document.getElementById("iAnoConta").value;
			
			document.getElementById("divGrafico").innerHTML='<object type="text/html" data="googlechartMySql.php?nTipoConta='+buscarPor+'&nMesConta='+mes+'&nAnoConta='+ano+'" style="width:1030px; height: 320px;"></object>';
		}
		function setThisYear(){
			var currentTime = new Date();
			var year = currentTime.getFullYear();
			document.getElementById("iAnoConta").value = year;
		}