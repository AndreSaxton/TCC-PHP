function validarDeletarPessoa(){
			var valor = document.getElementById("iDocumento").value;
			var codigo = document.getElementById("iCodigo").value;
			if(valor=="")
				alert('Selecione a Pessoa a ser Deletada.');
			else{
				window.location = "_php/validarDeletarPessoa.php?nDocumento="+valor+"&nCodigo="+codigo;
				}
		}
function mudarDocumento(tipoDocumento="Fisica"){
			if(tipoDocumento=="Fisica"){				
				document.getElementById("pDocumento").innerHTML="CPF:";
				document.getElementById("iDocumento").placeholder = "___.___.___/__";
				document.getElementById("iDocumento").value="";
				new InputMask({
				inputs : {
					'#iDocumento' : {
						mask : '___.___.___/__',
						strict : true,
						pattern : '[0-9]'
					}
				},
				mask_symbol : '_' // when underscore is used we can actually omit this parameter
				});
			}
			else{
				document.getElementById("pDocumento").innerHTML="CNPJ:";
				document.getElementById("iDocumento").placeholder = "__.___.___/____-__";
				document.getElementById("iDocumento").value="";
				new InputMask({
				inputs : {
					'#iDocumento' : {
						mask : '__.___.___/____-__',
						strict : true,
						pattern : '[0-9]'
					}
				},
				mask_symbol : '_' // when underscore is used we can actually omit this parameter
				});
			}
}