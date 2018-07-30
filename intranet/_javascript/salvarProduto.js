function mostraDireita(){			
			document.getElementById("direita").style.display = "inline-block";			
			
			
			
			/*let a = document.getElementsByTagName("div")[0].getElementsByTagName("aside")[0].getAttribute('id');
			let a = document.getElementsByTagName("div")[0].getElementsByTagName("aside")[0];
			a=a.getElementsByTagName("DIV");
			a = a.getAttribute("id");
			alert(a);*/			
		}
		function mostraDiv(){			
			document.getElementById("busca").style.display = "block";			
		}
		function someDiv(){			
			document.getElementById("busca").style.display="hidden";
		}
		function someBuscaProduto(){							
			document.getElementById("busca").style.display="none";
		}
		function exibirTabelaProduto(campoBusca=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaProduto.php?campoBusca='+campoBusca+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();
		}
		function carregarDadosProduto(cd_pessoa=""){			
			document.getElementById("esquerda").innerHTML='<object type="text/html" data="salvarProdutoDiv.php?nCodigo='+cd_pessoa+'" style="width:100%; height: 440px;"></object>';
		}