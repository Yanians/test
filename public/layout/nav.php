<header class="main-header">
	<nav class="navbar navbar-static-top">
		<div class="" style="margin-left: 8px;margin-right: 8px;">
			<div class="navbar-header">
				<a href="?page=login" class="navbar-brand"><b>i</b>MOCK</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
				<ul class="nav navbar-nav imock-nav"></ul>
			</div>
		</div>
	</nav>
</header>
<script>
	function showNav(nav){
		var links = "";
		for(i=0;i<nav.length;i++){
			var value = nav[i];
			if(value==="login")links+='<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>';
			else if(value==="user")links+='<li><a href="?page=user">User</a></li>';
			else if(value==="exam")links+='<li><a href="?page=exam">Exam</a></li>';
			else if(value==="subject")links+='<li><a href="?page=subject">Subject</a></li>';
			else if(value==="question")links+='<li><a href="?page=question">Question</a></li>';
			else if(value==="topic")links+='<li><a href="?page=topic">Topic</a></li>';
			else if(value==="quiz")links+='<li><a href="?page=quiz">Quiz</a></li>';
			else if(value==="news")links+='<li><a href="?page=news">News</a></li>';
			else if(value==="feedback")links+='<li><a href="?page=feedback">Feedback</a></li>';
			else if(value==="guidelines")links+='<li><a href="?page=guidelines">Guidelines</a></li>';
			else if(value==="logout")links+='<li><a href="?page=logout">Logout</a></li>';

			else if(value==="dashboard")links+='<li><a href="?page=dashboard">Dashboard</a></li>';
		}
		$('.imock-nav').html(links);
	}	
</script>
