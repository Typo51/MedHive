
function sidebar(){
 var sbarContainer = document.getElementById("sbarContainer");
 sbarContainer.classList.toggle("active");
}

function search(){
    var searchBtn = document.getElementById("searchBtn");
    searchBtn.classList.toggle("active");
   }

// function loadProfile(){
//     console.log("empty")
//     if(window.XMLHttpRequest){
//         xmlhttp = new XMLHttpRequest();

//     } else {
//         xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
//     }
    
//     xmlhttp.onreadystatechange = function(){
//         if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
//             document.getElementById('body-container').innerHTML = xmlhttp.responseText;
//         }
//     }

//     xmlhttp.open('GET', 'patientView.php', true);
//     xmlhttp.send();
// }


