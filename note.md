
#### 业务需求

***

Course

    CourseManage 课程管理
        NormalCourse 普通课程
            CourseList 课程列表
                Search 搜索
                    cate、title、author 按分类、标题、作者
                out 导出课程列表
            CourseInfo 课程详情
        ClassroomCourse 班级课程
            CourseList 课程列表
                Search 搜索
                    cate、title、author 按分类、标题、作者
                out 导出课程列表
            CourseInfo 课程详情
    
    CourseRecommend 课程推荐
        CourseList 课程列表
            Search 搜索
                cate、title、author 按分类、标题、作者
        CourseInfo 课程详情
    
    CourseCount 课程统计
        NormalCourse 普通课程
            CourseList : 统计的列表 key = 课程名、课时数、学员数、完成课程人数、课程学习时长(分钟)、课程收入(元)、CountInfo
            CountInfo : 查看课时数据 key = 课时名、课时学习人数、课时完成人数、课时平均学习时长(分钟)、音视频时长(分钟)、音视频平均观看时长(分钟)、测试平均得分
            Search 搜索
                cate、title、author 按分类、标题、作者
            out 导出课时列表
        ClassroomCourse 班级课程
            ClassroomCourseList : 统计的列表 key = 课程名、所在班级、课时数、学员人数、完成课程人数、课程学习时长、课程收入(元)、CountInfo
            CountInfo : 查看课时数据 key = 课时名、课时学习人数、课时完成人数、课时平均学习时长(分钟)、音视频时长(分钟)、音视频平均观看时长(分钟)、测试平均得分
            Search 搜索
                cate、title、author 按分类、标题、作者
            out 导出课时列表






#### 以下内容暂缓，先完善后台课程选课模块。


**Course**

    Course list 课程列表
        Category 课程分类
        By Hot 热门
        By New 最新
        By Recommend 推荐
        - Live Course 直播课 (三方付费产品)
        Free Course 免费课
        Open Course 公开课
        
    Course info 课程详情
        Course Lesson List 课程课时
        Course Note 课程笔记
        Course Review 课程评价
        - Give Teacher 授课老师 (需要用戶接口的支持)
        - New Student 最新学员 (需要用戶接口的支持)
        - Student Dynamic 学员动态 (需要用戶接口的支持)
        - Recommend ClassRoom 推荐班级 (默认是最新的一条推荐课程)
        - Collection Course 收藏课程
        - Share Course 分享课程
        - Pay Course 购买课程

**ClassRoom**

        ClassRoom List 教室列表
            - Category 教室分类
            Free ClassRoom List 免费编辑列表
            By Hot 热门
            By New 最新
            By Recommend 推荐
        ClassRoom Info 班级详情
            ClassRoom Courses 班级课程
            ClassRoom Review 班级评价
            ClassRoom Topic 班级话题
            - ClassRoom Note 班级笔记
            - ClassRoom Teachers 班级老师
            - ClassRoom Class Teacher 班主任
            - Student Dynamic 学员动态
            - Pay ClassRoom 购买班级