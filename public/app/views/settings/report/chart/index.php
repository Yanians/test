<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iMock</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="../../../../../dist/img/favicon.png" />
  <link rel="stylesheet" href="../../../../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../../dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../../../dist/css/ionicons.min.css">

  <!-- css plugins -->
  <link rel="stylesheet" href="../../../../../plugins/iCheck/square/green.css">
  <link rel="stylesheet" href="../../../../../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../../../../plugins/sweetalert/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="../../../../../plugins/select2/select2.min.css">

  <link rel="stylesheet" href="../../../../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../../../../dist/css/skins/skin-green.min.css">  
  <link rel="stylesheet" href="../../../../../dist/css/app.css">
  <link href="../../../../../dist/css/custom.css" rel="stylesheet" type="text/css" />
  <script src="../../../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green layout-top-nav">
  <div class="wrapper">
    <!-- Nav -->
    <?php include_once '../../../../../layout/nav.php'; echo '<script>showNav(["backadminsettings"]);</script>';?>   
    <!-- Routes -->
    <?php include_once '../../../../../layout/routes.php'; ?>
    <!-- Modals -->
    <?php include_once '../../../../../layout/modals.php'; ?>
  </div>

  <?php
  if(isset($_GET['token'])){    
    ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">iMOCK Report - Chart</h3>
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Choose Subject</label>
                      <select class="form-control select2 chooseSubject" style="width: 100%;">
                        <option selected="selected">Loading Subjects...</option>
                      </select>
                    </div>
                  </div>
                </div>
              <div class="row">
                <div class="col-md-8" id="graph">
                  <p class="text-center">
                    <strong id="chart-graph-title">Loading...</strong>
                  </p>

                  <div class="chart" id="graph-container">
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-8">
                      <h4 style="text-align: center;">Topic Results</h4>
                      <div class="chart-responsive" id="pieChart-container">
                        <canvas id="pieChart" height="150"></canvas>
                      </div>
                    </div>
                    <div class="col-md-4">                      
                      <ul class="chart-legend clearfix" id="pieChartLegend" style="margin-top: 10px;"></ul>
                    </div>
                    <div class="col-md-12">
                      <h6 style="text-align: center;">The biggest partition shows which topic you are good at!</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="row" id="chart-graph-footer"></div>
            </div>
          </div>
        </div>
      </div> 
      <?php
    }
    else{
      ?>
      <div style="text-align: center;margin-top: 20px;">
        <div>
          <i class="text-red fa fa-exclamation-circle fa-5x"></i>
        </div>
        <h1>Invalid Access</h1>
        <h6>Missing token. System cannot respond to this request!</h6>
      </div>
      <?php
    }
    ?>

    <script src="../../../../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../../../plugins/chartjs/Chart.min.js"></script>
    <!--   <script src="imockchart.js"></script>   -->
    <script>
      class iMOCKChart{
        constructor(){
          this.state = {
            "urlprefix" : '../../../../../',
            "currentUserIndex" : 1,
            "userID" : 2,
            "exam_user_data":"[]",
            "current_subject_id": 1,
            "topicObject_data": []
          }
          this.data = {
            "user" : [],
            "subject" : [],
            "topic" : [],
            "exam_user": [],
            "exam_questions": []
          }
          this.loadData(()=>{
          // console.log(this.data.user);         
          // console.log(this.data.subject);         
          // console.log(this.data.topic);         
          // console.log(this.data.exam_user);         
          // console.log(this.data.exam_questions);         
          this.main();
        });        
        }
        loadData(callback){
          $.ajax({url: this.state.urlprefix+"app/models/user.php"})
          .done(function(res){
            let data = JSON.parse(res);
            imockchart.data.user = data;
            let token = imockchart.getUrllets().token;
            let strtok = token.split('-');
            imockchart.state.userID = strtok[1];
            $.ajax({url: imockchart.state.urlprefix+"app/models/subject.php"})
            .done(function(res){                
              let data = JSON.parse(res);
              imockchart.data.subject = data;             
              $.ajax({url: imockchart.state.urlprefix+"app/models/report-topic.php"})
              .done(function(res){                
                let data = JSON.parse(res);
                imockchart.data.topic = data;
                $.ajax({url: imockchart.state.urlprefix+"app/models/exam-user.php", data: {user_id: imockchart.getUserID()} } )
                .done(function(res){
                  let data = JSON.parse(res);
                  imockchart.data.exam_user = data;             
                  $.ajax({url: imockchart.state.urlprefix+"app/models/exam-questions.php"})
                  .done(function(res){
                    let data = JSON.parse(res);
                    imockchart.data.exam_questions = data;             
                    callback();
                  });
                });
              });
            });
          });
        }
        main(){
          this.renderChooseSubject();
          this.setSubject(1);
        }
        setSubject(subject_id){
          this.state.current_subject_id = subject_id;
          this.state.currentUserIndex = this.searchCurrentIndex();
          let html = `
          SUBJECT: 
          ${this.limit(this.data.subject[subject_id-1].name,50)}
          `;
          $('#chart-graph-title').html(html);        
          $('#chart-graph-title').html($('#chart-graph-title').html().toUpperCase());
          this.setLineChart(subject_id);
          this.setPieChart();
          this.setChartFooter();
        }

        setLineChart(subject_id){
          //Reset Chart First
          $('#salesChart').remove(); 
          $('#graph-container').html('<canvas id="salesChart" style="height: 180px;"></canvas>');

          let salesChartCanvas = $("#salesChart").get(0).getContext("2d");
          let salesChart = new Chart(salesChartCanvas);

          let topicLabels = [];
          let topicIndex = 1;
          this.data.topic.map((topic)=>{
            if(topic.subject_id==subject_id){
              topicLabels.push("T"+topicIndex++);
            }
          });

          this.state.exam_user_data = JSON.parse(this.data.exam_user[0].data);
          // console.log(this.state.exam_user_data);
          let topicDataSets = [];
          let topicObject = {
            label: "Result",
            fillColor: "rgba(60,141,188,0.9)",
            strokeColor: "rgba(60,141,188,0.8)",
            pointColor: "#3b8bba",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: []
          };
          for(let topic=1;topic<=topicIndex;topic++){
            let score = 0;
            this.state.exam_user_data.map((data)=>{
              if( data.subject_id==this.getSubjectID() && 
                data.topic_id==topic &&
                data.selected==data.answer)score++;
            });
            topicObject.data.push(score);
          }
          this.state.topicObject_data = topicObject.data;
          topicDataSets.push(topicObject);
          // console.log(topicDataSets);

          // let topicDataSets = [
          //   {
          //     label: "T1",
          //     fillColor: "rgb(210, 214, 222)",
          //     strokeColor: "rgb(210, 214, 222)",
          //     pointColor: "rgb(210, 214, 222)",
          //     pointStrokeColor: "#c1c7d1",
          //     pointHighlightFill: "#fff",
          //     pointHighlightStroke: "rgb(220,220,220)",
          //     data: [65, 59, 80, 81, 56, 55]
          //   },
          //   {
          //     label: "T2",
          //     fillColor: "rgba(60,141,188,0.9)",
          //     strokeColor: "rgba(60,141,188,0.8)",
          //     pointColor: "#3b8bba",
          //     pointStrokeColor: "rgba(60,141,188,1)",
          //     pointHighlightFill: "#fff",
          //     pointHighlightStroke: "rgba(60,141,188,1)",
          //     data: [28, 48, 40, 19, 86, 27]
          //   }
          // ];


          let salesChartData = {
            labels: topicLabels,
            datasets: topicDataSets
          };

          let salesChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (let i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
          };

          salesChart.Line(salesChartData, salesChartOptions);
        }

        setPieChart(){
          // console.log(this.state.topicObject_data);
          //-------------
          //- PIE CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          /*
            text-purple   #605ca8
            text-red      #dd4b39
            text-green    #00a65a
            text-yellow   #f39c12
            text-aqua     #00c0ef
            text-light-blue #3c8dbc
            text-gray     #d2d6de
            text-orange   #ff851b
            text-navy     #001f3f
            text-maroon   #d81b60
            text-teal     #39cccc
            */
            let PieData = [];

            let ctx_pieChartLegend = ``;
            let topicHexaColors = ["#605ca8","#dd4b39","#00a65a","#f39c12","#00c0ef","#3c8dbc","#d2d6de","#ff851b","#001f3f","#d81b60","#39cccc"];
            let topicColors = ["text-purple","text-red","text-green","text-yellow","text-aqua","text-light-blue","text-gray","text-orange","text-navy","text-maroon","text-teal"];
            for(let topic=0,tcolor=0;topic<this.state.topicObject_data.length-1;topic++,tcolor++){
              if(tcolor>10)tcolor=0;
              ctx_pieChartLegend += `<li><i class="fa fa-circle-o ${topicColors[tcolor]}"></i> T${topic+1}</li>`;

              let PieDataObject = {
                value: this.state.topicObject_data[topic],
                color: topicHexaColors[tcolor],
                highlight: topicHexaColors[tcolor],
                label: ("T" + (topic+1))
              };
              PieData.push(PieDataObject);
            }
          // console.log(PieData);
          $('#pieChartLegend').html(ctx_pieChartLegend);   

          //Reset Chart First
          $('#pieChart').remove(); 
          $('#pieChart-container').html('<canvas id="pieChart" height="150"></canvas>');       
          
          let pieChartCanvas = $("#pieChart").get(0).getContext("2d");
          let pieChart = new Chart(pieChartCanvas);
          // let PieData = [
          //   {
          //     value: 700,
          //     color: "#f56954",
          //     highlight: "#f56954",
          //     label: "T1"
          //   },
          //   {
          //     value: 500,
          //     color: "#00a65a",
          //     highlight: "#00a65a",
          //     label: "T2"
          //   },
          //   {
          //     value: 400,
          //     color: "#f39c12",
          //     highlight: "#f39c12",
          //     label: "T3"
          //   },
          //   {
          //     value: 600,
          //     color: "#00c0ef",
          //     highlight: "#00c0ef",
          //     label: "T4"
          //   },
          //   {
          //     value: 300,
          //     color: "#3c8dbc",
          //     highlight: "#3c8dbc",
          //     label: "T5"
          //   },
          //   {
          //     value: 100,
          //     color: "#d2d6de",
          //     highlight: "#d2d6de",
          //     label: "T6"
          //   }
          // ];
          let pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 1,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (let i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            //String - A tooltip template
            tooltipTemplate: "<%=value %> <%=label%> users"
          };
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          pieChart.Doughnut(PieData, pieOptions);

        }

        setChartFooter(){          
          let items = [];
          for(let t=0;t<this.data.topic.length;t++){
            if(this.data.topic[t].subject_id==this.getSubjectID()){
              let topicID = this.data.topic[t].id;
              let totalItems = 0;
              for(let eq=0;eq<this.data.exam_questions.length;eq++){
                if(this.data.exam_questions[eq].subject_id==this.getSubjectID() && this.data.exam_questions[eq].topic_id==topicID){
                  totalItems++;
                }
              }
              items.push(totalItems);
            }
          }


          let topicIndex = 1;
          let ctx = ``;
          let cols = 1;
          this.data.topic.map((topic)=>{          
            if(topic.subject_id==this.getSubjectID()){              
              if(cols>4){
                cols=1;
                ctx += `
              </div>
              <div class="row">
                `;
              }
              let percentage = this.computePercentage(this.state.topicObject_data[topicIndex-1],items[topicIndex-1]);
              let caret = ``;
              if(percentage>50){
                caret = `<span class="description-percentage text-green"><i class="fa fa-caret-up"></i>`;
              }
              else if(percentage<50 && percentage>0){
                caret = `<span class="description-percentage text-red"><i class="fa fa-caret-down"></i>`;
              }
              else if(percentage==0){
                caret = `<span class="description-percentage text-orange"><i class="fa fa-caret-left"></i>`;
              }
              ctx+=`
              <div class="col-sm-3" style="height:180px">
                <div class="description-block border-right">
                  ${caret} ${percentage}%</span>
                  <h5 class="description-header">TOPIC ${topicIndex} - T${topicIndex} (${this.state.topicObject_data[topicIndex-1]}/${items[topicIndex-1]})</h5>
                  <div style="text-align:center">
                    <span class="description-text">${topic.name}</span>
                  </div>
                </div>
              </div>
              `;
              topicIndex++;
              cols++;
            }
          });        
          $('#chart-graph-footer').html(ctx);
        }

        renderChooseSubject(){
          let html = ``;
          this.data.subject.map((obj)=>{
            html += `<option>${obj.name}</option>`;          
          });
          $('.chooseSubject').html(html);
          $('.chooseSubject').change(function(){
            let subject = $('.chooseSubject').val();
            let subjectIndex = 0;
            for(let i=0;i<imockchart.data.subject.length;i++){
              subjectIndex++;
              if(imockchart.data.subject[i].name==subject){
                break;
              }
            }
            // console.log($('.chooseSubject').val());           
            // console.log(subjectIndex);
            imockchart.setSubject(subjectIndex);
          });
        }


      //Utilities
      computePercentage(score,items){let result = ((score/items)*100); if(isNaN(result))return 0; else return result; }
      searchCurrentIndex(){let index = 1; for(let i=0;i<this.data.user.length;i++){if(this.data.user[i].id == this.state.userID){index = i; break; } } return index; }
      limit(str,size){if(str.length<size)return str; return str.substring(0,size) + "..."; }
      getUrllets() {let lets = [], hash; let hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&'); for(let i = 0; i < hashes.length; i++) {hash = hashes[i].split('='); lets.push(hash[0]); lets[hash[0]] = hash[1]; } return lets; }
      getUserID(){return this.state.userID; }
      getSubjectID(){return this.state.current_subject_id; }
    }
    let imockchart = new iMOCKChart();
  </script>
  
</body>
</html>
