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
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Choose Subject</h3>
                  <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </table>
                </div>
              </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Choose Topic</h3>
                  <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </table>
                </div>
              </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Exam Information</h3>
                  <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>

      <!-- <div class="tab-pane" id="settings">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputName" placeholder="Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

            <div class="col-sm-10">
              <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          </div>
        </form>
      </div> -->

    </div>
  </div>
</div>
<script>
  $(function(){
    function render_News(){
      let html = ``;
      for(let i=0;i<5;i++){
        html += `
          <div class="post" style="border:1px solid #ddd;padding:5px;">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="../public/dist/img/avatar.png" alt="user image">
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
    function render_Exams(){
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
    render_News();
    render_Exams();
  });
</script>
