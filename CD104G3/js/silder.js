 var vitbar =1;
     var intbar =1;
     var agibar =1;
     var rbtname =1;
     var customimgslide = 1;
     showcustomimgs(rbtname);
     showcustomimgs(vitbar);
     showcustomimgs(intbar);
     showcustomimgs(agibar);
     showcustomimgs(customimgslide);
     function addbtn1(n){ //-1,+1
         showcustomimgs(customimgslide += n);
     }
     function showbtn1(n) { //0,1,2...
        showcustomimgs(customimgslide = n+1);
     }
     function showcustomimgs(n) {
            //customslides :large
            var i ;
            var img = document.getElementsByClassName("customslides"); 
            var imgnum = document.getElementsByClassName("customimg");
            var name = document.getElementsByClassName("name");
            var int = document.getElementsByClassName("int");
            var agi = document.getElementsByClassName("agi");
            var vit = document.getElementsByClassName("vit"); 
            console.log(rbtname);
            console.log(customimgslide);
            if (n > img.length) {customimgslide = 1;rbtname = 1; vitbar =1;intbar =1;agibar =1;}
            // if(n > vit.length ) { } 
            // if(n > int.length ) {  } 
            // if(n > agi.length ) { }       
            if (n < 1) { 
                customimgslide = img.length;
                rbtname = img.length;
                vitbar = img.length;
                agibar = img.length;
                intbar = img.length;
              
            }
            for (i = 0; i < img.length; i++) {
        img[i].style.display = "none";   name[i].style.display = "none";int[i].style.display = "none";
         vit[i].style.display = "none";agi[i].style.display = "none";
        }

        // for (i = 0; i < int.length; i++){
        //     
        // }
        // for (i = 0; i < vit.length; i++){
        //      
        // }
        // for (i = 0; i < agi.length; i++){
        //      
        // }
            for (i = 0; i < imgnum.length; i++) {
                imgnum[i].className = imgnum[i].className.replace("redbor", "");
            }
            name[customimgslide-1].style.display = "block"; 
            img[customimgslide-1].style.display = "block";
            int[customimgslide-1].style.display = "block";
            agi[customimgslide-1].style.display = "block"; 
            vit[customimgslide-1].style.display = "block";       
            imgnum[customimgslide-1].className += " redbor";
            document.querySelector("#robotNo").value = name[customimgslide-1].nextSibling.innerText;
        }