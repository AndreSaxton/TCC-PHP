		function exibirTabelaUsuario(nDepartamento="", nNome=""){			
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaUsuario.php?nDepartamento='+nDepartamento+'&nNome='+nNome+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();
		}
		function mostraDiv(){
			document.getElementById("busca").style.display="block";			
		}
		function someBusca(){							
			document.getElementById("busca").style.display="none";
			//document.write("oiii");
		}
		function mostraDireita(){			
			document.getElementById("direita").style.display = "block";
		}