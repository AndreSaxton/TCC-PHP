function validarDeletarUsuario(){
			var valor = document.getElementById("iCodigoUsuario").value;
			if(valor=="")
				alert('Selecione o Usuario a ser Deletado.');
			else{
				//document.write(valor);
				window.location = "_php/validarDeletarUsuario.php?nCodigo="+valor+"";}
		}