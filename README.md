# laravel6c
这个项目是配套leon的B站视频来的 https://www.bilibili.com/video/av74879198?p=5
# 与博主上课项目的不同之处：
    1. 项目名称修改为  laravel6c
    2. 所用数据库名称为： laravel6c
    3. 所用域名： laravel6c.com
    
# 记录我跳过的坑
## 1. 忘记导包，产生的错误
    1）直接复制代码，常常会出错，因为你复制代码的时候，不能自动导包，解决办法对照博主的代码收入敲入：
## 2. 不会用appzza这个工具
    1）在使用apizza这个模拟http请求的 网站时候，一定是从插件哪里打开的项目，而不要在网站的首页打开项目
## 3. 幼儿园级别错误  
    1）我会吧 login 写成 layin, 检查了半天都没查出错误，还让最后还请了博主给我远程协助，真是汗颜啊！
    2）还有低级错误，把password 写成了 passpword
## 4. 中高级错误，当使用了scope
    1）当使用了scope之后，你的login,register都能正常访问，而发现，你的refresh不能正常访问了，追其原因是你的refresh接口的哪里的scope无效产生，试着改成test1看看，具体问题具体解决哟！