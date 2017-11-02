/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

    // Place your code here.
	$(document).ready(function(){
		// Enlarge top banner image for screen wider than 1500px
		// var windowWidth = $(window).width();
		// if (windowWidth >= 1500) {
		// 	$('.region-top-banner .top-banner img').css('width', windowWidth + 'px');
		// }

		//Match the height of sidebar block to Content
		$('#featured .region .block').matchHeight();
		// $('.front .region-sidebar-first').matchHeight({
		// 	target: $('#content')
		// });

		// var sidebarHeight = $('.front .region-sidebar-first').height();
		// var followryiHeight = $('.front .region-sidebar-first .follow-ryi').height();
		// var latestnewsHeight = (sidebarHeight - followryiHeight) - 65;
		// $('.front .region-sidebar-first .latest-news').css('height', latestnewsHeight + 'px');

		//Match the height of Empty block to the Content
		var contentTop = $('#content').position().top;
		var contentHeight = $('#content').height();

		if ($('.region-sidebar-first .empty-block').length) {
			var emptyBlockTopLeft = $('.region-sidebar-first .empty-block').position().top;
			var minHeightLeft = emptyBlockTopLeft - contentTop;
			var emptyBlockHeightLeft = contentHeight - minHeightLeft;
			$('.region-sidebar-first .empty-block').css('height', emptyBlockHeightLeft + 'px');
		}

		if ($('.region-sidebar-second .empty-block').length) {
			var emptyBlockTopRight = $('.region-sidebar-second .empty-block').position().top;
			var minHeightRight = emptyBlockTopRight - contentTop;
			var emptyBlockHeightRight = contentHeight - minHeightRight;
			$('.region-sidebar-second .empty-block').css('height', emptyBlockHeightRight + 'px');
		}
	
	});

  }
};


})(jQuery, Drupal, this, this.document);
