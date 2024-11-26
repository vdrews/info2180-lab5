document.addEventListener('DOMContentLoaded', function()
{

   const lookupcountry = document.getElementById("lookup"); 
   const lookupcity = document.getElementById("city");


    lookupcountry.addEventListener("click", function(e){
        e.preventDefault();
        btnclicked(e);

    });


   lookupcity.addEventListener("click", function(e){
        e.preventDefault();
        btnclicked(e);
    });


    function btnclicked(event){
        var  clickedBtn = event.target;
        const xhr = new XMLHttpRequest();

        if(clickedBtn.id == "lookup"){
                const input = document.getElementById('country').value;
            
                var url = "world.php?country="+ encodeURIComponent(input) + "&city=false";
            
                xhr.open('GET', url, true);
           
                xhr.onload = function(){
                    if(this.status == 200){
                    result.innerHTML = this.responseText;
                    console.log(result.innerHTML);
                    }
                }
                xhr.onerror = function(){
                    console.log('request error ');
                }
            
                xhr.send();

        console.log("a country yah look");


        }
        else if(clickedBtn.id == "city") {
            console.log("a city yah look");

            const input = document.getElementById('country').value;
            
            var url = "world.php?country="+ encodeURIComponent(input) + "&city=true";
        
            xhr.open('GET', url, true);


            xhr.onload = function(){
                if(this.status == 200){
                result.innerHTML = this.responseText;
                console.log(result.innerHTML);
                }
            }
            xhr.onerror = function(){
                console.log('request error ');
            }
        
            xhr.send();
        }


    }



})