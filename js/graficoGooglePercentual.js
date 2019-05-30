 // Load the Visualization API and the corechart package.
 google.charts.load('current', {
     'packages': ['corechart']
 });

 // Set a callback to run when the Google Visualization API is loaded.
 google.charts.setOnLoadCallback(drawChart);

 // Callback that creates and populates a data table,
 // instantiates the pie chart, passes in the data and
 // draws it.
 function drawChart() {

     // Create the data table.
     var data = new google.visualization.DataTable();
     data.addColumn('string', 'Topping');
     data.addColumn('number', 'Slices');
     data.addRows([
          ['% gordura', parseFloat(document.getElementById('percentualGorduraInput').value, 10)],
          ['% livre gordura', parseFloat(document.getElementById('percentualLivreGorduraInput').value, 10)]
        ]);

     // Set chart options
     var options = {
         'title': 'Percentual de gordura',
         'margin': 0,
         'padding': 0,
         'width': 450,
         'height': 350
     };

     // Instantiate and draw our chart, passing in some options.
     var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
     chart.draw(data, options);
 }
