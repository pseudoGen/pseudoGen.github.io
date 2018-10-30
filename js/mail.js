
	

	document.getElementById('buttoncontactForm').addEventListener('click', function(e){
var id = event.currentTarget.id;
id = id.replace('button','')
		document.getElementById(id).scrollIntoView();
		
		e.preventDefault();
		e.stopPropagation(); 
				
	})

	document.getElementById('buttonabout').addEventListener('click', function(e){
        var id = event.currentTarget.id;
        id = id.replace('button','')
                document.getElementById(id).scrollIntoView();
                
                e.preventDefault();
                e.stopPropagation(); 
                        
            })
document.getElementById('feedback').addEventListener('submit', function(evt){
    evt.preventDefault();
    mail();
})
function mail(){
    alert('clicked')
    email = document.getElementById('email').value;
    name = document.getElementById('name').value;
    message = document.getElementById('message').value;
    subject = document.getElementById('subject').value;
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById('feedback').reset();
        alert('Submitted')
    }
  };
  xhttp.open("POST", "../ecas/email.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`email=${email}&message=${message}&subject=${subject}&name=${name}`);
}