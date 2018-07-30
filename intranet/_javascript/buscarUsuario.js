function someBuscarUsuario(){			
			parent.someBusca();//chama a funcção do pai			
			//document.write("teste");
		}
		function buscarUsuario(){
			var departamento = document.getElementById("iDepart").value;
			var nome = document.getElementById("iNomeUsuarioBusca").value;
						
			parent.exibirTabelaUsuario(departamento, nome);
			someBuscarUsuario();			
			//document.write(departamento,nome);
			
		}		