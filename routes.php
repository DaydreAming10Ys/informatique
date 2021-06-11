<?php

    // the route of Main Page | 主页路由
    require './functions/root.php';
    Flight::route('/', 'route_root');
    
    // the logs | 日志
    require './functions/log.php';
    Flight::route('/logs', "route_log");
    
    // create the tables | 创建表格
    require './functions/debug/create.php';
    Flight::route('/test/create', 'route_create');
    
    // insert the inital datas to the tables | 给表格添加初始化数据
    require './functions/debug/import.php';
    Flight::route('/test/import', 'route_import');
    
    // to view the tables for debug
    require './functions/debug/tables.php';
    Flight::route('/table/department', 'getDepartment');
    Flight::route('/table/scene', 'getScene');
    Flight::route('/table/user', 'getUser');
    Flight::route('/table/group', 'getGroup');
    
    // register | 注册
    require './functions/account/register.php';
    Flight::route('GET /register', 'route_get_register');
    Flight::route('POST /register', 'route_post_register');
    
    // login | 登陆
    require './functions/account/login.php';
    Flight::route('GET /login', 'route_get_login');
    Flight::route('POST /login', 'route_post_login');
    
    // profile | 个人信息页
    require './functions/account/profile.php';
    Flight::route('/profile', 'route_profile');
    
    // logout | 下线
    require './functions/account/logout.php';
    Flight::route('/logout', 'route_logout');
    
    // sign up | 报名
    require './functions/user/sign_up.php';
    Flight::route('GET /form/sign_up', 'route_get_sign_up');
    Flight::route('POST /form/sign_up', 'route_post_sign_up');

    // see the form in mode view | 察看表格
    require './functions/user/form_view.php';
    Flight::route('/form/view/@id', 'route_form_view');

    //forms manage
    require './functions/admin/forms.php';
    Flight::route('/admin/forms', 'route_forms');
    
    //user list
    require './functions/admin/users.php';
    Flight::route('/admin/users', 'route_users');

    // for testing the route works well | 测试路由运行良好
    Flight::route('/test/oneroute', function(){
        echo ' Test rout "oneroute" .';
    });

    // 测试打印输出某些值 （console）
    require './functions/debug/testValue.php';
    Flight::route('/test/value', 'route_test2');

    // 测试上传文件 /////////////////////////////////////////////////////////////////////////////
    Flight::route('GET /test/upload', 'get_test_upload'); 
    Flight::route('POST /test/upload','post_test_upload');
    ///////////////////////////////////////////////////////////////////////////////////////////

    // the route of the other route (go 404page) | 其他路由（跳转404）
    Flight::map('notFound', function(){
        include 'err/404.html';
    });

?>