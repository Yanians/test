<!--
	Steps to create this settings page:
	1. Created admin-settings.php
	2. Add new navigation link to layout/nav.php and modify showNav parameter
	3. Inside layout/nav.php, I added new value "settings" ?page=settings to add new route
	4. Inside layout/route.php, I added new route page url "settings" pointing to app/views/settings.php
	5. Then started coding the settings.php
-->

<style>
  html, body{
    height:100%;
  }
</style>
<div class="col-md-12" style="margin-top: 10px;">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">              
      <li  class="active"><a href="#uploadquestions" data-toggle="tab">Upload Questions</a></li>
      <li ><a href="#showreport" data-toggle="tab">Show Report</a></li>
      <li ><a href="#showstatistics" data-toggle="tab">Show Statistics</a></li>
<!--       <li><a href="#takequiz" data-toggle="tab">Take Quiz</a></li>
      <li><a href="#takeexam" data-toggle="tab">Take Exam</a></li> -->
      
      <li class="pull-right"><a href="#">Welcome Admin (admin@gmail.com)!</a></li>

      <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li>               -->
    </ul>
    <div class="tab-content">

      <div class="active tab-pane" id="uploadquestions">
        <?php require_once("settings/uploadquestions.php"); ?>
      </div>

      <div class=" tab-pane" id="showreport">
        <?php require_once("settings/adminreport.php"); ?>
      </div>

      <div class="tab-pane" id="showstatistics">
        <?php require_once("settings/report/report.php"); ?>
      </div>

      <div class="tab-pane" id="home">        
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


    </div>
  </div>
</div>