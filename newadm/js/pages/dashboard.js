//[Dashboard Javascript]

//Project:  Bonito Admin - Responsive Admin Template
//Version:  1.1.0
//Last change:  10/09/2017
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';

  // Make the dashboard widgets sortable Using jquery UI
  $('.connectedSortable').sortable({
    placeholder         : 'sort-highlight',
    connectWith         : '.connectedSortable',
    handle              : '.box-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });
  $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });

  // bootstrap WYSIHTML5 - text editor
  $('.textarea').wysihtml5();

  $('.daterange').daterangepicker({
    ranges   : {
      'Today'       : [moment(), moment()],
      'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month'  : [moment().startOf('month'), moment().endOf('month')],
      'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  }, function (start, end) {
    window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });

  /* jQueryKnob */
  $('.knob').knob();

  // jvectormap data
  var visitorsData = {
    US: 398, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 2000 // Russia
  };
  // World map by jvectormap
  $('#world-map').vectorMap({
    map              : 'world_mill_en',
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial: {
        fill            : '#0a89c1',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      }
    },
    series           : {
      regions: [
        {
          values           : visitorsData,
          scale            : ['#0a89c1', '#add6e8'],
          normalizeFunction: 'polynomial'
        }
      ]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != 'undefined')
        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
    }
  });

  // Sparkline charts
  var myvalues = [1300, 500, 1920, 927, 831, 1127, 719, 1930, 1221];
  $('#sparkline-1').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#0a89c1',
    height   : '50',
    width    : '70'
  });
  myvalues = [715, 319, 620, 342, 662, 990, 730, 467, 559, 340, 881];
  $('#sparkline-2').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#6ab6d8',
    height   : '50',
    width    : '70'
  });
  myvalues = [88, 49, 22,35, 45, 72, 11, 55, 25, 19, 27];
  $('#sparkline-3').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#add6e8',
    height   : '50',
    width    : '70'
  });



  // SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').slimScroll({
    height: '325px'
  });

   /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 300

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid: {
            color: "#AFAFAF"
            , hoverable: true
            , borderWidth: 0
            , backgroundColor: '#FFF'
        },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#33bf7a'
      },
	  tooltip: true,
      lines : {
        fill : true, //Converts the line chart to area chart
        color: '#33bf7a'
      },
	  tooltipOpts: {
            content: "Visit: %y"
            , defaultTheme: false
        },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    var updateInterval = 30 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
	
	/*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [['Jan', 18], ['Feb', 8], ['Mar', 15], ['Apr', 20], ['May', 11], ['Jun', 3], ['Jul', 18], ['Aug', 8], ['Sep', 15], ['Oct', 20], ['Nov', 11], ['Dec', 3]],
      color: '#7460EE', borderWidth:'0.1'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.1,
		  lineWidth: 0,
		  fillColor:'#7460EE',
          align   : 'center',
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */
	


}); // End of use strict
