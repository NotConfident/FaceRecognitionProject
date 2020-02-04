
// (function(){
//     var newscript = document.createElement('script');
//     newscript.type = 'text/javascript';
//     newscript.async = true;
//     newscript.src = 'https://www.gstatic.com/firebasejs/3.0.2/firebase.js';
//       (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(newscript);
//     })();
//     _setFormData = function setFormData (sel, data) {
//     console.info('setting form to data', data);
//     var inputList = document.querySelectorAll(sel + ' [name]');
//       [].forEach.call(inputList, function(input) {
//     console.log(input);
//     if (data[input.name] && data[input.name] !== "undefined") {
//     input.value = data[input.name];
//           }
//       });
//     };
//     var _fb;
//     var fbToForm = function fbToForm (key, sel) {
//     var config = config || {
//             apiKey: "<REPLACE ME>",
//             authDomain: "<REPLACE ME>",
//             databaseURL: "<REPLACE ME>",
//             storageBucket: "<REPLACE ME>",
//         };
//         _fb = _fb && _fb.name === "fbToForm" ? _fb : firebase.initializeApp(config, "fbToForm");
//     _fb.database().ref('user-data/' + key).on('value', function(snapshot) {
//     _setFormData(sel, snapshot.val());
//         });
//     };


init();

function init(){
    funct1();
    writeUserData();
}

function funct1(){

  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDhEAK4p7w3Wa1vH2CtYeWjvmVDzIDNaZE",
    authDomain: "notificationsv1.firebaseapp.com",
    databaseURL: "https://notificationsv1.firebaseio.com",
    projectId: "notificationsv1",
    storageBucket: "notificationsv1.appspot.com",
    messagingSenderId: "922982867308",
    appId: "1:922982867308:web:e89a7d00ec90ce91489349",
    measurementId: "G-4RDELCSLYM"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  var database = firebase.database();
}

function sendname(){
    var name = document.getElementById("name").value;
    var studentID = document.getElementById("studentID").value;

    if (name != ""){
        firebase.database().ref('IT01/' + studentID).set({
            'Name': name,
            'StudentID': studentID
        },function(error) {
            if (error) {
                alert('Push Failed!');
            } else {
                alert('Push Sucess!');
            }
        });
        localStorage.setItem("TempName", name);
        localStorage.setItem("TempID", studentID);

        window.location.replace = ('https://127.0.0.1:8080/student.html');
    }
}

function writeUserData() {
    var comments = document.getElementById("comments").value;
    var currentdate = new Date().toLocaleString();

    if (comments != ""){
        firebase.database().ref('IT01/' + localStorage.getItem("TempID")).set({
            'Name': localStorage.getItem("TempName"),
            'StudentID': localStorage.getItem("TempID"),
            'Remarks': comments,
            'Remarks DateTime': currentdate
        }, function(error) {
            if (error) {
                alert('Push Failed!');
            } else {
                alert('Comment Pushed!');
            }
        });
        localStorage.setItem("AtendanceTime", currentdate);
        localStorage.setItem("Comments", comments);

    }
}

function getBase64(element) {
    var file = element.files[0];
    var reader = new FileReader();
    var currentdate = new Date().toLocaleString();

    reader.onloadend = function() {
      localStorage.setItem("Base64", reader.result);
    }
    console.log(localStorage.getItem("Base64"));

    reader.readAsDataURL(file);

    firebase.database().ref('IT01/' + localStorage.getItem("TempID")).set({
        'Name': localStorage.getItem("TempName"),
        'StudentID': localStorage.getItem("TempID"),
        'Remarks': localStorage.getItem("Comments"),
        'Remarks DateTime': localStorage.getItem("AtendanceTime"),
        'Base64': localStorage.getItem("Base64"),
        'Image Upload Time': currentdate
    }, function(error) {
        if (error) {
            alert('Push Failed!');
        } else {
            alert(localStorage.getItem("Base64"));
        }
    });

    // document.getElementById("img").setAttribute('src', localStorage.getItem("Base64"));


    // var ref = firebase.database().ref("IT01/ " + localStorage.getItem("TempID"));
    // ref.on("value", function(snapshot) {
    //     var childData = snapshot.val();
    //     var key = Object.keys(childData)[0];    //this will return 1st key.         
    //     console.log(childData[key].id);
    // });

}








