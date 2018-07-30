function testePrint(){
			document.getElementById("buttonTestePrint").style.display = "none";			
			 window.print();
			 document.getElementById("buttonTestePrint").style.display = "block";	
		}
		function carregarDadosUsuario(cd_usuario,t){
			parent.carregarDadosUsuario(cd_usuario);
			
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