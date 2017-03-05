<style>
  html, body{
    height:100%;
  }
</style>
<div class="col-md-12" style="margin-top: 10px;">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">              
      <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
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
         
      <div class="tab-pane" id="takeexam">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Exam Information</h3>
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
                  <button type="submit" class="btn bg-maroon btn-flat margin startexam">Start Examination</button>               
                  <!-- <button type="submit" class="btn bg-purple btn-flat margin chooseagain">Choose Again</button> -->
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md-8">
            <div class="box exam-sheet">
              <div class="box-header with-border">
                <h3 class="box-title subject-chosen">Subject Chosen</h3>
                <h5 class="box-title pull-right">
                  Items you answered: 0
                </h5>
                </div>
                <div class="box-body">
                  <!-- <button type="submit" class="btn bg-green btn-flat startexam">Press this button once you are ready!</button>  -->
                  <div class="form-group">
                    <label>Choose Topic</label>
                    <select class="form-control select2 chooseTopic" style="width: 100%;">Loading Topics...</select>
                  </div>
                  <div class="text-center" style="margin-bottom: 30px;">                    
                      <h1 class="exam-timer">00:00:00</h1>
                      <h6>Time Remaining</h6>                    
                  </div>
                  <ul class="pagination pagination-sm no-margin">
                    <li><a class="disabled" href="#">001</a></li>
                    <li><a href="#">002</a></li>
                    <li><a href="#">003</a></li>
                    <li><a href="#">004</a></li>
                    <li><a href="#">005</a></li>
                    <li><a href="#">006</a></li>
                    <li><a href="#">007</a></li>
                    <li><a href="#">008</a></li>
                    <li><a href="#">009</a></li>
                    <li><a href="#">010</a></li>
                    <li><a href="#">001</a></li>
                    <li><a href="#">002</a></li>
                    <li><a href="#">003</a></li>
                    <li><a href="#">004</a></li>
                    <li><a href="#">005</a></li>
                    <li><a href="#">006</a></li>
                    <li><a href="#">007</a></li>
                    <li><a href="#">008</a></li>
                    <li><a href="#">009</a></li>
                    <li><a href="#">010</a></li>
                    <li><a href="#">001</a></li>
                    <li><a href="#">002</a></li>
                    <li><a href="#">003</a></li>
                    <li><a href="#">004</a></li>
                    <li><a href="#">005</a></li>
                    <li><a href="#">006</a></li>
                    <li><a href="#">007</a></li>
                    <li><a href="#">008</a></li>
                    <li><a href="#">009</a></li>
                    <li><a href="#">010</a></li>
                    <li><a href="#">001</a></li>
                    <li><a href="#">002</a></li>
                    <li><a href="#">003</a></li>
                    <li><a href="#">004</a></li>
                    <li><a href="#">005</a></li>
                    <li><a href="#">006</a></li>
                    <li><a href="#">007</a></li>
                    <li><a href="#">008</a></li>
                    <li><a href="#">009</a></li>
                    <li><a href="#">010</a></li>
                  </ul>
                  <table class="table">
                    <tr>
                      <th style="width:150px">Choose Answer</th>
                      <th style="padding-left:30px">Question: 001</th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-3">
                              <label class="">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">A</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>                              
                            </div>
                            <div class="col-sm-3">
                              <label class="">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">B</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label class="">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">C</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label class="">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">D</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                          </div>
                        </div>
                      </td>
                      <td style="padding-left:30px">
                        <div>
                          The mailbox rule generally makes acceptance of an offer effective at the time the acceptance is dispatched. The mailbox rule does not apply if
                        </div>
                        <div>&nbsp;</div>
                        <table>
                          <tr>
                            <td valign="top">A.</td>
                            <td style="padding-left:5px">Both the offeror and offeree are merchants.asdfasdfasdfasdf adsfa dfa sdfa sdf asdf asdf asdf asdf asdf asdf adsf asdf asdf adsf asdf asdf asdf asdf asdf asdf asdfasd f</td>
                          </tr>
                          <tr>
                            <td valign="top">B.</td>
                            <td style="padding-left:5px">The offer proposes a sale of real estate.</td>
                          </tr>
                          <tr>
                            <td valign="top">C.</td>
                            <td style="padding-left:5px">The offer provides that an acceptance shall not be effective until actually received.</td>
                          </tr>
                          <tr>
                            <td valign="top">D.</td>
                            <td style="padding-left:5px">The duration of the offer is not in excess of 3 months.</td>
                          </tr>
                        </table>
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
                <h3 class="box-title">General Instructions</h3>
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
        STUDENT_SUBJECTS_AND_TOPICS = JSON.parse(data);
        loadChooseSubject();

        function loadChooseSubject(){
          /*
            bootstrap css select guide
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option disabled="disabled">California (disabled)</option>
          */
          let html = ``;
          STUDENT_SUBJECTS_AND_TOPICS.map((obj)=>{
            html += `<option>${obj.name}</option>`;          
          });
          $('.chooseSubject').html(html);  
          if(STUDENT_SUBJECTS_AND_TOPICS.length>0){        
            loadChooseTopic(STUDENT_SUBJECTS_AND_TOPICS[0].name);            
          }
        }
        function loadChooseTopic(subject){          
          let html = ``;
          let index=0;
          for(let obj of STUDENT_SUBJECTS_AND_TOPICS){
            // console.log(`${obj.name}===${subject}`);
            if(obj.name==subject){
              STUDENT_SUBJECTS_AND_TOPICS[index][0].map((topic)=>{
                html += `<option>${topic.name}</option>`;
              });
              break;
            }
            index++;
          }          
          $('.chooseSubject').val(STUDENT_SUBJECTS_AND_TOPICS[index].name);
          $('.chooseTopic').html(html);
          $('.subject-totalitems').html(STUDENT_SUBJECTS_AND_TOPICS[index].items);
          $('.subject-passingrate').html(STUDENT_SUBJECTS_AND_TOPICS[index].passingrate);
          $('.subject-timeduration').html(STUDENT_SUBJECTS_AND_TOPICS[index].timeduration);
          $('.subject-attempts').html(STUDENT_SUBJECTS_AND_TOPICS[index].attempts);
          $('.subject-chosen').html(shortText($('.chooseSubject').val()));

          STUDENT_SUBJECT_INDEX = index;
          STUDENT_SUBJECT_ID_CHOSEN = STUDENT_SUBJECTS_AND_TOPICS[index].id;
          STUDENT_TOPIC_ID_CHOSEN = getTopicID($('.chooseTopic').val(),index);
        }

        function shortText(text){if(text.length<10)return text; var shortText = jQuery.trim(text).substring(0, 50).split(" ").slice(0, -1).join(" ") + "..."; return shortText; }
        function getTopicID(topic,index){let id = -1; STUDENT_SUBJECTS_AND_TOPICS[index][0].map((obj)=>{if(obj.name === topic){id = obj.id; } }); return id; }
        
        $('.chooseSubject').change(function(){
          loadChooseTopic($('.chooseSubject').val());          
          // console.log($('.chooseSubject').val());
        });
        $('.chooseTopic').change(function(){
          // loadChooseTopic($('.chooseSubject').val());
          STUDENT_TOPIC_ID_CHOSEN = getTopicID($('.chooseTopic').val(),STUDENT_SUBJECT_INDEX);
          // console.log(STUDENT_TOPIC_ID_CHOSEN);
          // console.log($('.chooseTopic').val());
        });
        $('.startexam').click(function(){
          // console.log("Start Exam");
          let examLog = {
            "user_id":1,
            "subject_id":STUDENT_SUBJECT_ID_CHOSEN,
            "topic_id":STUDENT_TOPIC_ID_CHOSEN,
            "question_id":1,
            "answer":"X",
            "timeremaining":`00:${$('.subject-timeduration').html()}:00`
          };
          // console.log(examLog);
          $.ajax({
            url:"app/models/exam.php",
            method: "post",
            data: {
              action:"setlog",
              examlog: examLog
            }
          }).done(function(res){
            data = JSON.parse(res);
            // console.log(data.result);
            if(data.result=="ok"){
              $('.chooseSubject').attr('disabled','disabled');
              $('.subject-chosen').html(shortText($('.chooseSubject').val()));
              $('.startexam').attr('disabled','disabled');
              $('.chooseagain').attr('disabled','disabled');
              $('.exam-sheet').show();
              // $('.chooseSubject').removeAttr('disabled');

                $(".exam-timer")
                .countdown("2018/01/01", function(event) {
                  $(this).text(
                    event.strftime('%H:%M:%S')
                  );
                });
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
            //   $('.startexam').attr('disabled','disabled');
            //   $('.chooseagain').attr('disabled','disabled');
            //   $('.exam-sheet').show();
            //   // $('.chooseSubject').removeAttr('disabled');
            // }
          });
        });
      });
    }
    render_StudentSubjects();

    $('.exam-sheet').hide();
    let STUDENT_SUBJECTS_AND_TOPICS;
    let STUDENT_SUBJECT_INDEX;
    let STUDENT_SUBJECT_ID_CHOSEN;
    let STUDENT_TOPIC_ID_CHOSEN;
  });
</script>
