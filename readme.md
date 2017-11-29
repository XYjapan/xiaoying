

# 项目预备阶段任务划分

## 001(zgs)

| 编号  | 描述  | 类型  | uri  | 请求参数  | 返回参数  | 请求方式 |
| ------------ | ------------ | ------------ | ------------ | ------------ | ------------ | ------------ |
| 1  | api中间件编写  | -  | -  | -  | -  | -|
| 2  | 用户登录接口  | read  | login  | username,password,_token  |  code,status,info | post|
| 3  | 用户注册接口  | read  | login  | username,password,_token  |  code,status,info | post|

## 002(dragon)

| 编号  | 描述  | 类型  | uri  | 请求参数  | 返回参数  | 请求方式 |
| ------------ | ------------ | ------------ | ------------ | ------------ | ------------ | ------------ |
| 1  | 学校数据  | read  | school  | page?  |  code,status,data | get|
| 2  | 学校详情  | read  | school/{id}  | school_id  |  code,status,data | get|
| 3  | 文章数据  | read  | article  | page?  |  code,status,data |get|
| 4  | 文章详情  | read  | article/{id}  | article_id  |  code,status,data |get|
| 5  | 案例数据  | read  | case  | page?  |  code,status,data |get|
| 6  | 案例详情  | read  | case/{id}  | case_id  |  code,status,data |get|
| 7  | 教师数据  | read  | teacher  | page?  |  code,status,data |get|
| 8  | 教师详情  | read  | teacher/{id}  | teacher_id  |  code,status,data |get|
| 9  | 课程数据  | read  | course  | page?  |  code,status,data |get|
| 10  | 课程详情  | read  | course/{id}  | course_id  |  code,status,data |get|
| 11  | 热门课程  | read  | course/hot  | page?  |  code,status,data |get|
| 12  | 最新课程  | read  | course/new  | page?  |  code,status,data |get|
| 13  | 分类课程  | read  | course/cate/{id}  | cate_id  |  code,status,data |get|
| 14  | 推荐课程  | read  | /course/recommend  | page?  |  code,status,data |get|
| 15  | 免费课程  | read  | /course/free  | page?  |  code,status,data |get|
| 16  | 课时列表  | read  | /course/lesson/{id}  | course_id  |  code,status,data |get|
| 17  | 班级列表  | read  |/classroom  | page?  |  code,status,data |get|
| 18  | 热门班级  | read  | /classroom/hot  | course_id  |  code,status,data |get|
| 19  | 最新班级  | read  | /classroom/new  | course_id  |  code,status,data |get|
| 20  | 推荐班级  | read  | /classroom/recommend  | course_id  |  code,status,data |get|
| 21  | 免费班级  | read  | /classroom/free  | course_id  |  code,status,data |get|
| 22  | 班级话题  | read  | /classroom/topic/{id}  | classroom_id  |  code,status,data |get|
| 23  | 班级课程  | read  | /classroom/course/{id}  | classroom_id  |  code,status,data | get|
| 24  | 班级评价  | read  | /classroom/review/{id}  | classroom_id  |  code,status,data | get|
| 25  | 班级详情  | read  | /classroom/{id}  | classroom_id  |  code,status,data | get|
| 26  | 公开课列表  | read  | /opencourse  | page?  |  code,status,data | get|
| 27  | 公开课详情  | read  | /opencourse/{id}  | opencourse_id  |  code,status,data | get|
| 28  | 課程評價  | read  | /course/review/{id}  | course_id  |  code,status,data | get|
| 29  | 课程笔记  | read  | /course/note/{id}  | course_id  |  code,status,data | get|


# api数据结构

    {
        'code':     
                200:请求成功;  400:请求失败（含各种形式错误）
        'status':   
                true:有数据返回(即data不为空); false:无返回数据（即data为null）
        data/info:  
                （多维数据用data, 单条数据为info）
    }  


#App下模块介绍

    1.Api           接口目录
    
    2.Common        公共文件目录
    
    3.Console       自定义command
    
    4.Execptions
    
    5.Http          web
    
    6.Providers     服务支持
    
    7.Models        数据模型
    
# 常见problem

1.?? === isset() $$ !is_null()

 