 /*wala ko pa na separate ang js kay way gagana try ko pa karon ehe*/

 function appointment()
 {
    var modal1 = document.getElementById('modal1');
    modal1.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 
 } 
 function sched()
 {
    var modal1 = document.getElementById('modal4');
    modal1.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 
 } 
 
 function conference()
 {
    var modal2 = document.getElementById('modal2');
    modal2.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 } 
 
 function logs()
 {
    var modal3 = document.getElementById('modal3');
    modal3.classList.toggle('active');
    var blur = document.getElementById('blur');
    //blur.classList.toggle('active');
 } 
 function doctorCard()
{
   var modaldoc = document.getElementById('modaldoc');
   modaldoc.classList.toggle('active');
   var blur = document.getElementById('blur');
   blur.classList.toggle('active');
} 
 

function patientModal1()
{
   var patient1 = document.getElementById('patient1');
   patient1.classList.toggle('active');
   var blur = document.getElementById('blur');
   blur.classList.toggle('active');
}
function patientModal2()
{
   var patient2 = document.getElementById('patient2');
   patient2.classList.toggle('active');
   var blur = document.getElementById('blur');
   blur.classList.toggle('active');
}


function doctorsModal1()
{
   var doctor1 = document.getElementById('doctor1');
   doctor1.classList.toggle('active');
   var blur = document.getElementById('blur');
   blur.classList.toggle('active');
}

function doctorsModal2()
{
   var doctor2 = document.getElementById('doctor2');
   doctor2.classList.toggle('active');
   var blur = document.getElementById('blur');
   blur.classList.toggle('active');
}



function cancel_appointment(id) {
   if(confirm("Are you sure? You want to delete this record?")){ $.ajax({
      url: "appointment-process.php",
      method: "POST",
      dataType: 'json',
      data:{
        appointmentID: id
      },
      success: function(response){
        console.log(response);
        window.location.href="patientsdb.php";
      }
      })}
else{
     alert('ok');
    }
  

}


function share()
 {
    var share = document.getElementById('popup-share');
    share.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 
 } 