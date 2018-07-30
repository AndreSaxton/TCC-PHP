function validarDeletarProduto(){			
			var codigo = document.getElementById("iCodigo").value;
			
			if(codigo=="")
				alert('Selecione o Produto a ser Deletado.');
			else{
				window.location = "_php/validarDeletarProduto.php?nCodigo="+codigo;
				}
		}		


function previewFile() {
  var preview = document.querySelector('#foto');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {  	
    reader.readAsDataURL(file);

    document.getElementById("fotoAtual").value = file.name;

  } else {
    preview.src = "../_imagem/noImage.png";
    document.getElementById("fotoAtual").value = "noImage.png";
  }
}

