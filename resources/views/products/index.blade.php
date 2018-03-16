@extends('layout')

@section('header')
    <div class="row">
    	<div class="col-lg-12">
    		<ol class="breadcrumb">
    			<li><a href="#">Inicio</a></li>
    			<li class="active"><span>Inventario</span></li>
    		</ol>

    		<h1>Artículos</h1>
    	</div>
    </div>
@stop

@section('button')
    <div class="filter-block pull-right col-lg-8 col-md-8 col-sm-8 col-xs-12">
    	<a href="{{ route('articulos.create') }}" class="btn btn-primary pull-right btn-lg">
    		<i class="fa fa-plus fa-lg"></i>
    	</a>
    	<div class="filter-block pull-right col-lg-5 col-md-5 col-sm-5 col-xs-12">
    		@include('products.search')
    	</div>
    </div>
@stop

@section('content')
	<div class="row">
		<div align="center">
			{!! $products->links() !!}
		</div>
		@foreach($products as $product)
			<div class="col-lg-3 col-md-4 col-sm-4">
				<div class="main-box clearfix">
					<div class="main-box-body clearfix"  align="center">
						<img style="margin-top: 5px" width="40%" src="{{ Storage::url($product->picture) }}">
						<h2 style="text-transform: capitalize;">{{ $product->name }}</h2>
						<div class="profile-label" style="text-transform: uppercase;">
							<span class="label label-primary">{{ $product->status }}</span>
						</div>

						Precio: 
						<span>${{ $product->price }}</span>
						<br>
						Ubicación:
						<span>{{ $product->ubication }}</span>

						<hr>

						<div class="profile-message-btn center-block text-center">
							<button class="md-trigger btn btn-success" data-modal="modal-11{{$product->id}}" style="margin-right: 10px; margin-left: 30px">
								<i class="fa fa-search"></i>
							</button>

							@include('products.modalshow')

							<a href="{{ route('articulos.edit', $product->id) }}" class="btn btn-success">
								<i class="fa fa-pencil"></i>
							</a>

							<form style="display: inline; margin-right: 70px" class="pull-right" method="POST" action="{{ route('articulos.destroy', $product->id) }}">
								{!! method_field('DELETE') !!}
								{!! csrf_field() !!}
                                
								<button type="submit" style="background: transparent; border:none; width: 0px">
									<a href="#" class="btn btn-success">
										<i class="fa fa-trash"></i>
									</a>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<script src="{{asset('plugins/components-custom/modernizr/modernizr.custom.js')}}"></script>
    <script src="{{asset('plugins/components-custom/gallery-v2/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/components-custom/gallery-v2/imagesloaded.js')}}"></script>
    <script src="{{asset('plugins/components-custom/gallery-v2/classie.js')}}"></script>
    <script src="{{asset('plugins/components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('plugins/components/jquery.maskedinput/dist/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('plugins/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('plugins/components/pw-bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('plugins/components/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('plugins/components/hogan/web/builds/3.0.2/hogan-3.0.2.min.js')}}"></script>
    <script src="{{asset('plugins/components/typeahead.js/dist/typeahead.js')}}"></script>
    <script src="{{asset('plugins/components/jquery.pwstrength/jquery.pwstrength.min.js')}}"></script>
    <script src="{{asset('plugins/components/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/components/va-clockpicker/dist/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('plugins/components-custom/modal-animations//modalEffects.js')}}"></script>
    <script src="{{asset('plugins/js/JsBarcode.all.js')}}"></script>

    <script>
        Number.prototype.zeroPadding = function(){
            var ret = "" + this.valueOf();
            return ret.length == 1 ? "0" + ret : ret;
        };
    </script>

    <script type="text/javascript">
    	$(document).ready(function () {
            //@naresh action dynamic childs
            var next = 0;
            $("#add-more").click(function(e){
                e.preventDefault();
                var addto = "#field" + next;
                var addRemove = "#field" + (next);
                next = next + 1;
                var newIn = ' <div id="field'+ next +
                			'" name="field'+ next +
                			'"><!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="action_id">Action Id</label> <div class="col-md-5"> <input id="action_id" name="action_id" type="text" placeholder="" class="form-control input-md"> </div></div><br><br> <!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="action_name">Action Name</label> <div class="col-md-5"> <input id="action_name" name="action_name" type="text" placeholder="" class="form-control input-md"> </div></div><br><br><!-- File Button --> <div class="form-group"> <label class="col-md-4 control-label" for="action_json">Action JSON File</label> <div class="col-md-4"> <input id="action_json" name="action_json" class="input-file" type="file"> </div></div></div>';
                var newInput = $(newIn);
                var removeBtn = '<button id="remove' + 
                				(next - 1) + 
                				'" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
                var removeButton = $(removeBtn);
                $(addto).after(newInput);
                $(addRemove).after(removeButton);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);  

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#field" + fieldNum;
                    $(this).remove();
                    $(fieldID).remove();
                });
            });
        });
    </script>
             
    <script>
    	$(function($) {
            //tooltip init
            $('#exampleTooltip').tooltip();

            //nice select boxes
            $('#sel2').select2();
                    
            $('#sel2Multi').select2({
                placeholder: 'Select a Country',
                allowClear: true
            });
            
            $('#sel23').select2();
                    
            $('#sel23Multi').select2({
                placeholder: 'Select a Country',
                allowClear: true
            });

            //masked inputs
            $("#maskedDate").mask("99/99/9999");
            $("#maskedPhone").mask("(999) 999-9999");
            $("#maskedPhoneExt").mask("(999) 999-9999? x99999");
            $("#maskedTax").mask("99-9999999");
            $("#maskedSsn").mask("9-99-9999");

            $("#maskedProductKey").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});

            $.mask.definitions['~']='[+-]';
            $("#maskedEye").mask("~9.99 ~9.99 999");

            //datepicker
            $('#datepickerDate').datepicker({
            	format: 'mm-dd-yyyy',
            	autoclose: true
            });

            $('#datepickerDateComponent').datepicker({
            	format: 'mm-dd-yyyy',
            	autoclose: true
            });

            //daterange picker
            $('#datepickerDateRange').daterangepicker();
                    
            //timepicker
            $('#timepicker').timepicker({
            	minuteStep: 5,
            	showSeconds: true,
            	showMeridian: false,
            	disableFocus: false,
            	showWidget: true,
            	disableMousewheel: true
            }).focus(function() {
            	$(this).next().trigger('click');
            });

            $('#timepicker-ampm').timepicker({
            	minuteStep: 5,
            	showSeconds: false,
            	showMeridian: true,
            	disableFocus: false,
            	showWidget: true,
            	disableMousewheel: true,
            	showInputs: false
            }).focus(function() {
            	$(this).next().trigger('click');
            });

            //clockpicker
            $('.clockpicker').clockpicker({
            	donetext: 'Done'
            });

            $('.clockpicker-autoclose').clockpicker({
            	donetext: 'Done',
            	autoclose: true,
            	placement: 'left',
            	align: 'top'
            });

            //autocomplete simple
            $('#exampleAutocompleteSimple').typeahead({                              
            	prefetch: '/data/countries.json',
            	limit: 10
            });
                    
    		//password strength meter
            $('#examplePwdMeter').pwstrength({
                label: '.pwdstrength-label'
            });


            var options = {};
            options.ui = {
            	showPopover: true,
            	showErrors: true,
            	showProgressBar: false
            };
            options.rules = {
            	activated: {
            		wordTwoCharacterClasses: true,
            		wordRepetitions: true
            	}
            };
            options.common = {
            	debug: true,
            	usernameField: "#popoverName"
            };
            $('#popoverPwd').pwstrength(options);

        });
    </script>

    {{-- <script>
    	$(function () {
    		$.datepicker.setDefaults($.datepicker.regional["es"]);
    		$("#datepicker").datepicker({
    			dateFormat: 'dd/mm/yy',
    			firstDay: 1
    		}).datepicker("setDate", "19/09/2016");
    	});
    </script> --}}
@stop