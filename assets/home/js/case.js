$(function() {

	$('[node-type="tab-case"]').click(function() {
		$('[node-type="tab-case"]').removeClass('active');
		$(this).addClass('active');
		$('.number').removeClass('active');
		$('[ref-data="project"]').attr('class', 'active number');
		$('.project1').hide();
		$('.project').show();
		$('[data-type="data-case"]').hide();
		var refdata = $(this).attr('ref-data');
		$("." + refdata).show();
	});

	$('.number').click(function() {
		$('.number').removeClass('active');
		$(this).addClass('active');
		$('[data-type="data-project"]').hide();
		var project = $(this).attr('ref-data');
		$('.' + project).show();
	});
});