@extends('layouts.app')

<!--
@section('htmlheader_title')
	Home
@endsection
-->

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-11 col-md-offset-0">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Home</div>-->

					<div class="panel-body">
											

<div id="page-wrapper"> 
    <div class="container-fluid">
         
        <div class="row">
        	<div class="col-lg-12">
				@if($errors->any())
					<div class="alert alert-danger">{{$errors->first()}}</div>
				@endif             
            </div>
        </div>
		
		@if (( Request::segment(3) == "edit"))
			{{ Form::model($orphan,['method' => 'PUT','route'=>['orphans.update',$orphan->id]]) }}
		@else
			{{ Form::open(array('url' => 'orphans')) }}
		@endif	
		<!--<input name="_method" type="hidden" value="PATCH" >-->
        <div class="row">  
        	<div class="col-lg-4">
            	<div class="form-group">
                	{{ Form::label('orphan_file', 'رقم اليتيم') }}
					{{ Form::number('orphan_file',null,['placeholder'=>'رقم اليتيم', 'class'=>'form-control'])}}				
                </div>
            	<div class="form-group">
                	<label> اسم اليتيم :</label>
						<div class="row allforth ">
							<div class="col-lg-3 forth">
									{{ Form::text('first_name',null,['placeholder'=>'الاسم', 'class'=>'form-control'])}}
							</div>
							<div class="col-lg-3 forth">
								{{ Form::text('father_name',null,['placeholder'=>'الأب', 'class'=>'form-control'])}}
							</div>
							<div class="col-lg-3 forth">			
								{{ Form::text('grandfather_name',null,['placeholder'=>'الجد', 'class'=>'form-control'])}}
							</div>
							<div class="col-lg-3 forth">			
								{{ Form::text('family_name',null,['placeholder'=>'العائلة', 'class'=>'form-control'])}}
							</div>		
						</div>
                </div>
                <div class="form-group">
                    {{ Form::label('national_id', 'رقم الهوية') }}
					{{ Form::number('national_id',null,['placeholder'=>'رقم الهوية', 'class'=>'form-control'])}}
                </div>
				<div class="form-group">
					{{ Form::label('gender', 'الجنس') }}
					{{ Form::select('gender', array('1' => 'ذكر', '2' => 'أنثى'), $orphan->gender, array('class' => 'form-control')) }}
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="form-group">
					{{ Form::label('birth_date', 'تاريخ الميلاد') }}
                	{{ Form::date('birth_date',null,['placeholder'=>'تاريخ الميلاد', 'class'=>'form-control'])}}
                </div> 
                <div class="form-group">
					{{ Form::label('birth_country', 'مكان الميلاد') }}
					{{ Form::text('birth_country',null,['placeholder'=>'مكان الميلاد', 'class'=>'form-control'])}}
                </div>
            	<div class="form-group">
					<?php 
					$rel_2_bdwin_data = array(	'1' => 'الأم',
												'2' => 'الجد',
												'3' => 'الجدة'); ?>
					{{ Form::label('rel_2_bdwin', 'صلة المعيل باليتيم') }}
					{{ Form::select('rel_2_bdwin',$rel_2_bdwin_data , null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
					<?php 
					$live_with_data = array(	'1' => 'الأهل',
												'2' => 'الأقارب'); ?>				
					{{ Form::label('live_with', 'يسكن اليتيم مع') }}
					{{ Form::select('live_with', $live_with_data, null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="col-lg-4">
            	<div class="form-group">
                	<label> صورة اليتيم  :</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 300px; height: 222px;">
                        <img data-src="holder.js/100%x100%" alt="">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height:222px;"></div>
                        <div>
                            <span class="btn btn-info btn-file">
                            <span class="fileinput-new">اختر صورة</span>
                            <span class="fileinput-exists">تغيير الصورة</span>
                            <input type="file" name="img"></span>
                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">حذف الصورة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>		
        
        <div class="row">
        	<div class="col-lg-4">
                <div class="form-group">
                	{{ Form::label('is_study', 'هل يدرس؟') }}
					<?php //$is_study = $request->is_study;
					//echo "is_study=".$is_study;	
						?>
						<div class="slideThree">
							{{ Form::checkbox('is_study',1,$orphan->is_study, array('id'=>'slideThree')) }}
							<label for="slideThree"></label>
						</div>
					<!-- Slide THREE value="None" 
					<div class="slideThree">	
						<input type="checkbox"  id="slideThree" name="is_study" />
						<label for="slideThree"></label>
					</div>-->
				</div>
                <div class="form-group">
					{{ Form::label('reason_no_study', 'سبب عدم الدراسة') }}
					{{ Form::textarea('reason_no_study',null,['size' => '30x7','class' => 'form-control','placeholder'=>'']) }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
					<?php 
					$edu_type_data = array(	'1' => 'حكومة',
											'2' => 'وكالة',				
											'3' => 'خاص'); ?>				
					{{ Form::label('edu_type', 'نوع التعليم') }}
					{{ Form::select('edu_type', $edu_type_data, null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
					{{ Form::label('edu_name', 'اسم المؤسسة التعليمية') }}
					{{ Form::text('edu_name',null,['placeholder'=>'اسم المؤسسة التعليمية', 'class'=>'form-control'])}}
                </div>
                <div class="form-group">
					<?php 
					$study_class_data = array(	'1' => 'طفل',
											'2' => 'روضة بستان',				
											'3' => 'روضة تمهيدي',
											'4' => 'الأول',
											'5' => 'الثاني',
											'6' => 'الثالث',
											'7' => 'الرابع',
											'8' => 'الخامس',
											'9' => 'السادس',
											'10' => 'السابع',
											'11' => 'الثامن',
											'12' => 'التاسع'); ?>				
					{{ Form::label('study_class', 'الصف الدراسي') }}
					{{ Form::select('study_class', $study_class_data, null, array('class' => 'form-control')) }}
				</div>
                <div class="form-group">
					<?php 
					$study_level_data = array(	'1' => 'ممتاز',
											'2' => 'جيد جدًا',				
											'3' => 'جيد',
											'4' => 'مقبول'); ?>
					{{ Form::label('study_level', 'المستوى الدراسي') }}
					{{ Form::select('study_level', $study_level_data, null, array('class' => 'form-control')) }}
				</div>
            </div>
            <div class="col-lg-4">
            	<div class="form-group">
					{{ Form::label('hobbies', 'هوايات اليتيم') }}
					{{ Form::textarea('hobbies',null,['size' => '30x12','class' => 'form-control','placeholder'=>'']) }}
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
        	<div class="col-lg-4">
            	<div class="form-group">
                	{{ Form::label('is_praying', 'ملتزم بالصلاة؟') }}
					<div class="is_praying">
						{{ Form::checkbox('is_praying',1,$orphan->is_praying, array('id'=>'is_praying')) }}
						<label for="is_praying"></label>
					</div>
                </div>
            	<div class="form-group">
                	{{ Form::label('is_mem_quran', 'هل يحفظ من القرآن؟') }}
					<div class="is_mem_quran">
						{{ Form::checkbox('is_mem_quran',1,$orphan->is_mem_quran, array('id'=>'is_mem_quran')) }}
						<label for="is_mem_quran"></label>
					</div>
                </div>
                <div class="form-group">
					{{ Form::label('quran_chapters', 'عدد السور') }}
					{{ Form::text('quran_chapters',null,['placeholder'=>'عدد السور', 'class'=>'form-control'])}}
                </div>
                <div class="form-group">
					{{ Form::label('quran_parts', 'عدد الأجزاء') }}
					{{ Form::text('quran_parts',null,['placeholder'=>'عدد الأجزاء', 'class'=>'form-control'])}}
                </div>							
            </div>
            <div class="col-lg-4">
            	<div class="form-group">
					{{ Form::label('is_healthy', 'هل هو مريض؟') }}
					<div class="is_healthy">
						{{ Form::checkbox('is_healthy',1,$orphan->is_healthy, array('id'=>'is_healthy')) }}
						<label for="is_healthy"></label>
					</div>
                </div>
            	<div class="form-group">
					{{ Form::label('ill_name', 'اسم المرض') }}
					{{ Form::textarea('ill_name',null,['size' => '30x12','class' => 'form-control','placeholder'=>'تفاصيل الحالة المرضية']) }}
                </div>				
            </div>
            <div class="col-lg-4">
            	<div class="form-group">
					{{ Form::label('o_classification', 'تصنيف اليتيم') }}
					{{ Form::select('o_classification', array('1' => 'A', '2' => 'B'), '1', array('class' => 'form-control')) }}				
				</div>
            	<div class="form-group">
					{{ Form::label('researcher_notes', 'ملاحظات الباحث') }}
					{{ Form::textarea('researcher_notes',null,['size' => '30x12','class' => 'form-control','placeholder'=>'ملاحظات حول وضع اليتيم']) }}
                </div>
            </div>
        </div>
         <hr />
        <div class="row text-center">
        	<button type="submit" name="submit" class="btn btn-success"> حفظ البيانات </button>
            <button type="reset" class="btn btn-danger"> مسح البيانات </button> 
        </div>
        </form>
	</div>
</div>



											
					</div> <!-- panel-body -->
					
				</div>
			</div>
		</div>
	</div>
@endsection
<script>
{"reg"}.ajaxForm();
</script>