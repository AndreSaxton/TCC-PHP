function someBuscarPessoa(){			
			//document.getElementById("asideBuscarPessoa").parentNode.style.display='none';http://localhost/Trabalho%20Semestral%20no%20PHP/salvarConta.php
			parent.someBuscaPessoa();//chama a funcção do pai			
		}
		function buscarPessoa(){
			var condicaoBusca = document.querySelector('input[id="iCondicaoBusca"]:checked').value;
			//document.getElementById("direita").parentNode.innerHTML='<object type="text/html" data="exibirTabelaPessoa.php" style="width:100%; height: 100%;"></object>';
			if(condicaoBusca=="Nome"){//buscar por nome
				var campoBusca = document.getElementById("iNomePessoaBusca").value;
				var buscarPor = document.getElementById("iStatusBusca").value;
			}
			else{//buscar por documento
				var campoBusca = document.getElementById("iDocumentoBusca").value;
			//var campoBusca ="André";
				var buscarPor = document.getElementById("iTipoPessoaBusca").value;
			}
			
			parent.exibirTabelaPessoa(campoBusca, condicaoBusca, buscarPor);
			someBuscarPessoa();			
		}
		function mostraNome(){			
			someSection()
			document.getElementById("iBuscarNome").style.display = "block";			
		}
		function mostraDocumento(){		
			someSection()		
			document.getElementById("iBuscarDocumento").style.display = "block";			
		}
		function someSection(){			
			document.getElementById("iBuscarDocumento").style.display = "none";
			document.getElementById("iBuscarNome").style.display = "none";
		}
		function mudarDocumento(tipoDocumento){		
			//document.getElementById("pDocumento").innerHTML= tipoDocumento;
			if(tipoDocumento=="Fisica"){
				document.getElementById("pDocumento").innerHTML="CPF";
				document.getElementById("iDocumentoBusca").placeholder = "___.___.___/__";
				document.getElementById("iDocumentoBusca").value="";
				new InputMask({
				inputs : {
					'#iDocumentoBusca' : {
						mask : '___.___.___/__',
						strict : true,
						pattern : '[0-9]'
					}
				},
				mask_symbol : '_' // when underscore is used we can actually omit this parameter
				});
			}
			else{
				document.getElementById("pDocumento").innerHTML="CNPJ";
				document.getElementById("iDocumentoBusca").placeholder = "__.___.___/____-__";
				document.getElementById("iDocumentoBusca").value="";
				new InputMask({
				inputs : {
					'#iDocumentoBusca' : {
						mask : '__.___.___/____-__',
						strict : true,
						pattern : '[0-9]'
					}
				},
				mask_symbol : '_' // when underscore is used we can actually omit this parameter
				});
			}
		}