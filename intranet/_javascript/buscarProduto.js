function someBuscarProduto(){			
			//document.getElementById("asideBuscarPessoa").parentNode.style.display='none';http://localhost/Trabalho%20Semestral%20no%20PHP/salvarConta.php
			parent.someBuscaProduto();//chama a funcção do pai			
		}
		function buscarProduto(){			
			var campoBusca = document.getElementById("iNomeProdutoBusca").value;
						
			parent.exibirTabelaProduto(campoBusca);
			someBuscarProduto();			
		}