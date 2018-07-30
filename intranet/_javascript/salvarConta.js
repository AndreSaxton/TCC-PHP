		function exibirTabelaPessoa(campoBusca="", condicaoBusca="",buscarPor=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();			
		}
		function exibirTabelaConta(campoBusca="",campoBusca2="", condicaoBusca="", buscarPor=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaConta.php?campoBusca='+campoBusca+'&campoBusca2='+campoBusca2+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();
		}
		function mostraDireita(){			
			document.getElementById("direita").style.display = "inline-block";
		}
		function mostraDireitaPessoa(){			
			document.getElementById("direita").style.display = "inline-block";
		}
		function mostraBuscaPessoa(){
			someDiv()			
			document.getElementById("buscaPessoa").style.display = "block";			
		}		
		function mostraBuscaConta(){
			someDiv();
			document.getElementById("buscaConta").style.display = "block";			
		}		
		function someDiv(){			
			document.getElementById("buscaPessoa").style.display="none";
			document.getElementById("buscaConta").style.display="none";
		}
		function someTabela(){			
			document.getElementById("direita").innerHTML = "none";			
		}
		function someBuscaConta(){			
			document.getElementById("buscaConta").style.display="none";
		}
		function someBuscaPessoa(){			
			document.getElementById("buscaPessoa").style.display="none";
		}		
		function carregarDadosPessoa(cd_pessoa="",cd_conta=""){				 			
			carregarDadosConta(cd_conta, cd_pessoa)
		}
		var cod_conta = "";
		function carregarDadosConta(cd_conta="", cd_pessoa=""){
			if(cd_conta!="")
				cod_conta=cd_conta;				
			if(cd_conta=="")
				cd_conta=cod_conta;
						
			document.getElementById("esquerda").innerHTML='<object type="text/html" data="salvarContaDiv.php?nCodigo='+cd_conta+'&nPessoa='+cd_pessoa+'" style="width:250px; height: 440px;"></object>';
		}