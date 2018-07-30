<!DOCTYPE html>
<html id="htmlFotos">
<head>
    <title></title>
    <script type="text/javascript">            
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

            
            habilitarBtn(2);
          } else {
            preview.src = "../../_imagem/noImage.png";
            document.getElementById("fotoAtual").value = "noImage.png";

            
            habilitarBtn(0);
          }          
      }
      
      function usarImagem(){
      	let cdFoto = document.getElementById('codFoto').value;
      	//alert("Usando: "+cdFoto);
      	//body.style.display = "none";

        let mae = parent.document.getElementById('esquerda');
        //let myImg = mae.getElementsByTagName('img')[0];
        
        let img=document.getElementById('foto').getAttribute('src');
        //alert(img)
        parent.mudaFoto(img, cdFoto);


      	sair();
      }
      function salvarImagem(){
      	//alert("Salvando nova imagem:");        
      }
      function excluirImagem(){
      	let cdFoto = document.getElementById('codFoto').value;
      	//alert("Excluindo: "+cdFoto);
        if (confirm("Deseja excluir esta imagem?")) {
          if (cdFoto==1)
            alert("Não é possivel excluir esta imagem!");
          else
            window.location = "../_php/deletarImagem.php?nCodigo="+cdFoto;
        }        
      }
      function sair(){
      	//document.getElementsByTagName("BODY")[0].style.display = "none";
        parent.document.getElementById('imgs').style.display="none";
      }


      function selecionarFoto(img,cdFoto){
      	//document.getElementById('fileSelect').value='';
      	let foto = img;      	
      	var c = foto.childNodes;
		let src = foto.querySelector("#fotoImg").src;
		document.getElementById('foto').src = src;

		document.getElementById('codFoto').value=cdFoto;
		//alert(cdFoto);
		habilitarBtn(1);
      }
      //var temFoto = 0;
      function habilitarBtn(condicao){
      	//alert(document.getElementById('fileSelect').value);
      	//alert(temFoto);

      	if (condicao==1) {
      		document.getElementById("btn1").disabled = false;
	      	document.getElementById("btn1").style.opacity = "1";	      	
	      	document.getElementById("btn3").disabled = false;
	      	document.getElementById("btn3").style.opacity = "1";
      	}
      	else if (condicao==2) {      		
	      	document.getElementById("btn2").disabled = false;
	      	document.getElementById("btn2").style.opacity = "1";	      	
      	}
      	else{
      		document.getElementById("btn1").disabled = true;
	      	document.getElementById("btn1").style.opacity = "0.5";
	      	document.getElementById("btn2").disabled = true;
	      	document.getElementById("btn2").style.opacity = "0.5";
	      	document.getElementById("btn3").disabled = true;
	      	document.getElementById("btn3").style.opacity = "0.5";
      	} 
      }      
    </script>
    <style type="text/css">
    	#fotos{
    		/*background-color: cyan;*/
    		width: auto;
    		text-align: center;    		
    	}
    	#menuFotos{
    		/*background-color: grey;*/
    		width: auto;
    	}
    	table,td{
    		border: 2px solid black;
    	}
    	table{width: 100%;}
    	#btn1,#btn2,#btn3{opacity: 0.5;}
    	#menuFotos button{width: 100%;}
    	/*html#htmlFotos{display: table;margin: auto;}
    	body#bodyFotos{
    		width: 425px;
    		vertical-align: middle;
    		display: table-cell;
    	}*/      
    	img {
		    position: relative;
		    transition: 0.3s ease;
		    cursor: pointer;
		}
    	img:hover{
    		transform: scale(5, 5); /** default is 1 */
    		z-index: 2;
    	}
    </style>
</head>
<body id="bodyFotos">
	<div id="menuFotos">
    
    <form method="POST" name="cadastroProduto" action="../_php/salvarImagem.php" id="formCadastro" enctype="multipart/form-data">

	<table>
		<tr><td>
	    <button type="button" id="btn1" disabled onclick="usarImagem()">Usar Imagem</button>
		</td><td>      
    	<input type="file" name="photo" id="fileSelect" onchange="previewFile()" onclick="habilitarBtn(0)">
    	</td></tr>      
      <tr><td>
	    <button id="btn2" disabled onclick="salvarImagem()">Salvar Imagem</button></td>      
	    <td style="display: none;"><input type="number" id="codFoto" readonly></td>
	    <td rowspan="5">Imagem Atual:
	    <?php
        $imagem="";
        if($imagem!=""){
                echo"<input type='image' disabled='' src='../../_imagem/$imagem' height='50' width='50' id='foto'></td></tr>
                <input type='hidden' name='fotoAtual' value='$imagem' id='fotoAtual'>";
            } else {
                echo"<input type='image' disabled='' src='../../_imagem/noImage.png' height='100' width='100' id='foto'></td></tr>
                <input type='hidden' name='fotoAtual' value='noImage.png' id='fotoAtual'>";
            }
        ?>
	    <!--/td></td--></tr><tr><td>
	    <button type="button" id="btn3" disabled onclick="excluirImagem()">Excluir Imagem</button>
		</td></tr>
		<tr style="visibility: hidden;"><td>g</td></tr>   
		<tr><td><button onclick="sair()">Cancelar</button></td></tr>   
    </table>

  </form>

    </div>
		
		<div id="fotos">
        <?php
        $busca = "SELECT imagem.* FROM imagem";
        require_once('../conexao.php'); //chama o arquivo de conexão com o banco       
        $busca = $conexao->query($busca);     

        echo "<table>";
        $cont = 1;
        while($info = $busca->fetch_assoc()){
        	if ($cont ==1)
        		echo "<tr>";        	
		    echo"
		        <!--td style='display:none' id='codFoto'>".$info['cd_imagem']."</td-->
		        <td class='foto' onclick='selecionarFoto(this,".$info['cd_imagem'].")' id=".$info['cd_imagem'].">
		        	<img src='../../_imagem/". $info['nm_imagem']."' height='50' width='50' name='src".$info['cd_imagem']."' id='fotoImg'>
		           	<br>". $info['nm_imagem']."</td>";	    
		    if ($cont ==3){
		    	echo "<tr/>";
		    	$cont =1;
		    } else{
		    	$cont++;
		    }
    	}
        echo "</table>";
    	?>
    	</div>
</body>
</html>