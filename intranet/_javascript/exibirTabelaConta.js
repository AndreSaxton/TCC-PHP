function testePrint(){
			document.getElementById("buttonTestePrint").style.display = "none";			
			 //self.print();
			 window.print();
			 document.getElementById("buttonTestePrint").style.display = "block";	
		}
		function carregarDadosConta(cd_conta,t){				
			parent.carregarDadosConta(cd_conta);			
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