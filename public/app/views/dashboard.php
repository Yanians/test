<style>
  html, body{
    height:100%;
  }
</style>
<div class="col-md-12" style="margin-top: 10px;">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">              
      <li  class="active"><a href="#home" data-toggle="tab">Home</a></li>
      <li><a href="#takequiz" data-toggle="tab">Take Quiz</a></li>
      <li><a href="#takeexam" data-toggle="tab">Take Exam</a></li>
      
      <li class="pull-right"><a href="#">Welcome Student (student@gmail.com)!</a></li>

      <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li>               -->
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="home">        
        <div class="row">
          <div class="col-md-7">
            <h3>
              News 
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </h3>
            <div class="news"></div>
          </div>
          <div class="col-md-5">
            <h3>
              Exams
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </h3>
            <div class="box">
              <div class="box-body exams"></div>
              <div class="box-footer clearfix pull-right exams-total"></div>
          </div>
          <!-- /.box -->
          </div>       
        </div>
      </div>
         
      <div class="tab-pane" id="takequiz">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Quiz Information</h3>
                  <div class="box-tools pull-right">
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div>
              </div>
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
                <div class="text-red">Note: </span><span class="text-gray">Please avoid refreshing this page once you started the exam.</div>
              </div>
              <div class="box-footer">
                <div class="btn-group pull-right">
                  <button type="submit" class="btn bg-maroon btn-flat margin startquiz">Start Quiz</button>               
                  <!-- <button type="submit" class="btn bg-purple btn-flat margin chooseagain">Choose Again</button> -->
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md-8">
            <div class="box quiz-sheet">
              <div class="box-header with-border">
                <h3 class="box-title subject-chosen">Subject Chosen</h3>
                <h5 class="box-title pull-right">
                  Items you answered: <span id="quizTotalItemsAnswered">0</span>
                </h5>
                </div>
                <div class="box-body">
                  <!-- <button type="submit" class="btn bg-green btn-flat startquiz">Press this button once you are ready!</button>  -->
                  <div class="form-group">
                    <label>Choose Topic</label>
                    <select class="form-control select2 chooseTopic" style="width: 100%;">Loading Topics...</select>
                  </div>
                  <div class="text-center" style="margin-bottom: 30px;">    <!--                 
                      <h1 class="exam-timer">00:00:00</h1>
                      <h6>Time Remaining</h6>    -->                 
                  </div>
                  <div class="row">
                    <center>
                      <ul class="pagination pagination-sm no-margin" id="quiz-nav">
                
                      </ul>
                    </center>
                  </div>
                  <table class="table" id="quiz-table">
                    <tr>
                      <th style="width:150px">Choose Answer</th>
                      <th style="padding-left:30px">Question: <span id="quiz-question-sequence">001</span></th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-3">
                              <label id="quiz_handle_a">
                                <div id="quiz_select1_a" style="position: absolute;margin-left: 6.5px;margin-top:1px;">A</div>
                                <div id="quiz_select2_a" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_a" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_a" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>                              
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_b">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">B</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_b" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 100;">
                                  <ins id="quiz_select_b" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_c">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">C</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_c" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_c" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_d">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">D</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_d" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_d" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                          </div>
                        </div>
                      </td>
                      <td style="padding-left:30px">
                        <div id="quiz-question">
                          The mailbox rule generally makes acceptance of an offer effective at the time the acceptance is dispatched. The mailbox rule does not apply if
                        </div>
                        <div>&nbsp;</div>
                        <table>
                          <tr>
                            <td valign="top">A.</td>
                            <td style="padding-left:5px" id="quiz-choice_a">Both the offeror and offeree are merchants.asdfasdfasdfasdf adsfa dfa sdfa sdf asdf asdf asdf asdf asdf asdf adsf asdf asdf adsf asdf asdf asdf asdf asdf asdf asdfasd f</td>
                          </tr>
                          <tr>
                            <td valign="top">B.</td>
                            <td style="padding-left:5px" id="quiz-choice_b">The offer proposes a sale of real estate.</td>
                          </tr>
                          <tr>
                            <td valign="top">C.</td>
                            <td style="padding-left:5px" id="quiz-choice_c">The offer provides that an acceptance shall not be effective until actually received.</td>
                          </tr>
                          <tr>
                            <td valign="top">D.</td>
                            <td style="padding-left:5px" id="quiz-choice_d">The duration of the offer is not in excess of 3 months.</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <span id="chosen_intromsg">Please choose a letter now</span>&nbsp;
                        <span id="chosen_letter"></span>.&nbsp;&nbsp;
                        <span id="chosen_details"></span>                        
                      </td>
                    </tr>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">More Information About The Exam</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-3 col-xs-6">         
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3 class="subject-totalitems">100</h3>
                        <p>Total items</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-help"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3 class="subject-passingrate">75<sup style="font-size: 20px">%</sup></h3>
                        <p>Passing Rate</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-ribbon-b"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3 class="subject-timeduration">60</h3>
                        <p>Time duration in minutes</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-clock"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3 class="subject-attempts">1</h3>
                        <p>Number of attempts</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-compose"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>   
          </div>
        </div>
      </div>

      <div class="tab-pane" id="takeexam">
        <?php require_once("exam-student.php"); ?>
      </div>

    </div>
  </div>
</div>
<script>

  $(function(){
    $('input[type=radio]').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });

    //Home Tab Controllers
    function render_StudentNews(){
      let html = ``;
      for(let i=0;i<5;i++){
        html += `
          <div class="post" style="border:1px solid #ddd;padding:5px;">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="dist/img/avatar.png" alt="user image">
              <span class="username">
                <a href="#">The Administrator</a>
                <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
              </span>
              <span class="description">Shared publicly - 7:30 PM today</span>
            </div>
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
            <ul class="list-inline">
              <li><a href="#" class="link-black text-sm"><i class="fa fa-commenting-o margin-r-5"></i> General Announcement</a></li>
              <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-eye margin-r-5"></i> Seen (5)</a></li>
            </ul>
          </div>
        `;
      }
      $('.news').html(html);
    }
    function render_StudentExams(){
      let data = [
        {
          "subject":"Finance",
          "result":{
            "progressbar":"danger",
            "width":"55",
          },
          "score":{
            "badge":"red",
            "data":"55"
          }
        },
        {
          "subject":"Law and Order",
          "result":{
            "progressbar":"yellow",
            "width":"70",
          },
          "score":{
            "badge":"yellow",
            "data":"70"
          }
        },
        {
          "subject":"History",
          "result":{
            "progressbar":"primary",
            "width":"30",
          },
          "score":{
            "badge":"light-blue",
            "data":"30"
          }
        },
        {
          "subject":"Criminal and Investigation",
          "result":{
            "progressbar":"success",
            "width":"100",
          },
          "score":{
            "badge":"green",
            "data":"100"
          }
        }
      ];
      let html = `
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">#</th>
            <th>Subject</th>
            <th>Result</th>
            <th style="width: 40px">Score</th>
          </tr>`;
      for(let i=0;i<data.length;i++){
        html+=`
          <tr>
            <td>${i+1}.</td>
            <td>${data[i].subject}</td>
            <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-${data[i].result.progressbar}" style="width: ${data[i].result.width}%"></div>
              </div>
            </td>
            <td><span class="badge bg-${data[i].score.badge}">${data[i].score.data}%</span></td>
          </tr>        
      `;
      }
      html+=`</table>`;
      $('.exams').html(html);
      $('.exams-total').html(`Total Exam Taken: 5`);
    }
    render_StudentNews();
    render_StudentExams();

    //Take Exam Controllers
    function render_StudentSubjects(){      
      $.ajax({
        url:"app/models/subject.php",
        method: "post",
        data: {
          action:"topics"
        }
      }).done(function(data){
        // console.log(data);
        // console.log(JSON.parse(data));
        util.data.STUDENT_SUBJECTS_AND_TOPICS = JSON.parse(data);
        loadChooseSubject();

        function loadChooseSubject(){
          /*
            bootstrap css select guide
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option disabled="disabled">California (disabled)</option>
          */
          let html = ``;
          util.data.STUDENT_SUBJECTS_AND_TOPICS.map((obj)=>{
            html += `<option>${obj.name}</option>`;          
          });
          $('.chooseSubject').html(html);  
          if(util.data.STUDENT_SUBJECTS_AND_TOPICS.length>0){        
            loadChooseTopic(util.data.STUDENT_SUBJECTS_AND_TOPICS[0].name);            
          }
        }
        function loadChooseTopic(subject){          
          let html = ``;
          let index=0;
          for(let obj of util.data.STUDENT_SUBJECTS_AND_TOPICS){
            // console.log(`${obj.name}===${subject}`);
            if(obj.name==subject){
              util.data.STUDENT_SUBJECTS_AND_TOPICS[index][0].map((topic)=>{
                html += `<option>${topic.name}</option>`;
              });
              break;
            }
            index++;
          }          
          $('.chooseSubject').val(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].name);
          $('.chooseTopic').html(html);
          $('.subject-totalitems').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].items);
          $('.subject-passingrate').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].passingrate);
          $('.subject-timeduration').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].timeduration);
          $('.subject-attempts').html(util.data.STUDENT_SUBJECTS_AND_TOPICS[index].attempts);
          $('.subject-chosen').html(shortText($('.chooseSubject').val()));

          util.data.STUDENT_SUBJECT_INDEX = index;
          util.data.STUDENT_SUBJECT_ID_CHOSEN = util.data.STUDENT_SUBJECTS_AND_TOPICS[index].id;
          util.data.STUDENT_TOPIC_ID_CHOSEN = getTopicID($('.chooseTopic').val(),index);
          loadTopicQuizQuestions();
          // console.log("Subject:",util.data.STUDENT_SUBJECT_ID_CHOSEN);
          // console.log("Topic:",util.data.STUDENT_TOPIC_ID_CHOSEN);          
        }

        function loadTopicQuizQuestions(){
          // console.log("Subject:",util.data.STUDENT_SUBJECT_ID_CHOSEN);
          // console.log("Topic:",util.data.STUDENT_TOPIC_ID_CHOSEN);
          let payload = {
              "subject_id":util.data.STUDENT_SUBJECT_ID_CHOSEN,
              "topic_id":util.data.STUDENT_TOPIC_ID_CHOSEN
          };
          $.ajax({
            url:"app/models/quiz.php",
            method: "post",
            data: {
              action:"fetchquiz",
              payload: payload
            }
          }).done(function(res){            
            // console.log("fetch quiz>>>",JSON.parse(res));
            data = JSON.parse(res);
            util.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ = data;
            // console.log(data);
            if(data.length>0){
              util.showQuiz(0);
              let html = ``;
              for(let i=0;i<data.length;i++){
                html+=`<li><a href="#" id="btnQuiz${data[i].id}" onclick="util.showQuiz(${i})">${util.formatItem(i+1)}</a></li>`;
              }
              $('#quiz-nav').html(html);
            }
            else{
              util.showQuiz(-1);
            }
          });
        }

        function shortText(text){if(text.length<10)return text; var shortText = jQuery.trim(text).substring(0, 50).split(" ").slice(0, -1).join(" ") + "..."; return shortText; }
        function getTopicID(topic,index){let id = -1; util.data.STUDENT_SUBJECTS_AND_TOPICS[index][0].map((obj)=>{if(obj.name === topic){id = obj.id; } }); return id; }
        
        $('.chooseSubject').change(function(){
          loadChooseTopic($('.chooseSubject').val());          
          // console.log($('.chooseSubject').val());
        });
        $('.chooseTopic').change(function(){
          // loadChooseTopic($('.chooseSubject').val());
          util.data.STUDENT_TOPIC_ID_CHOSEN = getTopicID($('.chooseTopic').val(),util.data.STUDENT_SUBJECT_INDEX);
          loadTopicQuizQuestions();
          // console.log(util.data.STUDENT_TOPIC_ID_CHOSEN);
          // console.log($('.chooseTopic').val());
        });
        // $('#quiz_select_a, #quiz_select1_a, #quiz_select2_a, #quiz_handle_a').click(function(){
        //   util.checkQuizRadioChecked();
        //   if(false){
        //     console.log("you have selected A");
        //     // console.log(util.getSelectedQuiz());
        //     // let index =  $('#quiz-question-quizid').html();
        //     // var data = JSON.parse(sessionStorage.getItem('imockapp'));
        //     // // console.log(JSON.parse(data));
        //     // console.log(">>>CHOSEN A",data);

        //     //TODO's
        //     //DETECT QUIZ ID
        //     //SAVE QUIZ LOG TO DATABASE
        //     //REFRESH THE JSON AND LABEL PAGINATION AS ANSWERED (APPLY COLOR GREEN)

        //     let quizlog = {
        //       "selected":{
        //         "answer":"A",
        //         "answer_details":$('#quiz-choice_a').html()
        //       },
        //       "quiz_id":util.getSelectedQuiz(),
        //       "user_id":"2",
        //     };
        //     // console.log(quizlog);
        //     $.ajax({
        //       url:"app/models/quizlog.php",
        //       method: "post",
        //       data: {
        //         action:"savelog",
        //         payload: quizlog
        //       }
        //     }).done(function(res){
        //       // console.log(res);
        //       data = JSON.parse(res);
        //       if(data.result == "ok"){
        //         // console.log("Good!");
        //         // console.log($('#quiz_select_b')[0]);
        //         $('#quiz_radio_b').attr('disabled','disabled');
        //         $('#quiz_radio_c').attr('disabled','disabled');
        //         $('#quiz_radio_d').attr('disabled','disabled');
        //       }
        //       else{
        //         console.log("Error: Invalid query while saving quiz log.");
        //         // console.log(data);
        //       }            
        //     });

        //     // util.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].quizlog = quizlog;
        //     // console.log("Set Quiz Log",util.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].quizlog);
        //   }
        // });
        $("#quiz_radio_a").on("ifChanged", function(){
          util.saveQuizAnswer();
        });
        $("#quiz_radio_b").on("ifChanged", function(){
          util.saveQuizAnswer();
        });
        $("#quiz_radio_c").on("ifChanged", function(){
          util.saveQuizAnswer();
        });
        $("#quiz_radio_d").on("ifChanged", function(){
          util.saveQuizAnswer();
        });


        // $('#quiz_select_b').click(function(){
        //   if(!util.checkQuizRadioChecked()){
        //     console.log("you have selected B");
        //   }
        // });
        // $('#quiz_select_c').click(function(){
        //   if(!util.checkQuizRadioChecked()){
        //     console.log("you have selected CCC");
        //   }
        // });
        // $('#quiz_select_d').click(function(){
        //   if(!util.checkQuizRadioChecked()){
        //     console.log("you have selected D");
        //   }
        // });
        $('.startquiz').click(function(){
          // console.log("Start Exam");
          let quizLog = {
            "user_id":1,
            "subject_id":util.data.STUDENT_SUBJECT_ID_CHOSEN,
            "topic_id":util.data.STUDENT_TOPIC_ID_CHOSEN,
            "question_id":1,
            "answer":"X",
            "timeremaining":`00:${$('.subject-timeduration').html()}:00`
          };
          // console.log(examLog);
          $.ajax({
            url:"app/models/quiz.php",
            method: "post",
            data: {
              action:"setlog",
              examlog: quizLog
            }
          }).done(function(res){            
            data = JSON.parse(res);
            // console.log(data.result);
            if(data.result=="ok"){
              $('.chooseSubject').attr('disabled','disabled');
              $('.subject-chosen').html(shortText($('.chooseSubject').val()));
              $('.startquiz').attr('disabled','disabled');
              $('.chooseagain').attr('disabled','disabled');
              $('.quiz-sheet').show();
              // $('.chooseSubject').removeAttr('disabled');

                // $(".exam-timer")
                // .countdown("2018/01/01", function(event) {
                //   $(this).text(
                //     event.strftime('%H:%M:%S')
                //   );
                // });
            }
            else{
              console.log("Contact your admin! Course previously taken.");
            }
            // console.log(res);
            // if(res=="not ok"){
            //   console.log("Need to consult your admin! Exam previously taken!");
            // }
            // else{
            //   $('.chooseSubject').attr('disabled','disabled');
            //   $('.subject-chosen').html(shortText($('.chooseSubject').val()));
            //   $('.startquiz').attr('disabled','disabled');
            //   $('.chooseagain').attr('disabled','disabled');
            //   $('.quiz-sheet').show();
            //   // $('.chooseSubject').removeAttr('disabled');
            // }
          });
        });
      });
    }
    render_StudentSubjects();
    $('.quiz-sheet').hide();
  });

  class Utilities{
    constructor(){      
      this.data = {
        STUDENT_SUBJECTS_AND_TOPICS:[],
        STUDENT_SUBJECT_INDEX:[],
        STUDENT_SUBJECT_ID_CHOSEN:[],
        STUDENT_TOPIC_ID_CHOSEN:[],
        STUDENT_SUBJECTS_AND_TOPICS_QUIZ:[],
        STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX:-1,
        CURRENT_QUIZ_ID: 0
      };
      // sessionStorage.setItem('imockapp', JSON.stringify(this.data));
    }
    showQuiz(index){      
      if(index>=0){
        this.resetQuizCheckbox();
        this.data.CURRENT_QUIZ_ID = this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].id;
        this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX = index;
        // console.log(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX);
        $.ajax({
          url:"app/models/quizlog.php",
          method: "post",
          data: {
            action:"verifylog",
            payload: {
              quiz_id:this.getSelectedQuiz(),
              user_id:this.getUserID()
            }
          }
        }).done(function(res){
          // console.log(res);
          let data = JSON.parse(res);
          // console.log(data.length);
          if(data.length!=0){
            // console.log("ALREADY ANSWERED");           
            util.quizSelectAnswer(data[0].answer);
          }
          util.renderQuizLogs();
        });
        // this.STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX = index;
        // var data = JSON.parse(sessionStorage.getItem('imockapp'));
        // data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX = index;
        // console.log(">>>>",data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ_SELECTED_INDEX);
        // sessionStorage.setItem('imockapp', JSON.stringify(this.data));
        // console.log(">>>SHOW QUIZ",data);
        // $('#quiz-question-quizid').html(index);
        // console.log(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index]);
        $('#quiz-table').show();
        $('#quiz-question-sequence').html(this.formatItem(index+1));
        $('#quiz-question').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].questions.question);
        $('#quiz-choice_a').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].questions.choice_a);
        $('#quiz-choice_b').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].questions.choice_b);
        $('#quiz-choice_c').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].questions.choice_c);
        $('#quiz-choice_d').html(this.data.STUDENT_SUBJECTS_AND_TOPICS_QUIZ[index].questions.choice_d);
      }
      else{
        $('#quiz-table').hide();
        $('#quiz-nav').html("NO QUESTION ASSIGNED!");        
      }
    }
    renderQuizLogs(){
      $.ajax({
          url:"app/models/quizlog.php",
          method: "post",
          data: {
            action:"getQuizLogs",
            payload: {
              quiz_id:this.getSelectedQuiz(),
              user_id:this.getUserID()
            }
          }
        }).done(function(res){
          let data = JSON.parse(res);
          // console.log(data);
          data.map((log)=>{
            // console.log(log);
            let btnQuiz = '#btnQuiz'+log.quiz_id;
            $(btnQuiz).addClass('bg-green');            
          });
          $('#quizTotalItemsAnswered').html(data.length);
        });
    }
    resetQuizCheckbox(){$('#quiz_radio_a').prop('disabled',false);$('#quiz_radio_a').iCheck('uncheck'); $('#quiz_radio_b').prop('disabled',false);$('#quiz_radio_b').iCheck('uncheck'); $('#quiz_radio_c').prop('disabled',false);$('#quiz_radio_c').iCheck('uncheck'); $('#quiz_radio_d').prop('disabled',false);$('#quiz_radio_d').iCheck('uncheck'); $('#chosen_intromsg').html("Please choose a letter now"); $('#chosen_letter').html(""); $('#chosen_details').html(""); }
    getSelectedQuiz(){return this.data.CURRENT_QUIZ_ID; }
    //NOTE: UPDATE THIS CODE. USER ID MUST BE ASSIGNED USING A SESSION VARIABLE
    getUserID(){ return 2;}
    formatItem(val){if(val<10)return '00'+val; else if(val<100)return '0'+val; else return val; }
    saveQuizAnswer(){
      // console.clear();
      var cA = $('#quiz_radio_a').iCheck('update')[0].checked;
      var cB = $('#quiz_radio_b').iCheck('update')[0].checked;
      var cC = $('#quiz_radio_c').iCheck('update')[0].checked;
      var cD = $('#quiz_radio_d').iCheck('update')[0].checked;
      if(cA){
        this.saveQuizLog({
          "selected":{
            "answer":"A",
            "answer_details":$('#quiz-choice_a').html()
          },
          "quiz_id":util.getSelectedQuiz(),
          "user_id":util.getUserID(),
        });
      }
      else if(cB){
        this.saveQuizLog({
          "selected":{
            "answer":"B",
            "answer_details":$('#quiz-choice_b').html()
          },
          "quiz_id":util.getSelectedQuiz(),
          "user_id":util.getUserID(),
        });
      }
      else if(cC){
        this.saveQuizLog({
          "selected":{
            "answer":"C",
            "answer_details":$('#quiz-choice_c').html()
          },
          "quiz_id":util.getSelectedQuiz(),
          "user_id":util.getUserID(),
        });
      }
      else if(cD){
        this.saveQuizLog({
          "selected":{
            "answer":"D",
            "answer_details":$('#quiz-choice_d').html()
          },
          "quiz_id":util.getSelectedQuiz(),
          "user_id":util.getUserID(),
        });
      }
      // console.log(cA);
      // console.log(cB);
      // console.log(cC);
      // console.log(cD);    
    }
    saveQuizLog(quizlog){
      // let quizlog = {
      //   "selected":{
      //     "answer":"A",
      //     "answer_details":$('#quiz-choice_a').html()
      //   },
      //   "quiz_id":util.getSelectedQuiz(),
      //   "user_id":"2",
      // };
      // console.log(quizlog);
      $.ajax({
        url:"app/models/quizlog.php",
        method: "post",
        data: {
          action:"savelog",
          payload: quizlog
        }
      }).done(function(res){
        // console.log(res);
        let data = JSON.parse(res);
        if(data.result == "ok"){
          util.quizSelectAnswer(quizlog.selected.answer);
          // if(quizlog.selected.answer=="A"){              
          //     $('#quiz_radio_b').attr('disabled','disabled');
          //     $('#quiz_radio_c').attr('disabled','disabled');
          //     $('#quiz_radio_d').attr('disabled','disabled');
          //     $('#chosen_intromsg').html("You choose ");
          //     $('#chosen_letter').html("A");
          //     $('#chosen_details').html($('#quiz-choice_a').html());
          // }
          // else if(quizlog.selected.answer=="B"){
          //     $('#quiz_radio_a').attr('disabled','disabled');
          //     $('#quiz_radio_c').attr('disabled','disabled');
          //     $('#quiz_radio_d').attr('disabled','disabled');
          //     $('#chosen_intromsg').html("You choose ");
          //     $('#chosen_letter').html("B");
          //     $('#chosen_details').html($('#quiz-choice_a').html());
          // }
          // else if(quizlog.selected.answer=="C"){
          //     $('#quiz_radio_a').attr('disabled','disabled');
          //     $('#quiz_radio_b').attr('disabled','disabled');
          //     $('#quiz_radio_d').attr('disabled','disabled');
          //     $('#chosen_intromsg').html("You choose ");
          //     $('#chosen_letter').html("C");
          //     $('#chosen_details').html($('#quiz-choice_c').html());
          // }
          // else if(quizlog.selected.answer=="D"){
          //     $('#quiz_radio_a').attr('disabled','disabled');
          //     $('#quiz_radio_b').attr('disabled','disabled');
          //     $('#quiz_radio_c').attr('disabled','disabled');
          //     $('#chosen_intromsg').html("You choose ");
          //     $('#chosen_letter').html("D");
          //     $('#chosen_details').html($('#quiz-choice_d').html());
          // }
        }
        else{
          // console.log("Error: Invalid query while saving quiz log.");
          // console.log(data);
            $('#chosen_intromsg').html("Error on saving answer ");
            $('#chosen_letter').html(quizlog.selected.answer);
            $('#chosen_details').html("Invalid query while saving quiz log.");
        }            
      });
    }

    quizSelectAnswer(answer){
      let btnQuiz = '#btnQuiz'+this.getSelectedQuiz();
      $(btnQuiz).addClass('bg-green');
      if(answer=="A"){
          $('#quiz_radio_a').iCheck('check');
          $('#quiz_radio_b').attr('disabled','disabled');
          $('#quiz_radio_c').attr('disabled','disabled');
          $('#quiz_radio_d').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("A");
          $('#chosen_details').html($('#quiz-choice_a').html());
      }
      else if(answer=="B"){
          $('#quiz_radio_b').iCheck('check');
          $('#quiz_radio_a').attr('disabled','disabled');
          $('#quiz_radio_c').attr('disabled','disabled');
          $('#quiz_radio_d').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("B");
          $('#chosen_details').html($('#quiz-choice_a').html());
      }
      else if(answer=="C"){
          $('#quiz_radio_c').iCheck('check');
          $('#quiz_radio_a').attr('disabled','disabled');
          $('#quiz_radio_b').attr('disabled','disabled');
          $('#quiz_radio_d').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("C");
          $('#chosen_details').html($('#quiz-choice_c').html());
      }
      else if(answer=="D"){
          $('#quiz_radio_d').iCheck('check');
          $('#quiz_radio_a').attr('disabled','disabled');
          $('#quiz_radio_b').attr('disabled','disabled');
          $('#quiz_radio_c').attr('disabled','disabled');
          $('#chosen_intromsg').html("You choose ");
          $('#chosen_letter').html("D");
          $('#chosen_details').html($('#quiz-choice_d').html());
      }
    }
  }
  let util = new Utilities();
</script>
