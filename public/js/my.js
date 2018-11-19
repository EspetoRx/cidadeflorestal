		var $doc = $('html, body');
		$('.scrollSuave').click(function() {
			$doc.animate({
				scrollTop: $( $.attr(this, 'href') ).offset().top
			}, 500);
			return false;
		});
		
		var alturas = {};
		$('.section').each(function () {
		  alturas[$(this).prop('id')] = $(this).offset().top;
		});

		$(window).on('scroll', function() {
		  for(var seccao in alturas) {
			if($(window).scrollTop() >= alturas[seccao]) {
			  $('a').removeClass('active');
			  $('a[href="#' +seccao+ '"]').addClass('active');
			}
		  }
		  if($('#logo').hasClass('active')){
			  $('#logo').removeClass('active');
		  }
		  if($('#logo2').hasClass('active')){
			  $('#logo2').removeClass('active');
		  }
		  if($('#indi').hasClass('active')){
		    $('#indi').removeClass('active');
		  }
			if($('#indi1').hasClass('active')){
		    $('#indi1').removeClass('active');
		  }
		  if($('#indi2').hasClass('active')){
		    $('#indi2').removeClass('active');
		  }
	      if($('#indi3').hasClass('active')){
		    $('#indi3').removeClass('active');
		  }
		  if($('#indi4').hasClass('active')){
		    $('#indi4').removeClass('active');
		  }
		});
		
		$('.navbar-nav li a').click(function() {
	    if ( !$(this).parent().hasClass('dropdown')) {
		   $('.navbar-collapse').collapse('hide'); 
	    }});

	