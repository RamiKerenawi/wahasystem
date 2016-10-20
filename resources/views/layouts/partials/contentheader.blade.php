<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="page-header text-danger"><i class="fa fa-briefcase"></i>
        <!--@yield('contentheader_title', 'Page Header here')-->
		 
		 
        @yield('contentheader_title', $page_title)
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
        <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
    </ol>
</section>