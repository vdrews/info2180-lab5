document.addEventListener('DOMContentLoaded', function()
{

   const lookupbtn = document.getElementById("lookup"); 
    //listening for lookupbtn being pressed 

    const xhr = new XMLHttpRequest();

    console.log(xhr)
    console.log("FUNCTIONAL")


    lookupbtn.addEventListener("click", function(e){

        e.preventDefault();
        const input = document.getElementById('country').value;

        var url = "world.php?country="+ encodeURIComponent(input);
     
    xhr.open('GET', url, true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded' );

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
    })


})