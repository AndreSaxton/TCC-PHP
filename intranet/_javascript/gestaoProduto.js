		function exibirTabelaProduto(campoBusca=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaProduto.php?campoBusca='+campoBusca+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();
		}
		
		function someBuscaProduto(){							
			document.getElementById("busca").style.display="none";
		}
		function mostraDireita(){			
			document.getElementById("direita").style.display = "block";			
		}
		function mostraDiv(){			
			document.getElementById("busca").style.display = "block";			
		}		