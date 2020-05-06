$(document).ready(function(){

  $.getJSON("https://api.covid19india.org/data.json",function(data){
    var states =[];
    var confirmed =[];
    var recovered =[];
    var deaths =[];
    var total_confirmed;
    var total_active;
      var total_recovered;
        var total_deaths;

        total_confirmed =data.statewise[0].confirmed;
        total_active =data.statewise[0].active;
        total_recovered =data.statewise[0].recovered;
        total_deaths =data.statewise[0].deaths;

        $("#confirmed").append(total_confirmed);
        $("#active").append(total_active);
        $("#recovered").append(total_recovered);
        $("#deaths").append(total_deaths);
  //console.log(data.statewise);
  $.each(data.statewise,function(id,obj ){
  states.push(obj.state);
  confirmed.push(obj.confirmed);
  recovered.push(obj.recovered);
  deaths.push(obj.deaths);
  });
console.log(states);
states.shift(); //remove the 1st entry (total)
confirmed.shift();
recovered.shift();
deaths.shift();

//Chart intit
var myChart = document.getElementById("myCanvas").getContext('2d');
var chart =new Chart(myChart,{
  type:"bar",
  data:{
    labels:states,
    datasets:[
      {
        label:"Confirmed",
        data:confirmed,
        backgroundColor:"#f1c40f",
        minBarLength:70,
      },
      {
        label:"Recovered",
        data:recovered,
        backgroundColor:"#2ecc71",
        minBarLength:70,
      },
      {
        label:"Deceased",
        data:deaths,
        backgroundColor:"#e64c3c",
        minBarLength:70,
      },
    ]
  },
  options:{}
}) // constructor

});
});
