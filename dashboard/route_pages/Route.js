
const item=document.getElementsByClassName("item");
const form1=document.querySelector(".form-1");
const form2=document.querySelector(".form-2");
const form3=document.querySelector(".form-3");
const form4=document.querySelector(".form-4");
const form5=document.querySelector(".form-5");


item[1].style.backgroundColor="#d4d4d5";
            item[0].style.backgroundColor="#dedee1";
            item[2].style.backgroundColor="#d4d4d5";
            item[3].style.backgroundColor="#d4d4d5";
            item[4].style.backgroundColor="#d4d4d5";
form1.style.display="block";
form2.style.display="none";	  
form3.style.display="none";
form4.style.display="none";
form5.style.display="none";
        item[0].onclick=function(){
            item[1].style.backgroundColor="#d4d4d5";
            item[0].style.backgroundColor="#dedee1";
            item[2].style.backgroundColor="#d4d4d5";
            item[3].style.backgroundColor="#d4d4d5";
            item[4].style.backgroundColor="#d4d4d5";
			form1.style.display="block";
			form2.style.display="none";	  
			form3.style.display="none";
			form4.style.display="none";
			form5.style.display="none";
        }
		
		item[1].onclick=function(){
			item[1].style.backgroundColor="#dedee1";
			item[0].style.backgroundColor="#d4d4d5";
			item[2].style.backgroundColor="#d4d4d5";
			item[3].style.backgroundColor="#d4d4d5";
            item[4].style.backgroundColor="#d4d4d5";
			form2.style.display="block";
			form1.style.display="none";	  
			form3.style.display="none";
			form4.style.display="none";
			form5.style.display="none";
		}
		
		item[2].onclick=function(){
			item[2].style.backgroundColor="#dedee1";
			item[1].style.backgroundColor="#d4d4d5";
			item[0].style.backgroundColor="#d4d4d5";
			item[3].style.backgroundColor="#d4d4d5";
            item[4].style.backgroundColor="#d4d4d5";
			form3.style.display="block";
			form2.style.display="none";	  
			form1.style.display="none";
			form4.style.display="none";
			form5.style.display="none";
		}
		
		item[3].onclick=function(){
			item[3].style.backgroundColor="#dedee1";
			item[1].style.backgroundColor="#d4d4d5";
			item[2].style.backgroundColor="#d4d4d5";
			item[0].style.backgroundColor="#d4d4d5";
            item[4].style.backgroundColor="#d4d4d5";
			form4.style.display="block";
			form2.style.display="none";	  
			form3.style.display="none";
			form1.style.display="none";
			form5.style.display="none";
		}

        item[4].onclick=function(){
			item[4].style.backgroundColor="#dedee1";
			item[1].style.backgroundColor="#d4d4d5";
			item[2].style.backgroundColor="#d4d4d5";
			item[0].style.backgroundColor="#d4d4d5";
            item[3].style.backgroundColor="#d4d4d5";
			form5.style.display="block";
			form2.style.display="none";	  
			form3.style.display="none";
			form4.style.display="none";
			form1.style.display="none";
		}
        $(".click").click(function(){
            $(".account").toggle();
        })
        $("body").click(function(){
            $(".account").addClass("invi");
        })