
 function llocation(){
	 var l=document.querySelector("#loca");
	 var ll=document.querySelector("#colo");
	 l.style.backgroundColor="#00BFFF";
	 ll.style.backgroundColor="#FFFFFF";
	 
 }
 function colocation(){
	 var c=document.querySelector("#colo");
	 var cc=document.querySelector("#loca");
	 c.style.backgroundColor="#00BFFF";
	 cc.style.backgroundColor="#FFFFFF";
 }
 document.querySelector("#loca").addEventListener("click",llocation);
 document.querySelector("#colo").addEventListener("click",colocation);