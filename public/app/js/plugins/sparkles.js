/*
 * Initialization script for Animated sparkles
 */
jQuery(function($){
	"use strict";

	/*--------------------------------------------------------------------------------------------------
 Sparkles
 --------------------------------------------------------------------------------------------------*/
	var Spark = function(sparkles_container){
		this.sparkles_container = $(sparkles_container);
		this.s = ["shiny-spark1", "shiny-spark2", "shiny-spark3", "shiny-spark4", "shiny-spark5", "shiny-spark6"];
		this.i = this.s[this.random(this.s.length)];
		this.n = document.createElement("span");
		this.newSpeed().newPoint().display().newPoint().fly();
	};
	Spark.prototype.display = function ()
	{
		$(this.n).attr("class", this.i).css("z-index", this.random(3)).css("top", this.pointY).css("left", this.pointX);
		this.sparkles_container.append(this.n);
		return this
	};
	Spark.prototype.fly = function ()
	{
		var a = this;
		$(this.n).animate({top: this.pointY, left: this.pointX}, this.speed, "linear", function ()
		{
			a.newSpeed().newPoint().fly();
		})
	};
	Spark.prototype.newSpeed = function ()
	{
		this.speed = (this.random(10) + 5) * 1100;
		return this
	};
	Spark.prototype.newPoint = function ()
	{
		var parentPos = this.sparkles_container,
			parentSlideshow = parentPos.closest('.kl-slideshow'),
			parentPh = parentPos.closest('.page-subheader');
		if(parentSlideshow.length > 0) {
			parentPos = parentSlideshow;
		} else if(parentPh.length > 0) {
			parentPos = parentPh;
		}
		this.pointX = this.random( parentPos.width() );
		this.pointY = this.random( parentPos.height() );
		return this
	};
	Spark.prototype.random = function (a)
	{
		return Math.ceil(Math.random() * a) - 1
	};
	
	var enable_header_sparkles = function( parentSelector ){
		var sparkles = parentSelector.find('.th-sparkles:visible');
		if( sparkles ){
			$.each(sparkles,function(x,y){
				if ($.browser.msie && $.browser.version < 9) {
					return;
				}
				var a = 40,
					i = 0;
				for (i; i < a; i++) {
					new Spark( y );
				}
			});
		}
	};

	var parentSelector = $('.kl-slideshow, .page-subheader')
	if(parentSelector) {
		parentSelector.find('.th-sparkles').css('display','block');
		enable_header_sparkles(parentSelector);
	}
});