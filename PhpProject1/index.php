<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <style>
* {
  box-sizing: border-box;
  font-family: sans-serif;
}

body{
               background-image: url(bg2.jpg);

               /* Center and scale the image nicely */
               background-position: center;

               background-size: cover;
               position: relative;
           }

.box {
  float: left;
  width: 50%;
  padding: 50px;
  height: 300px;
}
.box{
    background-color: rgba(30, 144, 255,0.9);
    padding: 50px 50px 50px 50px;
    border-radius: 50px;
    
   margin: 30px;
   height: 200px;
   width: 300px;
   
   
   
}
.box2{
    background-color: rgba(30, 144, 255,0.9);
    padding: 20px 50px 50px 50px;
    border-radius: 50px;
    margin-left: 20%;
    margin-top: -40px;
    margin-bottom: 10px;
   
   height: 150px;
   width: 300px;
}
.clearfix{
    margin: 20px 20px 20px 20px;
}
.clearfix::after {
  content: "";
  clear: both;
  display: table;
  margin: 70px;
}
.bg{
    background-color: rgba(255,255,255,0.9);
    margin: 50px 200px 200px 200px;
    padding-top: 60px;
    padding-bottom: 100px;
    opacity: 1;
    border-radius: 20px;
}
</style>

    </head>
<body>
    <div class="bg">
        <h2 style="text-align: center ;padding: 50px;width: 670px;margin-left: 29%;
            border-radius: 30px;background-color: rgba(60, 179, 113,0.9);">เพาะปลูกถั่วงอก</h2>
<div style="margin-left: 390px; text-align: center;  ">
    

    <div class="clearfix">
  <div class="box">
  <h2>Temparature</h2>
  <div id="TEMP">null</div>
  </div>
  <div class="box">
  <h2>Humidity</h2>
 <div id="HUM">null</div>
  </div>
</div>
    <div class="box2">
    <h2>ปั้ม</h2>
   <div id="PUMP">null</div>
    </div>
   
</div>
    
        <div class="bt" style="text-align: center;">
            <button id="btn" style="border-radius: 15px;font-size: 20px;width: 200px; height: 50px;color: white; background-color: rgb(106, 90, 205);" onclick="DATE()">เริ่มเพาะปลูก</button>
    </div>
        <div style="border-color: red;margin-left: 29%;border-style: solid; width: 670px; height: 200px; margin-top: 50px;border-radius: 20px;">
            
             <h3 style="text-align: center;">ระยะเวลาเพาะปลูก</h3>   
             <h4 style="text-align: center;" id="sd">วันที่เพาะปลูก : null </h4>
             <h4 style="text-align: center;"  id="se">วันที่เก็บเกี่ยว : null</h4>
      
           
             
        </div>
        <script>
          
          setInterval(function (){
               $.get('temp.php', function (temp) {
                        document.getElementById('TEMP').innerHTML=temp;
                    });
          },100);
            setInterval(function (){
               $.get('hum.php', function (hum) {
                        document.getElementById('HUM').innerHTML=hum;
                    });
          },100);
           setInterval(function (){
               $.get('pump.php', function (pump) {
                        document.getElementById('PUMP').innerHTML=pump;
                    });
          },100);
            
           setInterval(function (){
               $.get('db.php', function (data) {
                   var D1=data;
                    document.getElementById('sd').innerHTML="วันที่เพาะปลูก :"+D1;
                  if(D1.length>4){
                   var D2=D1.search(':');
                   var D3=D1.slice(0,D2);
                   var D4=D1.slice(D2+1,D1.length);
                 document.getElementById('sd').innerHTML="วันที่เพาะปลูก :"+D3;
                
                document.getElementById('se').innerHTML="วันที่เก็บเกี่ยว : "+D4;
                document.getElementById('btn').innerHTML="ยกเลิก";
                  }else{
                       document.getElementById('btn').innerHTML="เริ่มเพาะปลูก";
                             document.getElementById('sd').innerHTML="วันที่เพาะปลูก : null";
                
                document.getElementById('se').innerHTML="วันที่เก็บเกี่ยว :null ";
                  }
              
                
                    });
          },100); 
            
            var date=new Date();
            let current_datetime = new Date();
let formatted_date = current_datetime.getDate() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear();
let enddate= current_datetime.getDate()+2 + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear();    
    function DATE(){
                $.get('db.php', function (data) {
                     var D7=data;
             if(D7.length>4){
                 
               xhttp = new XMLHttpRequest();
               xhttp.open("GET", "save.php?s=0&e=0", true);
               xhttp.send();
           }else{
                   xhttp = new XMLHttpRequest();
             xhttp.open("GET", "save.php?s="+formatted_date+"&e="+enddate, true);
              xhttp.send();
           }
 });
            }
            
            
        </script> 
        
    
    </div>
</body>
</html>
