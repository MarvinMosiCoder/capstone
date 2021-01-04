$(document).ready(function() {

  /**
   * call the data.php file to fetch the result from db table.
   */
  $.ajax({
    url : "data2.php",
    type : "GET",
    success : function(data){
      console.log(data);
       
       
       var case1 = [];
       var case2 = [];
       var case3 = [];

       var date1 = [];
       var date2 = [];

       var name1 = [];
       var name2 = [];
       var name3 = [];

        for (var i in data) {
          if (data[i].blotterType == "Mataba") {
          case1.push(data[i].Type);
          name1.push(data[i].blotterType);
          date1.push(data[i].b_date);
        }
         if (data[i].blotterType == "natalo sa pusathan") {
          case2.push(data[i].Type);
          name2.push(data[i].blotterType); 
          date2.push(data[i].b_date);         
        }
        if (data[i].blotterType == "Abuse") {
          case3.push(data[i].Type);
          name3.push(data[i].blotterType); 
          date2.push(data[i].b_date);         
        }

        
        
      }

      //get canvas
      var ctx = $("#graphCanvas");

      var data = {
        labels : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets : [
          {
            label : date1,
            data : case1,
            backgroundColor : "blue",
            borderColor : "lightblue",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          },

          {
            label :name2 ,
            data                : case2,
            backgroundColor : "green",
            borderColor : "lightgreen",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          },

          
         
        ]
      };

      var options = {
        title : {
          display : true,
          position : "top",
          text : "Blotter Records Report",
          fontSize : 18,
          fontColor : "#111"
        },
        legend : {
          display : true,
          position : "bottom"
        }
      };

      var chart = new Chart( ctx, {
        type : "bar",
        data : data,
        options : options
      } );

    },
    error : function(data) {
      console.log(data);
    }
  });

});