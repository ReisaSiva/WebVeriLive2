var db = firebase.firestore();

function login(){
	var email =  document.getElementById('email').value;
	var password =  document.getElementById('password').value;
    var login = 0;
	db.collection("Users").where('email','==',email).where('password','==',password).get().then((querySnapshot) => {
		querySnapshot.forEach((doc) => {
            login = doc.data();
		})
        if(login != 0 ){
		    window.location.assign("task.php");
        } else {
            alert("Login Gagal");
        }
	});
}


function getDetailUser(id,code) {
   var addressuser;
   var lat2;
   var long2;
    db.collection("Users").doc(id).get().then((doc) => {
            document.getElementById("nama_verif").innerHTML = doc.data()["personalName"];
            document.getElementById("orderid_verif").innerHTML = id;
            document.getElementById("phone_verif").innerHTML = doc.data()["phoneNumber"];
            document.getElementById("birthdate_verif").innerHTML = doc.data()["birthdayField"];
            if (doc.data()["genderUser"] == "Pria") {
                document.getElementById("male").checked = true;
            } else {
                document.getElementById("female").checked  = true;  
            }
             document.getElementById("birthdate_verif").innerHTML = doc.data()["birthdayField"];
             document.getElementById("address_user").innerHTML = doc.data()["address"];
            document.getElementById("city_user").innerHTML = doc.data()["city"];
            document.getElementById("zip_code").innerHTML = doc.data()["zipCode"];
            addressuser = doc.data()["address"];
    })
    db.collection("Users/"+id+"/History Login/").where('code','==',code).get().then(querySnapshot=>{
        querySnapshot.forEach((doc)=>{
            if(doc.data()['latitude'] != null){
                $.post("https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAC2c9dXuqrmDlIMfESrOGHqw_usMiF0HQ&latlng="+doc.data()["latitude"]+","+doc.data()["longitude"]+"&sensor=false", function(data) {
                        document.getElementById("baddress_user").innerHTML = data.results[0]["formatted_address"];
                        document.getElementById("bcity_user").innerHTML = data.results[11]["formatted_address"];
                    });
                    $.post("https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAC2c9dXuqrmDlIMfESrOGHqw_usMiF0HQ&address="+addressuser+"&sensor=false", function(data) {
                    lat2 =  data.results[0].geometry.location.lat;
                    long2 = data.results[0].geometry.location.lng;
                    initMap(doc.data()["latitude"],doc.data()["longitude"],lat2,long2);
                    });
            }
        })
    })
}

function data(){
    var number = 0;
db.collection('Loan Information').orderBy("currentDateTime","desc")
.get()
.then(querySnapshot=>{
        querySnapshot.forEach((doc)=>{
            let data = doc.data();
            let row;
            if(data.status == "Terverifikasi"){
            row  = `<tr>
                            <td>${++number}</td>
                            <td>${data.name}</td>
                            <td>${data.date}</td>
                            <td>${data.amount}</td>
                            <td>${data.status}</td>
                    </tr>`;
                }else {
                     row  = `<tr>
                            <td>${++number}</td>
                            <td>${data.name}</td>
                            <td>${data.date}</td>
                            <td>${data.amount}</td>
                            <td>${data.status}</td>
                            <td><a href="index.php?id_user=${data.user_id}&coderoom=${data.code}&idloan=${doc.id}">Verifikasi</a></td>
                    </tr>`;
                }
            let table = document.getElementById('myTable')
            table.innerHTML += row
        });
    })
    .catch(err=>{
        // console.log(`Error: ${err}`)
    });
}


    function initMap(pos1lat,pos1long,pos2lat,pos2long) {
        // The location of Uluru
        const position1 = { lat: parseFloat(pos1lat), lng: parseFloat(pos1long) };
        const position2 = { lat:  pos2lat, lng:  pos2long };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("googleMap"), {
          zoom: 15,
          center: position1,
        });
        // The marker, positioned at Uluru
        const marker1 = new google.maps.Marker({
          position: position1,
          map: map,
        });

        const marker2 = new google.maps.Marker({
            position: position2,
            map: map,
          });
      }

      function processLoan(id) {
        db.collection("Loan Information").doc(id).update({
          status:"Terverifikasi"
        });
		   alert("Telah Terverifikasi");
      }