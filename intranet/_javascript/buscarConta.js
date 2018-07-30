function someBuscarConta(){			
		//document.getElementById("asideBuscarConta").parentNode.style.display='none';
		parent.someBuscaConta();//chama a funcção do pai
		}
		function mostraNomeConta(){			
			someSectionConta()
			document.getElementById("iBuscarNomeConta").style.display = "block";			
		}
		function mostraPeriodo(){		
			someSectionConta()		
			document.getElementById("iBuscarPeriodoConta").style.display = "block";			
		}
		function someSectionConta(){			
			document.getElementById("iBuscarPeriodoConta").style.display = "none";
			document.getElementById("iBuscarNomeConta").style.display = "none";
		}
		function buscarConta(){
			var condicaoBusca = document.querySelector('input[id="iCondicaoBusca"]:checked').value;
			
			if(condicaoBusca=="Nome"){//buscar por nome
				var campoBusca = document.getElementById("iNomeBusca").value;
				var campoBusca2 = document.getElementById("iPessoaBusca").value;
			}
			else{//buscar por periodo
				var campoBusca = document.getElementById("iVencimentoBusca").value;			
			}
			
			var buscarPor = document.getElementById("iTipoContaBusca").value;
			parent.exibirTabelaConta(campoBusca,campoBusca2, condicaoBusca, buscarPor);
			someBuscarConta();			
		}