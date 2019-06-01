const net = require('net');
var mysql = require('mysql');

const server = net.createServer((c) => {
  console.log('Client connect');
  c.on('data', function (data) {
    //console.log(data);
   var buf = Buffer.from(data);
   console.log(buf);
    var f =buf.toString();
    var i=f.search(":");
    var P=f.lastIndexOf(":");
    var H=f.slice(i+1,P);
    var T=f.slice(0,i);
    var P=f.slice(P+1,f.length);
   
 
    if(T.length>1){
      console.log("temp : "+T);
      console.log("hum : "+H);
      console.log("pump : "+P);
      run(T,H,P);
    }
   
    c.on('error', (err) => {
    console.log(err);
    });
});
});
server.on('error', (err) => {
  console.log(err);
});

server.listen(1000, () => {
  console.log('server Start');
});


function run(temp,hum,pump){

    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "arduino"
      });
      
      con.connect(function(err) {
        if (err) {
          console.log(err);
        }
        console.log("Connected!");
        //INSERT INTO `temp` (`id`, `temp`, `humidity`, `Date`, `Time`) VALUES (NULL, '1', '1', '2019-05-07', '46:15:00');
        var sql = "INSERT INTO temp (id, temp,humidity,Date,Time,pump) VALUES ('null',?, ?,NOW(),NOW(),?)";
        
        con.query(sql,[temp, hum,pump] ,function (err, result) {
          if (err) {
            console.log(err);
          }
          console.log("1 record inserted");
        });
       
      });
 
      con.commit();
      //con.end();

      
}