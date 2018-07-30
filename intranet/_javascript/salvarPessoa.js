function mostraDireita(){			
			document.getElementById("direita").style.display = "inline-block";			
		}
		function mostraDiv(){			
			document.getElementById("busca").style.display = "block";			
		}
		function someDiv(){			
			document.getElementById("busca").style.display="hidden";
		}
		function someBuscaPessoa(){							
			document.getElementById("busca").style.display="none";
		}
		function exibirTabelaPessoa(campoBusca="", condicaoBusca="",buscarPor=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();
		}
		function carregarDadosPessoa(cd_pessoa=""){			
			document.getElementById("esquerda").innerHTML='<object type="text/html" data="salvarPessoaDiv.php?nCodigo='+cd_pessoa+'" style="width:100%; height: 440px;"></object>';
		}