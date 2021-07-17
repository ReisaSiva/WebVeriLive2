var db = firebase.firestore();
data();
sort();

function login(){
	var email =  document.getElementById('email').value;
	var password =  document.getElementById('password').value;
	console.log(email,password);
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


function data(){
    var number = 0;
db.collection('Loan Information').orderBy("currentDateTime","desc")
.get()
.then(querySnapshot=>{
        querySnapshot.forEach((doc)=>{
            let data = doc.data();
            let row  = `<tr>
                            <td>${++number}</td>
                            <td>${data.name}</td>
                            <td>${data.date}</td>
                            <td>${data.amount}</td>
                            <td>${data.status}</td>
                    </tr>`;
            let table = document.getElementById('myTable')
            table.innerHTML += row
        });
    })
    .catch(err=>{
        console.log(`Error: ${err}`)
    });
}

// function sort(){
//     const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

// const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
//     v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
//     )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

// // do the work...
// document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
//     const table = th.closest('table');
//     Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
//         .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
//         .forEach(tr => table.appendChild(tr) );
// })));
//     }