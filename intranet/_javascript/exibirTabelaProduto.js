function testePrint(){
			document.getElementById("buttonTestePrint").style.display = "none";			
			 //self.print();
			 window.print();
			 document.getElementById("buttonTestePrint").style.display = "block";	
		}
		function carregarDadosProduto(cd_pessoa,t){
		//function carregarDadosPessoa(cd_pessoa, nm_pessoa, nm_endereco_pessoa, cd_cep_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, nm_tipo_pessoa, /*cd_documento_pessoa,*/ nm_status_pessoa){
			
			parent.carregarDadosProduto(cd_pessoa);
			//parent.carregarDadosPessoa(cd_pessoa, nm_pessoa, nm_endereco_pessoa, cd_cep_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, nm_tipo_pessoa, /*cd_documento_pessoa,*/ nm_status_pessoa);			
			
			//echo "<tr class='um' onclick='carregarDadosPessoa(".$info['cd_pessoa'].",".$info['nm_pessoa'].",".$info['nm_endereco_pessoa'].",".$info['cd_cep_pessoa'].",".$info['cd_ddd_pessoa'].",".$info['cd_telefone_pessoa'].",".$info['nm_email_pessoa'].",".$info['nm_tipo_pessoa'].",".$info['cd_documento_pessoa'].",".$info['nm_status_pessoa'].")'>						
			
			if(prevItem != null)
				limpaClass(prevItem);
			
			if(prevItem != null){
				prevItem.className = prevItem.className.replace(/{\b}?activeItem/, "");				
			}			
				
		    t.className += " activeItem";
		    prevItem = t;			
		}
		var prevItem = null;	
		function limpaClass(item)
		{
			prevItem.className = " desactiveItem";
		}