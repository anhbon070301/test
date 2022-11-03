//alert('aaa');

//promise để khắc phục tình trạng ko đồng bộ, giải quyết callback hell gây rối mắt khi code

function a(){
       var promise = new Promise(
        function(resolve,reject){
            resolve();
        }
    );
    
    promise
        .then(function(){
            alert('thanh cong');
        })
        .then(function(){
            alert('thanh cong 1');
        }).catch(function(){
            alert('that bai');
        })
        .finally(function(){
            console.log("ket thuc");
        });
}
var thoitiet = document.querySelector('.thoitiet')
// fetch('https://api.openweathermap.org/data/2.5/weather?lat=35&lon=139&appid=8b0910466d68eb72b56fd44d4748146b')
//   .then(response =>{
//         return response.json()
//   } )
//   .then(json => {console.log("Dữ liệu",json)}
        
//   )
async function weather(){
    //let api = 'https://api.openweathermap.org/data/2.5/weather?lat=35&lon=139&appid=8b0910466d68eb72b56fd44d4748146b'
    // let api = 'http://localhost:7882/websv/user.php'
    // let data = await fetch(api).then(
    //     res=>res.json()
    // )
    // console.log('data là',data);
  

    fetch('https://maps.googleapis.com/http://localhost:7882/websv/user.php')
  .then(response => response.json())
  .then(data => console.log(data));
  
}
weather();

function test() {

    var  i = 0;
    console.log("Test " + i++);
    
   
}

