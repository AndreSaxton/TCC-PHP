		function exibirTabelaPessoa(campoBusca="", condicaoBusca="",buscarPor=""){			
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();
		}
		function mostraDiv(){
			document.getElementById("busca").style.display="block";			
		}
		function someBuscaPessoa(){							
			document.getElementById("busca").style.display="none";
		}
		function mostraDireita(){			
			document.getElementById("direita").style.display = "block";			
		}