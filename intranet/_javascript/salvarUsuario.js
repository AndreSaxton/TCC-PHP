function mostraDireita(){			
			document.getElementById("direita").style.display = "inline-block";			
		}
		function mostraDiv(){			
			document.getElementById("busca").style.display = "block";			
		}
		function someBusca(){							
			document.getElementById("busca").style.display="none";
			document.getElementById("buscaPessoa").style.display="none";
		}
		function exibirTabelaUsuario(nDepartamento="", nNome=""){			
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaUsuario.php?nDepartamento='+nDepartamento+'&nNome='+nNome+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();
		}
		
		var cod_usuario = "";
		function carregarDadosUsuario(cd_usuario="",cd_pessoa=""){
			if(cd_usuario!="")
				cod_usuario=cd_usuario;	
			if(cd_usuario=="")
				cd_usuario=cod_usuario;
			
			document.getElementById("esquerda").innerHTML='<object type="text/html" data="salvarUsuarioDiv.php?nCodigo='+cd_usuario+'&nPessoa='+cd_pessoa+'" style="width:100%; height: 440px;"></object>';
		}
		
		function exibirTabelaPessoa(campoBusca="", condicaoBusca="",buscarPor=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();			
		}
		function mostraBuscaPessoa(){
			document.getElementById("buscaPessoa").style.display = "block";			
		}
		function someBuscaPessoa(){
			someBusca();
		}
		function carregarDadosPessoa(cd_pessoa=""){
			var cd_usuario="";
			carregarDadosUsuario(cd_usuario, cd_pessoa)
		}