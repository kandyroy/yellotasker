@extends('packages::layouts.master')
@section('title', 'Dashboard')
  @section('header')
@stop
@section('content')

@include('packages::partials.navigation')
<!-- Left side column. contains the logo and sidebar -->
@include('packages::partials.sidebar')

<!-- END SIDEBAR -->
           <!-- BEGIN CONTENT -->
<div class="container" ng-app="paymentApp" ng-controller="paymentController">
           <div class="page-content-wrapper">
               <!-- BEGIN CONTENT BODY -->
               <div class="page-content">
                   <!-- BEGIN PAGE HEAD-->
                   <div class="page-head">
                       <!-- BEGIN PAGE TITLE -->
                       <div class="page-title">
                           <h1>User Report
                               <small>Profit,Net Outgoing and Net Incoming</small>
                           </h1>
                       </div>
                       <!-- END PAGE TITLE -->

                       <!-- END PAGE TOOLBAR -->
                   </div>
                   <!-- END PAGE HEAD-->
                   <!-- BEGIN PAGE BREADCRUMB -->
                   <ul class="page-breadcrumb breadcrumb">
                       <li>
                           Payment
                           <i class="fa fa-circle"></i>
                       </li>
                       <li>
                           <span class="active">User Report</span>
                       </li>
                   </ul>
                   <!-- END PAGE BREADCRUMB -->
                   <div class="row">
                       <input type='text' ng-model='userId'>
                       <button class="btn btn-primary btn-md"  ng-click="getUserData()">Search</button>
                   </div>
                   <!-- BEGIN PAGE BASE CONTENT -->
                   <div class="row">

                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                           <div class="dashboard-stat2 bordered">
                               <div class="display">
                                   <div class="number">
                                       <h3 class="font-purple-soft">
                                           <span data-counter="counterup" data-value="276"><% userProfit %></span>
                                       </h3>
                                       <small>Total <% label %></small>
                                   </div>
                                   <div class="icon">
                                       <i class="icon-user"></i>
                                   </div>
                               </div>
                               <div class="progress-info">
                                   <div class="progress">
                                       <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                           <span class="sr-only">56% change</span>
                                       </span>
                                   </div>

                               </div>
                           </div>
                       </div>

                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                           <div class="dashboard-stat2 bordered">
                               <div class="display">
                                   <div class="number">
                                       <h3 class="font-blue-sharp">
                                           <span data-counter="counterup" data-value="567"><% userNetOutgoing %></span>
                                       </h3>
                                       <small>Net Outgoing</small>
                                   </div>
                                   <div class="icon">
                                       <i class="fa fa-folder-open-o"></i>
                                   </div>
                               </div>
                               <div class="progress-info">
                                   <div class="progress">
                                       <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                           <span class="sr-only">45% grow</span>
                                       </span>
                                   </div>

                               </div>
                           </div>
                       </div>

                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                           <div class="dashboard-stat2 bordered">
                               <div class="display">
                                   <div class="number">
                                       <h3 class="font-blue-sharp">
                                           <span data-counter="counterup" data-value="567"><% userNetIncoming %></span>
                                       </h3>
                                       <small>Net Incoming</small>
                                   </div>
                                   <div class="icon">
                                       <i class="fa fa-folder-open-o"></i>
                                   </div>
                               </div>
                               <div class="progress-info">
                                   <div class="progress">
                                       <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                           <span class="sr-only">45% grow</span>
                                       </span>
                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="row">
                     <div class="card-profile">
       <ul class="nav nav-tabs" role="tablist">
         <li role="presentation" >
           <a ng-click="showTaskList('outgoing')">Outging</a>
          </li>
          <li role="presentation" >
            <a ng-click="showTaskList('incoming')">Incoming</a>
           </li>
       </ul>
 <div  ng-if = "showList">
   <div class="portlet-body">
       <table class="table table-striped table-hover table-bordered" id="contact">
           <thead>
               <tr>
                    <th>Task Id</th>
                   <th>Task Title</th>
                   <th>Order Id</th>
                   <th>Status</th>
                   <th>Total Amount</th>
                   <th>Doer Name</th>
               </tr>
           </thead>
           <tbody>
             <tr ng-if = "outgoingIndicator" ng-repeat='task in taskList'>
                 <td><% task.id %> </td>
                 <td><% task.task_title %> </td>
                 <td><% task.order_id %> </td>
                 <td><% task.status %> </td>
                 <td>$<% task.total_price %> </td>
                 <td>Mehul Ahir</td>
               </tr>
               <tr ng-if = "incomingIndicator" ng-repeat='task in taskList'>
                   <td><% task.task_details.id %> </td>
                   <td><% task.task_details.title %> </td>
                   <td><% task.order_id %> </td>
                   <td><% task.status %> </td>
                   <td>$<% task.task_details.totalAmount %> </td>
                   <td>Mehul Ahir</td>
                 </tr>
           </tbody>
       </table>
       <span>
   </div>
   </div>
   <div ng-if = "!showList">
     No list found
   </div>
</div>
                   </div>
                   <!-- END PAGE BASE CONTENT -->
               </div>
               <!-- END CONTENT BODY -->
           </div>
           <!-- END QUICK SIDEBAR -->
       </div>
</div>

@stop
