<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no" />
	<title></title>
	<link rel="shortcut icon" type="image/x-icon" href="demo/img/pignose-ico.ico" />
	<link rel="stylesheet" type="text/css" href="assets/vendors/pignose-calendar/demo/css/semantic.ui.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/pignose-calendar/demo/css/prism.css" />
	<link rel="stylesheet" type="text/css" href="assets/vendors/pignose-calendar/demo/css/calendar-style.css" />
	<link rel="stylesheet" type="text/css" href="assets/vendors/pignose-calendar/demo/css/style.css" />
	<link rel="stylesheet" type="text/css" href="assets/vendors/pignose-calendar/src/css/pignose.calendar.css" />
	    <!-- Bootstrap -->
    <link href="<?php echo $base_url; ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		.input-calendar {
			display: block;
			width: 100%;
			max-width: 360px;
			margin: 0 auto;
			height: 3.2em;
			line-height: 3.2em;
			font: inherit;
			padding: 0 1.2em;
			border: 1px solid #d8d8d8;
			box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-o-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-moz-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-webkit-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
		}

		.btn-calendar {
			display: block;
			width: 100%;
			max-width: 360px;
			height: 3.2em;
			line-height: 3.2em;
			background-color: #52555a;
			margin: 0 auto;
			font-weight: 600;
			color: #ffffff !important;
			text-decoration: none !important;
			box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-o-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-moz-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-webkit-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
		}

		.btn-calendar:hover {
			background-color: #5a6268;
		}
	</style>
	<script type="text/javascript" src="assets/vendors/pignose-calendar/demo/js/jquery.latest.min.js"></script>
	<script type="text/javascript" src="assets/vendors/pignose-calendar/demo/js/semantic.ui.min.js"></script>
	<script type="text/javascript" src="assets/vendors/pignose-calendar/demo/js/prism.min.js"></script>
	<script type="text/javascript" src="assets/vendors/pignose-calendar/vender/moment.min.js"></script>
	<script type="text/javascript" src="assets/vendors/pignose-calendar/src/js/pignose.calendar.js"></script>
	<!-- Bootstrap -->
    <script src="<?php echo $base_url; ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	$(function() {
		function onClickHandler(date, obj) {

			var $calendar = obj.calendar;
			//var $box = $calendar.parent().siblings('.box').show();
			var $box = $('#box').show();
			var text = 'You choose date ';


			if(date[0] !== null) {
				text += date[0].format('YYYY-MM-DD');
			}

			if(date[0] !== null && date[1] !== null) {
				text += ' ~ ';
			} else if(date[0] === null && date[1] == null) {
				text += 'nothing';
			}

			if(date[1] !== null) {
				text += date[1].format('YYYY-MM-DD');
			}

			//$box.text(text);
			
			$.ajax({
				    url: '<?php echo base_url().'book/timeslot';?>',
				    data: date,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success: function(data){
				        //alert(data);
				        $box.html(data);
				    }
				});
			
			//$box.html(htmlmsg);
		}

		// Default Calendar
		$('.calendar').pignoseCalendar({
			select: onClickHandler,
			disabledWeekdays: [0, 6]
		});

		// Input Calendar
		$('.input-calendar').pignoseCalendar({
			buttons: true, // It means you can give bottom button controller to the modal which be opened when you click.
		});

		// Calendar modal
		var $btn = $('.btn-calendar').pignoseCalendar({
			modal: true, // It means modal will be showed when you click the target button.
			buttons: true,
			apply: function(date) {
				$btn.next().show().text('You applied date ' + date + '.');
			}
		});

		// Color theme type Calendar
		$('.calendar-dark').pignoseCalendar({
			theme: 'dark', // light, dark
			select: onClickHandler
		});

		// Multiple picker type Calendar
		$('.multi-select-calendar').pignoseCalendar({
			multiple: true,
			select: onClickHandler
		});

		// Toggle type Calendar
		$('.toggle-calendar').pignoseCalendar({
			toggle: true,
			select: function(date, obj) {
				var $target = obj.calendar.parent().next().show().html('You selected ' + 
				(date[0] === null? 'null':date[0].format('YYYY-MM-DD')) + 
				'.' +
				'<br /><br />' +
				'<strong>Active dates</strong><br /><br />' +
				'<div class="active-dates"></div>');

				for(var idx in obj.storage.activeDates) {
					var date = obj.storage.activeDates[idx];
					if(typeof date !== 'string') {
						continue;
					}
					$target.find('.active-dates').append('<span class="ui label default">' + date + '</span>');
				}
			}
		});

		// Disabled date settings.
		!(function() {
			// IIFE Closure
			var times = 30;
			var disabledDates = [];
			for(var i=0; i<times; /* Do not increase index */) {
				var year = moment().year();
				var month = 0;
				var day = parseInt(Math.random() * 364 + 1);
				var date = moment().year(year).month(month).date(day).format('YYYY-MM-DD');
				if($.inArray(date, disabledDates) === -1) {
					disabledDates.push(date);
					i++;
				}
			}

			disabledDates.sort();

			var $dates = $('.disabled-dates-calendar').siblings('.guide').find('.guide-dates');
			for (var idx in disabledDates) {
				$dates.append('<span>' + disabledDates[idx] + '</span>');
			}

			$('.disabled-dates-calendar').pignoseCalendar({
				select: onClickHandler,
				disabledDates: disabledDates
			});
		} ());

		// Disabled Weekdays Calendar.
		$('.disabled-weekdays-calendar').pignoseCalendar({
			select: onClickHandler,
			disabledWeekdays: [0, 6]
		});

		// Disabled Range Calendar.
		var minDate = moment().set('dates', Math.min(moment().day(), 2 + 1)).format('YYYY-MM-DD');
		var maxDate = moment().set('dates', Math.max(moment().day(), 24 + 1)).format('YYYY-MM-DD');
		$('.disabled-range-calendar').pignoseCalendar({
			select: onClickHandler,
			minDate: minDate,
			maxDate: maxDate
		});

		// Multiple Week Select
		$('.pick-weeks-calendar').pignoseCalendar({
			pickWeeks: true,
			multiple: true,
			select: onClickHandler
		});

		// Disabled Ranges Calendar.
		$('.disabled-ranges-calendar').pignoseCalendar({
			select: onClickHandler,
			disabledRanges: [
				['2016-10-05', '2016-10-21'],
				['2016-11-01', '2016-11-07'],
				['2016-11-19', '2016-11-21'],
				['2016-12-05', '2016-12-08'],
				['2016-12-17', '2016-12-18'],
				['2016-12-29', '2016-12-30'],
				['2017-01-10', '2017-01-20'],
			]
		});

		// I18N Calendar
		$('.language-calendar').each(function() {
			var $this = $(this);
			var lang = $this.data('lang');
			$this.pignoseCalendar({
				lang: lang
			});
		});

		// This use for DEMO page tab component.
		$('.menu .item').tab();
	});
	//]]>
	</script>
</head>
<body>
	<div id="wrapper">

		<div id="basic" class="article">
			<div class="row">
			<div class="col-xs-6">
	            <div class="calendar"></div>
	        </div>
	        <div class="col-xs-6">
				<div id="box" class="box"></div>
			</div>
			</div>
		</div>
		<button type="submit">submit</button>
			</div>
		</div>
	</div>
</body>
</html>