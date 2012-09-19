<!-- Draggable box  from: http://jqueryui.com/demos/draggable/ , Dialog Box from http://jqueryui.com/demos/dialog/#animated-->
				$(function() {
					$( "#draggable" ).draggable();
				});
					// increase the default animation speed to exaggerate the effect
					$.fx.speeds._default = 1000;
					$(function() {
						$( "#dialog" ).dialog({
							autoOpen: false,
							show: "blind",
							hide: "explode"
						});
					});	