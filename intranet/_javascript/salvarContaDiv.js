function someDataPagamento(){
			var teste = document.getElementById("iCheckPagamento").checked;
			if(teste == true)
				document.getElementById("iPagamento").readOnly="true";
			else
				document.getElementById("iPagamento").removeAttribute("readonly");
			document.getElementById("iPagamento").valueAsDate = null;
		}	
	
		function validarCodigoPessoa(){			
		var valor = document.getElementById("iCodigoPessoa").value;
			if(valor==""){
				var resposta = alert('Preencha o Código da Pessoa.');
				if (resposta){
					document.write("alerta");
				}
				return false;
			}
			else
				return true;
		}
		function carregarDadosPessoa(cd_pessoa){
			document.getElementById("iCodigoPessoa").innerHTML = cd_pessoa;
		}
		function validarDeletarConta(){
			var valor = document.getElementById("iCodigoConta").value;
			if(valor=="")
				alert('Selecione a Conta a ser Deletada.');
			else{
				//document.write(valor);
				window.location = "_php/validarDeletarConta.php?nCodigoConta="+valor+"";}
		}