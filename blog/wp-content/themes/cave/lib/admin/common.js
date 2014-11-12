(function($){
	
	/** Options Tabs */
	function caveOptionsTabs() {
		
		var relid = $.cookie( 'cave_tab_relid' );
		
		if( relid >= 1  ) {
			caveOptionsTabControl( relid );
		} else {
			caveOptionsTabControl( 0 );
		}
		
		$( '.cave-group-tab-link-a' ).click( function() {
			
			relid = $(this).attr( 'data-rel' );
			$.cookie( 'cave_tab_relid', relid );
			caveOptionsTabControl( relid );		
			
		});
		
	}
	
	function caveOptionsTabControl( relid ) {
		
		$( '.cave-group-tab' ).each( function() {
				
			if( $(this).attr( 'id' ) == relid + '_section_group' ) {					
				$(this).delay( 400 ).fadeIn( 1200 );				
			} else{					
				$(this).fadeOut( 'fast' );
			}
			
		});
		
		$( '.cave-group-tab-link-li' ).each( function() {
			
			if( $(this).attr('id') != relid + '_section_group_li' && $(this).hasClass( 'active' ) ) {					
				$(this).removeClass( 'active' );				
			}
			
			if( $(this).attr('id') == relid + '_section_group_li' ) {					 
				 $(this).addClass('active');				
			}
		
		});
		
	}
	
	/** jQuery Document Ready */
	$(document).ready(function(){		
		caveOptionsTabs();		
	});

	/** jQuery Windows Load */
	$(window).load(function(){
	});	

})(jQuery);