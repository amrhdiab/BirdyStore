var o = {
	init: function(){
		this.diagram();
	},
	random: function(l, u){
		return Math.floor((Math.random()*(u-l+1))+l);
	},
	diagram: function(){

		var t = jQuery('#thediagram'), 
				sizeW = t.attr('data-width'),
				sizeH = t.attr('data-height'),
				maincolor = t.attr('data-maincolor'),
				maintext = t.attr('data-maintext'),
				fontsize = t.attr('data-fontsize'),
				textcolor = t.attr('data-textcolor');
		var r = Raphael('thediagram', sizeW, sizeH),
			rad = 73,
			defaultText = maintext,
			speed = 250;
		
		r.circle(300, 300, 85).attr({ stroke: 'none', fill: maincolor });
		
		var title = r.text(300, 300, defaultText).attr({
			font: fontsize,
			fill: textcolor
		}).toFront();
		
		r.customAttributes.arc = function(value, color, rad){
			var v = 3.6*value,
				alpha = v == 360 ? 359.99 : v,
				random = o.random(91, 240),
				a = (random-alpha) * Math.PI/180,
				b = random * Math.PI/180,
				sx = 300 + rad * Math.cos(b),
				sy = 300 - rad * Math.sin(b),
				x = 300 + rad * Math.cos(a),
				y = 300 - rad * Math.sin(a),
				path = [['M', sx, sy], ['A', rad, rad, 0, +(alpha > 180), 1, x, y]];
			return { path: path, stroke: color }
		}
		
		jQuery('#skills_diagram_el .kl-skills-list li').each(function(i){
			var t = jQuery(this), 
				color = t.css('background-color'),
				value = t.attr('data-percent'),
				text = t.text();
			
			rad += 30;	
			var z = r.path().attr({ arc: [value, color, rad], 'stroke-width': 26 });
			
			z.mouseover(function(){
                this.animate({ 'stroke-width': 50, opacity: .75 }, 1000, 'elastic');
                if(Raphael.type != 'VML') //solves IE problem
				this.toFront();
				title.stop().animate({ opacity: 0 }, speed, '>', function(){
					this.attr({ text: text + '\n' + value + '%' }).animate({ opacity: 1 }, speed, '<');
				});
            }).mouseout(function(){
				this.stop().animate({ 'stroke-width': 26, opacity: 1 }, speed*4, 'elastic');
				title.stop().animate({ opacity: 0 }, speed, '>', function(){
					title.attr({ text: defaultText }).animate({ opacity: 1 }, speed, '<');
				});	
            });
		});
		
	}
}
jQuery(function(){ o.init(); });
