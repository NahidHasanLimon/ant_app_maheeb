<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


//Leave route end here
Auth::routes();


// without middleware
Route::get('/view-logs', 'User\AttendanceController@get_all_attendance_logs_requested_user')->name('attendance.view.all.logs');
Route::get('/view-logs-approved', 'User\AttendanceController@get_aaproved_attendance_logs_requested')->name('attendance.view.logs.approved');
// without middleware
//Route::get('/home', 'HomeController@index')->name('home');

// attendance for user
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/own', 'User\AttendanceSingleButtonController@index')->name('attendanceSingleButton.own');
    Route::get('/in', 'User\AttendanceSingleButtonController@check_in')->name('attendanceSingleButton.check_in');
    Route::get('/out', 'User\AttendanceSingleButtonController@check_out')->name('attendanceSingleButton.check_out');
    Route::get('/check-last-status-today', 'User\AttendanceSingleButtonController@check_last_status')->name('attendanceSingleButton.check_last_status_today');


// view log user
    Route::get('/view-attendance', 'User\AttendanceController@index')->name('user.attendance.view');
    Route::get('/view-logs', 'User\AttendanceController@view_logs')->name('user.attendance.logs.view');
// view log user
// attendance claender view of a user
    Route::get('/attendance-calender', 'User\AttendanceController@get_all_attendance_status')->name('user.attendnace.calender.list');

    // Holiday
    Route::get('/holiday', 'HolidayController@index')->name('user.holiday.index');

// attendance claender view


    //Ant  Route starts here
    Route::get('/ant-dashboard', 'AntHomeController@index')->name('ant.dashboard');
    Route::get('/ant-information', 'AntInformationController@index')->name('ant-information.index');
    Route::get('/ant-information/ant-information-view', 'AntInformationController@edit')->name('ant-information.edit');
    //Ant  Route ends here

    //AskforLeave Route starts here
    Route::get('/ask-for-leave', 'AskForLeaveController@index')->name('ask-for-leave.index');
    Route::post('/ask-for-leave/store', 'AskForLeaveController@store')->name('ask-for-leave.store');
    //AskforLeave Route ends here

    //User profile route starts here
    Route::get('/user-profile', 'UserController@userProfile')->name('user-profile');

    //User profile route ends here

});

// end attendance for user
// attendance for admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // dasboard home admin
//   Route::get('/dasboard',function(){
//        return view('layouts.partials.admin_home_page_content');
//   })->name('admin.dasboard');


    Route::get('/dasboard', 'AdminDashboardController@index')->name('admin.dasboard');

    // dasboard home admin
    Route::get('/add-attendace', 'Admin\AttendanceController@index')->name('admin.attendance.add.attendance');
    Route::post('/add-attendace-log', 'Admin\AttendanceController@store_attendamce_log')->name('admin.attendancelog.store');
    Route::get('/delete-attendace-log-single', 'Admin\AttendanceController@single_delete_attendanceLog')->name('attendancelog.delete.single');
    Route::get('/delete-attendace-log-both', 'Admin\AttendanceController@single_delete_from_attendanceLog_and_attendance')->name('attendance.both.delete.single');

});
// appove by super admin
Route::group(['prefix' => 'super-admin', 'middleware' => ['auth']], function () {
    Route::get('/approve-attendace-log', 'SuperAdmin\ApproveAttendanceSuperAdminController@index')->name('superadmin.approveAttendance.index');
    Route::get('/approve-attendace-log-single', 'SuperAdmin\ApproveAttendanceSuperAdminController@single_approved_attendanceLog')->name('superadmin.attendancelog.approve.single');
    Route::get('/approve-attendace-datewise', 'SuperAdmin\ApproveAttendanceSuperAdminController@datewise_approved_attendanceLog')->name('superadmin.attendancelog.approve');

});


Route::group(['middleware' => 'auth'], function () {


    Route::get('/test-absent', 'TestAbsentController@index')->name('test-absent.index');



//    Route::get('/antapp/admin/home', function () {
//        return view('layouts.partials.theme-content');
//    })->name('antHome');
//    Route::get('/antapp/admin/home', 'HomeController@index')->name('antHome');
    Route::get('/home', 'HomeController@index')->name('antHome');
    Route::get('/', 'HomeController@index')->name('antHome');

//Holiday Routes Start  here
//    Route::get('/', 'Admin\HolidayController@index')->name('holiday.index');
    Route::get('/holiday', 'Admin\HolidayController@index')->name('holiday.index');

    Route::post('/holiday/store', 'Admin\HolidayController@store')->name('holiday.post');
    Route::get('/holiday/holiday-info-edit/{id}', 'Admin\HolidayController@edit')
        ->name('employee.info.edit');
    Route::get('/holiday/holiday-info-delete', 'Admin\HolidayController@destroy')
        ->name('holiday.delete');
    Route::get('/holiday/detail', 'Admin\HolidayController@detail')->name('holiday.detail');
    Route::post('/holiday/update', 'Admin\HolidayController@update')->name('holiday.update');

    Route::get('/test-holiday', 'Admin\HolidayController@testHoliday')->name('test.index');
    Route::get('/test-calender', 'Admin\HolidayController@calenderHoliday')->name('calender.index');

    //Leave routes starts here
    Route::get('/view-edit-leave', 'LeaveController@index')->name('viewedit.index');
    Route::get('leave/show', 'LeaveController@show')->name('leave.show');
    Route::post('/leave/store', 'LeaveController@store')->name('leave.store');
    Route::get('leave/destroy', 'LeaveController@destroy')->name('leave.destroy');
    Route::get('/leave/detail', 'LeaveController@detail')->name('leave.detail');
    Route::post('/view-edit-leave/update', 'LeaveController@update')->name('leave.update');


    Route::get('/approve-leave', 'ApproveLeaveController@index')->name('approve-leave.index');

    Route::get('/approve-leave/approve', 'ApproveLeaveController@approvalstore')->name('approve-leave.approve');


//Leave route end here


    //Company routes starts here
    Route::get('/company', 'CompanyController@index')->name('company.index');
    Route::post('/company/company-store', 'CompanyController@store')->name('company.post');
    Route::get('/company/company-delete', 'CompanyController@destroy')->name('company.delete');
    Route::get('/company/company-detail', 'CompanyController@detail')->name('company.detail');
    Route::post('/company/company-update', 'CompanyController@update')->name('company.update');

    //Company routes ends here

    //Department routes starts here
    Route::get('/department', 'DepartmentController@index')->name('department.index');
    Route::post('/department/department-store', 'DepartmentController@store')->name('department.post');
    Route::get('/department/department-delete', 'DepartmentController@destroy')->name('department.delete');
    Route::get('/department/department-detail', 'DepartmentController@detail')->name('department.detail');
    Route::post('/department/department-update', 'DepartmentController@update')->name('department.update');
//    Route::get('/filtered-sub-department/{id}', 'DepartmentController@update')->name('department.update');

    //Department routes ends here

    //SubDepartment routes starts here
    Route::get('/sub-department', 'SubDepartmentController@index')->name('subDepartment.index');
    Route::post('/sub-department/sub-department-store', 'SubDepartmentController@store')->name('subDepartment.post');
    Route::get('/sub-department/sub-department-delete', 'SubDepartmentController@destroy')->name('subDepartment.delete');
    Route::get('/sub-department/sub-department-detail', 'SubDepartmentController@detail')->name('subDepartment.detail');
    Route::post('/sub-department/sub-department-update', 'SubDepartmentController@update')->name('subDepartment.update');
    Route::get('filtered-sub-department/{id}', 'FilteredSubDepartmentController@index')->name('filteredSubDepartment.index');
    Route::post('/filtered-sub-department/filtered-sub-department-store', 'FilteredSubDepartmentController@store')->name('filteredSubDepartment.post');
//    Route::get('/filtered-sub-department/filtered-detail', 'FilteredSubDepartmentController@filtered_detail')->name('filteredSubDepartment.filterDetail');

    Route::get('/filtered-test/filtered-test', 'FilteredSubDepartmentController@filtered_test')->name('filtered.test');
//    Route::get('/filtered-sub-department/filtered-sub-department-delete', 'FilteredSubDepartmentController@destroy')->name('filteredSubDepartment.delete');
    Route::post('/filtered-sub-department/filtered-sub-department-update', 'FilteredSubDepartmentController@update')->name('filteredSubDepartment.update');
    //SubDepartment routes ends here

    //Designation routes starts here
    Route::get('/designation', 'DesignationController@index')->name('designation.index');
    Route::post('/designation/designation-store', 'DesignationController@store')->name('designation.post');
    Route::get('/designation/designation-delete', 'DesignationController@destroy')->name('designation.delete');
    Route::get('/designation/designation-detail', 'DesignationController@detail')->name('designation.detail');
    Route::post('/designation/designation-update', 'DesignationController@update')->name('designation.update');
    Route::get('designation/getSubDepartments/{id}', 'DesignationController@getSubDepartments');
    //Designation routes ends here

//Lead Industry routes starts here
    Route::get('/lead-industry', 'LeadIndustryController@index')->name('lead-industry.index');
    Route::post('/lead-industry/lead-industry-store', 'LeadIndustryController@store')->name('lead-industry.post');
    Route::get('/lead-industry/lead-industry-delete', 'LeadIndustryController@destroy')->name('lead-industry.delete');
    Route::get('/lead-industry/lead-industry-detail', 'LeadIndustryController@detail')->name('lead-industry.detail');
    Route::post('/lead-industry/lead-industry-update', 'LeadIndustryController@update')->name('lead-industry.update');
    //Lead Industry routes ends here

    //Lead SubIndustry routes starts here
    Route::get('/lead-sub-industry', 'LeadSubIndustryController@index')->name('lead-sub-industry.index');
    Route::post('/lead-sub-industry/lead-sub-industry-store', 'LeadSubIndustryController@store')->name('lead-sub-industry.post');
    Route::get('/lead-sub-industry/lead-sub-industry-delete', 'LeadSubIndustryController@destroy')->name('lead-sub-industry.delete');
    Route::get('/lead-sub-industry/lead-sub-industry-detail', 'LeadSubIndustryController@detail')->name('lead-sub-industry.detail');
    Route::post('/lead-sub-industry/lead-sub-industry-update', 'LeadSubIndustryController@update')->name('lead-sub-industry.update');
    //Lead SubIndustry routes ends here

//Lead Organization routes starts here
    Route::get('/lead-company', 'LeadCompanyController@index')->name('lead-company.index');
    Route::post('/lead-company/lead-company-store', 'LeadCompanyController@store')->name('lead-company.post');
    Route::get('/lead-company/lead-company-delete', 'LeadCompanyController@destroy')->name('lead-company.delete');
    Route::get('/lead-company/lead-company-detail', 'LeadCompanyController@detail')->name('lead-company.detail');
    Route::post('/lead-company/lead-company-update', 'LeadCompanyController@update')->name('lead-company.update');
    //Lead Organization routes ends here

    //Lead Brand routes starts here
    Route::get('/lead-brand', 'LeadBrandController@index')->name('lead-brand.index');
    Route::post('/lead-brand/lead-brand-store', 'LeadBrandController@store')->name('lead-brand.post');
    Route::get('/lead-brand/lead-brand-delete', 'LeadBrandController@destroy')->name('lead-brand.delete');
    Route::get('/lead-brand/lead-brand-detail', 'LeadBrandController@detail')->name('lead-brand.detail');
    Route::post('/lead-brand/lead-brand-update', 'LeadBrandController@update')->name('lead-brand.update');
    //Lead Brand routes ends here

//LeadProductOrService routes starts here
    Route::get('/lead-product-service', 'LeadProductOrServiceController@index')->name('lead-product-service.index');
    Route::post('/lead-product-service/lead-product-service-store', 'LeadProductOrServiceController@store')->name('lead-product-service.post');
    Route::get('/lead-product-service/lead-product-service-delete', 'LeadProductOrServiceController@destroy')->name('lead-product-service.delete');
    Route::get('/lead-product-service/lead-product-service-detail', 'LeadProductOrServiceController@detail')->name('lead-product-service.detail');
    Route::post('/lead-product-service/lead-product-service-update', 'LeadProductOrServiceController@update')->name('lead-product-service.update');
    Route::get('sub-industry/getSubIndustry/{id}', 'LeadProductOrServiceController@getSubIndustry');
    //LeadProductOrService routes ends here

    //BrandProductService routes starts here
    Route::get('/brand-product-service', 'LeadBrandServiceController@index')->name('lead-brand-service.index');
    Route::post('/brand-product-service/brand-product-service-store', 'LeadBrandServiceController@store')->name('brand-product-service.post');
    Route::get('/brand-product-service/brand-product-service-delete', 'LeadBrandServiceController@destroy')->name('brand-product-service.delete');
    Route::get('/brand-product-service/brand-product-service-detail', 'LeadBrandServiceController@detail')->name('brand-product-service.detail');
    Route::post('/brand-product-service/brand-product-service-update', 'LeadBrandServiceController@update')->name('brand-product-service.update');
    Route::get('brand-name/getLeadBrand/{id}', 'LeadBrandServiceController@getLeadBrand');
    //BrandProductService routes ends here

    //Add Employee Routes Starts  here
    Route::get('/employee', 'EmployeeController@index')->name('employee.index');
    Route::post('/employee/employee-information-store', 'EmployeeController@store')->name('employee.post');
    Route::get('/employee/employee-information-delete', 'EmployeeController@destroy')->name('employee.delete');
    Route::get('/employee/employee-information-edit', 'EmployeeController@edit')->name('employee.edit');
    Route::post('/employee/employee-information-update', 'EmployeeController@update')->name('employee.update');
    Route::get('/employee/employee-view', 'EmployeeController@show')->name('employee.show');
    //Add Employee routes ends here

    //Tangible Category starts here
    Route::get('/tang-cat', 'TangibleCategoryController@index')->name('tang-cat.index');
    Route::post('/tang-cat/tang-cat-store', 'TangibleCategoryController@store')->name('tang-cat.post');
    Route::get('/tang-cat/tang-cat-delete', 'TangibleCategoryController@destroy')->name('tang-cat.delete');
    Route::get('/tang-cat/tang-cat-detail', 'TangibleCategoryController@detail')->name('tang-cat.detail');
    Route::post('/tang-cat/tang-cat-update', 'TangibleCategoryController@update')->name('tang-cat.update');

    //Tangible Category ends here

    //Tangible assets starts here
    Route::get('/tang-asset', 'TangibleAssetController@index')->name('tang-asset.index');
    Route::post('/tang-asset/tang-asset-store', 'TangibleAssetController@store')->name('tang-asset.post');
    Route::get('/tang-asset/tang-asset-delete', 'TangibleAssetController@destroy')->name('tang-asset.delete');
    Route::get('/tang-asset/tang-asset-detail', 'TangibleAssetController@detail')->name('tang-asset.detail');
    Route::post('/tang-asset/tang-asset-update', 'TangibleAssetController@update')->name('tang-asset.update');

    //Tangible assets  ends here

    //Subscription starts here
    Route::get('/subscription', 'SubscriptionController@index')->name('subscription.index');
    Route::post('/subscription/subscription-store', 'SubscriptionController@store')->name('subscription.post');
    Route::get('/subscription/subscription-delete', 'SubscriptionController@destroy')->name('subscription.delete');
    Route::get('/subscription/subscription-detail', 'SubscriptionController@detail')->name('subscription.detail');
    Route::post('/subscription/subscription-update', 'SubscriptionController@update')->name('subscription.update');
    Route::get('/subscription/subscription-view', 'SubscriptionController@show')->name('subscription.show');


    Route::get('/subscription/myTest', 'SubscriptionController@myTest')->name('myTest');
    //Subscription ends here

    //test Kanban Route starts here
    Route::get('/demo-kanban', 'DemoKanbanController@index')->name('demo-kanban.index');

    Route::get('/demo-kanban/kanban-load', 'DemoKanbanController@kanbanLoad')->name('demo-kanban.load');
//    Route::post('/demo-kanban/kanban-store', 'DemoKanbanController@store')->name('kanban.store');
    Route::post('/demo-kanban/demo-kanban-store', 'DemoKanbanController@store')->name('demo-kanban.post');
    Route::get('/demo-kanban/update-order', 'DemoKanbanController@updateOrder')->name('demo-kanban.update');

    //test Kanban Route ends here


    //AssignEmployee routes starts here
    Route::get('/assign-employee', 'AssignEmployeeController@index')->name('assign-employee.index');
    Route::get('/assign-employee/assign-employee-detail', 'AssignEmployeeController@edit')->name('assign-employee.edit');
    Route::post('/assign-employee/assign-employee-store', 'AssignEmployeeController@store')->name('assign-employee.store');
    Route::get('/assign-employee/getDesignations/{id}', 'AssignEmployeeController@getDesignations');
//    Route::get('designation/getSubDepartments/{id}', 'DesignationController@getSubDepartments');
    //AssignEmployee routes ends here


    //DeAssignEmployee routes starts here
    Route::get('/de-assign-employee', 'DeAssignEmployeeController@index')->name('de-assign-employee.index');
    Route::get('/de-assign-employee/de-assign-employee-detail', 'DeAssignEmployeeController@edit')->name('de-assign-employee.edit');
    Route::post('/de-assign-employee/de-assign-employee-store', 'DeAssignEmployeeController@store')->name('de-assign-employee.store');
    Route::get('/de-assign-employee/de-assign-employee-delete', 'DeAssignEmployeeController@destroy')->name('de-assign-employee.stop');
    //DeAssignEmployee routes ends here

    //FireEmployee routes starts here
    Route::get('/fire-employee', 'FireEmployeeController@index')->name('fire-employee.index');
    Route::get('/fire-employee/fire-employee-detail', 'FireEmployeeController@detail')->name('fire-employee.detail');
    Route::post('/fire-employee/fire-employee-update', 'FireEmployeeController@update')->name('fire-employee.update');
    //FireEmployee routes ends here

    //Project Category routes starts here
    Route::get('/projects-category', 'ProjectsCategoryController@index')->name('projects-category.index');
    Route::post('/projects-category/projects-category-store', 'ProjectsCategoryController@store')->name('projects-category.post');
    Route::get('/projects-category/projects-category-delete', 'ProjectsCategoryController@destroy')->name('projects-category.delete');
    Route::get('/projects-category/projects-category-detail', 'ProjectsCategoryController@detail')->name('projects-category.detail');
    Route::post('/projects-category/projects-category-update', 'ProjectsCategoryController@update')->name('projects-category.update');

    //Project Category routes ends here

    //Project Sub-Category routes starts here
    Route::get('/projects-sub-category', 'ProjectsSubCategoryController@index')->name('projects-sub-category.index');
    Route::post('/projects-sub-category/projects-sub-category-store', 'ProjectsSubCategoryController@store')->name('projects-sub-category.post');
    Route::get('/projects-sub-category/projects-sub-category-delete', 'ProjectsSubCategoryController@destroy')->name('projects-sub-category.delete');
    Route::get('/projects-sub-category/projects-sub-category-detail', 'ProjectsSubCategoryController@detail')->name('projects-sub-category.detail');
    Route::post('/projects-sub-category/projects-sub-category-update', 'ProjectsSubCategoryController@update')->name('projects-sub-category.update');
    //Project Sub-Category routes ends here


    //Project Nature routes starts here

    Route::get('/projects-nature', 'ProjectsNatureController@index')->name('projects-nature.index');
    Route::post('/projects-nature/projects-nature-post', 'ProjectsNatureController@store')->name('projects-nature.post');
    Route::get('/projects-nature/projects-nature-delete', 'ProjectsNatureController@destroy')->name('projects-nature.delete');
    Route::get('/projects-nature/projects-nature-detail', 'ProjectsNatureController@detail')->name('projects-nature.detail');
    Route::post('/projects-nature/projects-nature-update', 'ProjectsNatureController@update')->name('projects-nature.update');

    //Project Nature routes ends here


    //Project routes starts here

    Route::get('/projects', 'ProjectsController@index')->name('projects.index');
    Route::post('/projects/projects-store', 'ProjectsController@store')->name('projects.post');
    Route::get('/projects/projects-delete', 'ProjectsController@destroy')->name('projects.delete');
    Route::get('/projects/projects-detail', 'ProjectsController@detail')->name('projects.detail');
    Route::post('/projects/projects-update', 'ProjectsController@update')->name('projects.update');
    Route::get('projects/getSubCategory/{id}', 'ProjectsController@getSubCategory');
    //Project routes ends here


    //New Project routes starts here

    Route::get('/new-project', 'NewProjectController@index')->name('new-project.index');
    Route::post('/new-project/new-project-store', 'NewProjectController@store')->name('new-project.post');
    Route::get('/new-project/new-project-detail', 'NewProjectController@detail')->name('new-project.detail');
    Route::post('/new-project/new-project-update', 'NewProjectController@update')->name('new-project.update');
    Route::get('/new-project/new-project-delete', 'NewProjectController@destroy')->name('new-project.delete');
    Route::get('/new-project/new-project-view', 'NewProjectController@show')->name('new-project.view');
    Route::get('/new-project/get-brand/{id}', 'NewProjectController@getBrand')->name('new-project-brand.get');
    Route::get('/new-project/get-status/{id}', 'NewProjectController@getStatus')->name('new-project-status.get');
    //Project routes ends here







    //Project Item Category routes starts here

    Route::get('/project-item-category', 'ProjectItemCategoryController@index')->name('project-item-category.index');
    Route::post('/project-item-category/project-item-category-store', 'ProjectItemCategoryController@store')->name('project-item-category.post');
    Route::get('/project-item-category/project-item-category-delete', 'ProjectItemCategoryController@destroy')->name('project-item-category.delete');
    Route::get('/project-item-category/project-item-category-detail', 'ProjectItemCategoryController@detail')->name('project-item-category.detail');
    Route::post('/project-item-category/project-item-category-update', 'ProjectItemCategoryController@update')->name('project-item-category.update');

    //Project Item Category routes ends here

//    filtered item sub category routes start here

    Route::get('filtered-item-sub-category/{id}', 'FilteredItemSubCategoryController@index')->name('filtered-item-sub-cat.index');
    Route::post('/filtered-item-sub-category/filtered-item-sub-category-store', 'FilteredItemSubCategoryController@store')->name('filtered-item-sub-category.post');
//    Route::get('/filtered-item-sub-category/filtered-item-sub-category-detail', 'FilteredItemSubCategoryController@detail')->name('filtered-item-sub-category.detail');

    Route::get('/filtered-sub-cat-test/filtered-sub-cat-test', 'FilteredItemSubCategoryController@filtered_sub_cat_test')->name('filtered-sub-cat.test');

    Route::post('/filtered-item-sub-category/filtered-item-sub-category-update', 'FilteredItemSubCategoryController@update')->name('filtered-item-sub-category.update');
    //    filtered item sub category routes end here





    //    filtered project status  Category routes start here

    Route::get('filtered-project-status-category/{id}', 'FilteredProjectStatusCategoryController@index')->name('filtered-project-status-cat.index');
    Route::post('/filtered-project-status-category/filtered-project-status-category-store', 'FilteredProjectStatusCategoryController@store')->name('filtered-project-status-cat.post');
//

//
    Route::post('/filtered-project-status-category/filtered-project-status-category-update', 'FilteredProjectStatusCategoryController@update')->name('filtered-project-status-category.update');
    //    filtered project status Category routes end here



    //Item  routes starts here

    Route::get('/item', 'ItemController@index')->name('item.index');
    Route::post('/item/item-store', 'ItemController@store')->name('item.post');
    Route::get('/item/item-delete', 'ItemController@destroy')->name('item.delete');
    Route::get('/item/item-detail', 'ItemController@detail')->name('item.detail');
    Route::post('/item/item-update', 'ItemController@update')->name('item.update');

    // Item  routes ends here

    //Project Item  routes starts here

    Route::get('/project-item', 'ProjectItemController@index')->name('project-item.index');
    Route::post('/project-item/project-item-store', 'ProjectItemController@store')->name('project-item.post');
    Route::get('/project-item/project-item-delete', 'ProjectItemController@destroy')->name('project-item.delete');
    Route::get('/project-item/project-item-detail', 'ProjectItemController@detail')->name('project-item.detail');
    Route::post('/project-item/project-item-update', 'ProjectItemController@update')->name('project-item.update');

    //Project Item  routes ends here


    //Project status categories  routes starts here

    Route::get('/project-status-category', 'ProjectStatusCategoryController@index')->name('project-status-category.index');
    Route::post('/project-status-category/project-status-category-store', 'ProjectStatusCategoryController@store')->name('project-status-category.post');
    Route::get('/project-status-category/project-status-category-delete', 'ProjectStatusCategoryController@destroy')->name('project-status-category.delete');
    Route::get('/project-status-category/project-status-category-detail', 'ProjectStatusCategoryController@detail')->name('project-status-category.detail');
    Route::post('/project-status-category/project-status-category-update', 'ProjectStatusCategoryController@update')->name('project-status-category.update');
    //Project status categories routes ends here


    //Project status  routes starts here

    Route::get('/project-status', 'ProjectStatusController@index')->name('project-status.index');
    Route::post('/project-status/project-status-store', 'ProjectStatusController@store')->name('project-status.post');
    Route::get('/project-status/project-status-delete', 'ProjectStatusController@destroy')->name('project-status.delete');
    Route::get('/project-status/project-status-detail', 'ProjectStatusController@detail')->name('project-status.detail');
    Route::post('/project-status/project-status-update', 'ProjectStatusController@update')->name('project-status.update');
    //Project status  routes ends here



    //Project Item SubCategory  routes starts here

    Route::get('/project-item-sub-category', 'ProjectItemSubCategoryController@index')->name('project-item-sub-category.index');
    Route::post('/project-item-sub-category/project-item-sub-category-store', 'ProjectItemSubCategoryController@store')->name('project-item-sub-category.post');
    Route::get('/project-item-sub-category/project-item-sub-category-delete', 'ProjectItemSubCategoryController@destroy')->name('project-item-sub-category.delete');
    Route::get('/project-item-sub-category/project-item-sub-category-detail', 'ProjectItemSubCategoryController@detail')->name('project-item-sub-category.detail');
    Route::post('/project-item-sub-category/project-item-sub-category-update', 'ProjectItemSubCategoryController@update')->name('project-item-sub-category.update');
    //Project Item SubCategory  routes ends here








    //Provide Permission  routes starts here

    Route::get('/provide-permission', 'ProvidePermissionController@index')->name('provide-permission.index');
    Route::post('/provide-permission/provide-permission-store', 'ProvidePermissionController@store')->name('provide-permission.post');
    Route::get('/provide-permission/provide-permission-delete', 'ProvidePermissionController@destroy')->name('provide-permission.delete');
    Route::get('/provide-permission/provide-permission-detail', 'ProvidePermissionController@detail')->name('provide-permission.detail');
    Route::post('/provide-permission/provide-permission-update', 'ProvidePermissionController@update')->name('provide-permission.update');
    //Provide Permission routes ends here



//    Admin Dasboard Content route starts here

    Route::get('today-attendance', 'AdminDashboardController@todayAttendance')->name('today-attendance');

//    Admin Dasboard Content route starts here

//    //Ant  Route starts here
//    Route::get('/ant-dashboard', 'AntHomeController@index')->name('ant.dashboard');
//    Route::get('/ant-information', 'AntInformationController@index')->name('ant-information.index');
//    Route::get('/ant-information/ant-information-view', 'AntInformationController@edit')->name('ant-information.edit');
//    //Ant  Route ends here


//    //AskforLeave Route starts here
//    Route::get('/ask-for-leave', 'AskForLeaveController@index')->name('ask-for-leave.index');
//    Route::post('/ask-for-leave/store', 'AskForLeaveController@store')->name('ask-for-leave.store');
//    //AskforLeave Route ends here


    //Password change route starts here
    Route::get('/view/password/change', 'UserController@viewchange')->name('viewchange');
    Route::post('password/change', 'UserController@change')->name('password.change');
    //Password change route ends here

//    //User profile route starts here
//    Route::get('/user-profile', 'UserController@userProfile')->name('user-profile');
//
//    //User profile route ends here


});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/clear-cache', function () {

    $configCache = Artisan::call('config:cache');
    $clearCache = Artisan::call('cache:clear');
    // return what you want
    return "Finished";
});
