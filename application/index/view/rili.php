<?php
    //修改页面编码
    header("Content-type: text/html; charset=utf-8");
    //如果没有传入年份则获取当前系统年份
    $year=!isset($_GET['y'])?$_GET['y']:date('Y');
    //如果没有传入月份则获取当前系统月份
    $month=$_GET['m']?$_GET['m']:date('m');

    //获取当前月有多少天
    $days=date('t',strtotime("{$year}-{$month}-1"));
    //当前1号是星期几
    $week=date('w',strtotime("{$year}-{$month}-1"));

    //输出表头
    echo "<center>";
        echo "<h2>{$year}年{$month}月</h2>";
        //输出日期表格
        echo "<table width='700px' border='1px'>";
        echo "<tr>";
        echo "<th>周日</th>";
        echo "<th>周一</th>";
        echo "<th>周二</th>";
        echo "<th>周三</th>";
        echo "<th>周四</th>";
        echo "<th>周五</th>";
        echo "<th>周六</th>";
        echo "</tr>";

        //铺表格
        for($i=1-$week;$i<=$days;){
            echo "<tr>";
            for($j=0;$j<7;$j++){
                if($i>$days || $i<=0){
                    echo "<td>&nbsp;</td>";
                }else{
                echo "<td>{$i}</td>";
                }
                $i++;
            }
            echo "</tr>";
        }

        echo "</table>";

        //实现上一月和上一年
        if($month==1){
            $premonth = 12;
            $preyear = $year - 1;
        }else{
            $premonth = $month-1;
            $preyear = $year;
        }

        //实现下一月和下一年
        if($month==12){
            $nextmonth = 1;
            $nextyear = $year + 1;
        }else{
            $nextmonth = $month + 1;
            $nextyear = $year;
        }
        //上一月、下一月的实现
        echo "<a href='http://localhost/index.php?y={$premonth}&m={$premonth}'>上个月</a>";
        echo "<a href='http://localhost/index.php?y={$nextmonth}&m={$nextmonth}'>下个月</a>";

    echo "</center>";
?>