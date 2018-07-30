function someBuscaConta(){
			document.getElementById("busca").style.display="none";
		}		
		function exibirTabelaConta(campoBusca="",campoBusca2="", condicaoBusca="", buscarPor=""){			
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaConta.php?campoBusca='+campoBusca+'&campoBusca2='+campoBusca2+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();	
		}
		function mostraDiv(){
			document.getElementById("busca").style.display="block";			
		}		
		function mostraDireita(){			
			document.getElementById("direita").style.display = "block";			
		}