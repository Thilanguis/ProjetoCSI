 // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

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
          ['Tricipital', parseInt(document.getElementById('tricipital').value, 10)],
          ['subescapular', parseInt(document.getElementById('subescapular').value, 10)],
            ['suprailiaca', parseInt(document.getElementById('suprailiaca').value, 10)],
            ['abdominal', parseInt(document.getElementById('abdominal').value, 10)],
            ['quadriceps', parseInt(document.getElementById('quadriceps').value, 10)]
        ]);

        // Set chart options
        var options = {'title':'Percental de dobras cutâneas em mm³',
                       'margin':0,
                       'padding':0,
                       'width':450,
                       'height':350};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }