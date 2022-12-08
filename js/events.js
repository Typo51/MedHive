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
    blur.classList.toggle('active');
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



 function shareBtn()
 {
    var popup_share = document.getElementById('popup_share');
    popup_share.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    
 }

  function confirmPw()
 {
    var popup_share = document.getElementById('confirm');
    popup_share.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    
 }

  function setAppoint()
 {
    var modal2 = document.getElementById('modal-appoint');
    modal2.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 } 

 const navBar = document.querySelector("nav"),
 menuBtns = document.querySelectorAll(".menu-icon"),
 overlay = document.querySelector(".overlay");

menuBtns.forEach((menuBtn) => {
 menuBtn.addEventListener("click", () => {
   navBar.classList.toggle("open");
 });
});

overlay.addEventListener("click", () => {
 navBar.classList.remove("open");
});


 function changeAv()
 {
    var modal2 = document.getElementById('changeAvatar');
    modal2.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 } 


  function terms()
 {
    var modal2 = document.getElementById('terms');
    modal2.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 } 

   function success()
 {
    var modal2 = document.getElementById('success');
    modal2.classList.toggle('active');
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
 } 




document.getElementById('logout').addEventListener('click', ()=>{
   console.log("here")
   $.ajax({
   url: "logout-process.php",
   method: "POST",
   dataType: 'json',
   data: {
       logoutAcc: 1
   },
   success: function(response){
       console.log(response);
       if (response.status){
           window.location.replace("login.php");
       }
   }
})
})