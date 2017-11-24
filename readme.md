

# 项目预备阶段任务划分
## 001(zgs)
| 编号  | 描述  | 类型  | uri  | 请求参数  | 返回参数  | 请求方式 |
| ------------ | ------------ | ------------ | ------------ | ------------ | ------------ | ------------ |
| 1  | api中间件编写  | -  | -  | -  | -  | -|
| 2  | 用户登录接口  | read  | login  | username,password,_token  |  code,status,info | post|
| 3  | 用户注册接口  | write  | login  | username,password,_token,email,tel  |  code,status,info | post|

## 002(dragon)
| 编号  | 描述  | 类型  | uri  | 请求参数  | 返回参数  | 请求方式 |
| ------------ | ------------ | ------------ | ------------ | ------------ | ------------ | ------------ |
| 1  | 学校数据  | read  | school  | page?  |  code,status,data | get|
| 2  | 文章数据  | read  | article  | page?  |  code,status,data |get|
| 3  | 案例数据  | read  | case  | page?  |  code,status,data |get|
| 4  | 教师数据  | read  | teacher  | page?  |  code,status,data |get|
| 5  | 课程数据  | read  | course  | page?  |  code,status,data |get|

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
    
    2.RateLimiter::class 速率限制器
    
    3.Throttle  节流器

 