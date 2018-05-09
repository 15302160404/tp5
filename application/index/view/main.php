<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>教务管理系统</title>
    <link rel="stylesheet" href="__STATIC__/css/index.css">
    <link rel="stylesheet" href="__STATIC__/css/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/css/font-awesome.min.css">
    <style>
    body {
        font-family: Microsoft Yahei, Helvetica Neue, Arial, Helvetica, sans-serif;
        background: #f7f7f7;
    }
    label{
    	padding-left:10px;
    }
    i{
    	padding-right:10px;
    }
    </style>
</head>

<body class="container-fluid">
    <!-- 导航 -->
    <nav class="navbar navbar-default" style="margin-top: 10px;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{:url('index/index')}" >Brand</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav status">
                    <li>
                    	<a href="{:url('index/index')}">首页 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">教师 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{:url('teacher/index')}">教师信息</a></li>
                            <li><a href="{:url('teacher/add')}">新增教师</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">课程 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{:url('course/index')}">课程信息</a></li>
                            <li><a href="{:url('course/add')}">新增课程</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">班级 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{:url('klass/index')}">班级信息</a></li>
                            <li><a href="{:url('klass/add')}">新增班级</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">学生 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{:url('student/index')}">学生信息</a></li>
                            <li><a href="{:url('student/add')}">新增学生</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">选课 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{:url('klasscourse/index')}">选课信息</a></li>
                            <li><a href="{:url('klasscourse/add')}">选课</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="margin-right:5px;"></i>{:session('ss_name')}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{:url('login/login')}">退出</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{:url('login/pass')}">修改密码</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- 内容 -->
    <div class="container"  style="margin-bottom:9%">
        <div class="row">
            <!-- 左边start -->
            <div class="col-md-3">
                <!-- 教师栏目 -->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <!--panel-title面板大标题-->
                            <div class="panel-title">
                                <!--data-parent展开收缩上一级-->
                                <i class="fa fa-mortar-board"></i><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion">教师栏目</a>
                            </div>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('teacher/index')}" class="text-info">教师信息</a></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('teacher/add')}" class="text-info">增加教师</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 学生栏目 -->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <!--panel-title面板大标题-->
                            <div class="panel-title">
                                <!--data-parent展开收缩上一级-->
                                <i class="fa fa-paper-plane"></i><a href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">学生栏目</a>
                            </div>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('student/index')}" class="text-success">学生信息</a></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('student/add')}" class="text-success">增加学生</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 班级栏目 -->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <!--panel-title面板大标题-->
                            <div class="panel-title">
                                <!--data-parent展开收缩上一级-->
                                <i class="fa fa-home"></i><a href="#collapseThree" data-toggle="collapse" data-parent="#accordion">班级栏目</a>
                            </div>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('klass/index')}" class="text-warning">班级信息</a></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('klass/add')}" class="text-warning">增加班级</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 课程栏目 -->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <!--panel-title面板大标题-->
                            <div class="panel-title">
                                <!--data-parent展开收缩上一级-->
                                <i class="fa fa-book"></i><a href="#collapseFour" data-toggle="collapse" data-parent="#accordion">课程栏目</a>
                            </div>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('course/index')}" class="text-danger">课程信息</a></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('course/add')}" class="text-danger">增加课程</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 选课栏目 -->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <!--panel-title面板大标题-->
                            <div class="panel-title">
                                <!--data-parent展开收缩上一级-->
                                <i class="fa fa-lightbulb-o"></i><a href="#collapseFive" data-toggle="collapse" data-parent="#accordion">选课栏目</a>
                            </div>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('klasscourse/index')}" class="text-primary">选课信息</a></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-12"><a href="{:url('klasscourse/add')}" class="text-primary">选课</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 16:9 aspect ratio 日历-->
                <!-- <div class="panel panel-default">
				  <div class="panel-heading">日历</div>
				  <div class="panel-body">
				    <div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="rili.php" scrolling="no"></iframe>
					</div>
				  </div>
				</div> -->
				
            </div>
            <!-- 左边end -->
            <!-- ############################################### -->
            <!-- 右边start -->
            <div class="col-md-9">
                {block name='content'}{/block}
            </div>
            <!-- 右边end -->
            <!-- ############################################### -->
        </div>
    </div>
    <!-- footer -->
    <nav class="navbar-default navbar-fixed-bottom text-center">
        All images and contents &copy; tarena
    </nav>
</body>

</html>
<script src="__STATIC__/js/Jquery.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.min.js"></script>
<script>
var pathname = window.location.pathname + window.location.search;
$(".status li a").each(function() {
    var href = $(this).attr("href");
    console.log(href);
    console.log(pathname);
    if (pathname == href) {
        $(this).parent("li").addClass("active");
    }
});
</script>