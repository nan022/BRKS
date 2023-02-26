<!--   Core JS Files   -->
<script src="<?= base_url('assets/') ?>/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url('assets/') ?>/js/core/popper.min.js"></script>
	<script src="<?= base_url('assets/') ?>/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url('assets/') ?>/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url('assets/') ?>/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url('assets/') ?>/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= base_url('assets/') ?>/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url('assets/') ?>/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url('assets/') ?>/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url('assets/') ?>/js/plugin/datatables/datatables.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url('assets/') ?>/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url('assets/') ?>/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url('assets/') ?>/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url('assets/') ?>/js/atlantis.min.js"></script>
    
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?= base_url('assets/') ?>/js/setting-demo.js"></script>
	<script src="<?= base_url('assets/') ?>/js/demo.js"></script>

	<script>
		//== Class definition
		var SweetAlert2Demo = function() {

			//== Demos
			var initDemos = function() {
				//== Sweetalert Demo 1
				$('#alert_demo_1').click(function(e) {
					swal('Good job!', {
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
				});

				//== Sweetalert Demo 2
				$('#alert_demo_2').click(function(e) {
					swal("Here's the title!", "...and here's the text!", {
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
				});

				//== Sweetalert Demo 3
				$('#alert_demo_3_1').click(function(e) {
					swal("Good job!", "You clicked the button!", {
						icon : "warning",
						buttons: {        			
							confirm: {
								className : 'btn btn-warning'
							}
						},
					});
				});

				$('#alert_demo_3_2').click(function(e) {
					swal("Good job!", "You clicked the button!", {
						icon : "error",
						buttons: {        			
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
				});

				$('#alert_demo_3_3').click(function(e) {
					swal("Good job!", "You clicked the button!", {
						icon : "success",
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
				});

				$('#alert_demo_3_4').click(function(e) {
					swal("Good job!", "You clicked the button!", {
						icon : "info",
						buttons: {        			
							confirm: {
								className : 'btn btn-info'
							}
						},
					});
				});

				//== Sweetalert Demo 4
				$('#alert_demo_4').click(function(e) {
					swal({
						title: "Good job!",
						text: "You clicked the button!",
						icon: "success",
						buttons: {
							confirm: {
								text: "Confirm Me",
								value: true,
								visible: true,
								className: "btn btn-success",
								closeModal: true
							}
						}
					});
				});

				$('#alert_demo_5').click(function(e){
					swal({
						title: 'Input Something',
						html: '<br><input class="form-control" placeholder="Input Something" id="input-field">',
						content: {
							element: "input",
							attributes: {
								placeholder: "Input Something",
								type: "text",
								id: "input-field",
								className: "form-control"
							},
						},
						buttons: {
							cancel: {
								visible: true,
								className: 'btn btn-danger'
							},        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					}).then(
					function() {
						swal("", "You entered : " + $('#input-field').val(), "success");
					}
					);
				});

				$('#alert_demo_6').click(function(e) {
					swal("This modal will disappear soon!", {
						buttons: false,
						timer: 3000,
					});
				});

				$('#alert_demo_7').click(function(e) {
					swal({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'warning',
						buttons:{
							confirm: {
								text : 'Yes, delete it!',
								className : 'btn btn-success'
							},
							cancel: {
								visible: true,
								className: 'btn btn-danger'
							}
						}
					}).then((Delete) => {
						if (Delete) {
							swal({
								title: 'Deleted!',
								text: 'Your file has been deleted.',
								type: 'success',
								buttons : {
									confirm: {
										className : 'btn btn-success'
									}
								}
							});
						} else {
							swal.close();
						}
					});
				});

				$('#alert_demo_8').click(function(e) {
					swal({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'warning',
						buttons:{
							cancel: {
								visible: true,
								text : 'No, cancel!',
								className: 'btn btn-danger'
							},        			
							confirm: {
								text : 'Yes, delete it!',
								className : 'btn btn-success'
							}
						}
					}).then((willDelete) => {
						if (willDelete) {
							swal("Poof! Your imaginary file has been deleted!", {
								icon: "success",
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
						} else {
							swal("Your imaginary file is safe!", {
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
						}
					});
				})

			};

			return {
				//== Init
				init: function() {
					initDemos();
				},
			};
		}();

		//== Class Initialization
		jQuery(document).ready(function() {
			SweetAlert2Demo.init();
		});
	</script>

	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>

<!-- <script>
$(document).ready(function() {
            $('#reseller').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('select/getproduct') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#product').html(response);
                    }
                });
            });

            $('#product').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('select/getversion') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#version').html(response);
                    }
                });
            });

            $('#version').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('select/getDesa') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#desa').html(response);
                    }
                });
            });
        });
        // $(document).ready(function() {
        //     $('#id_res').change(function() {
        //         var id = $(this).val();
		// 		// var product = "<?= $byId['id_pro']; ?>"
		// 		// console.log(id, product);
        //         $.ajax({
        //             type: "POST",
        //             url: "<?= base_url('OrderRecord/getProduct') ?>",
        //             data: {
        //                 id: id
		// 				// product: product
        //             },
        //             dataType: "JSON",
        //             success: function(response) {
        //                 $('#product').html(response);
        //             }
        //         });
        //     });

        //     $('#product').change(function() {
        //         var id = $(this).val();
        //         $.ajax({
        //             type: "POST",
        //             url: "<?= base_url('orderrecord/getversion') ?>",
        //             data: {
        //                 id: id
        //             },
        //             dataType: "JSON",
        //             success: function(response) {
        //                 $('#version').html(response);
        //             }
        //         });
        //     });



		// 	var recordId = "<?= $byId['id_ord'] ?>"
		// 	$.ajax({
		// 		type: "GET",
		// 		url: "<?= base_url('OrderRecord/editData/') ?>" + recordId + "/json",
		// 		dataType: "JSON",
		// 		success: function(response){
		// 			$('[name="order_id"]').val(response.order_id);
		// 			$('[name="quantity"]').val(response.quantity);
		// 			$('[name="detail"]').val(response.detail);
		// 			$('[name="reseller_id"]').val(response.id_res).trigger('change');
		// 			$('[name="product"]').val(response.id_pro).trigger('change');
		// 			$('[name="version"]').val(response.id_ver).trigger('change');
		// 			// console.log(response)
		// 		}
		// 	});

        // });
//     </script> -->
</body>
</html>