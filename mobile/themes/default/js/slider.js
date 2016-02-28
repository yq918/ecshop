qm = {};
qm.sildeDiv={
	'render':function(id,cb,f,autoScroll){
 		var o=$(id),
			box=o.find('div.box'),
			ul=o.find('ul:first'),
			li=o.find('li'),
			kid='bannerAni_'+o.attr('id'),
			kstr;
		if(typeof(f)==="undefined") f=80;
		if(typeof(autoScroll)==="undefined") autoScroll=false;
		li.css('width',1/li.size()*100+'%');
		box.css('width',li.size()*100+'%');
		var stop=function(e){e.preventDefault();}
		ul.data('act',1);
		var actMovie=function(j,se){
			var str='',j1=j;
			if(se) {j1++}else{j1--};
			str+='.act_'+j+'_'+j1+' {-webkit-animation:b_a_'+j+'_'+j1+' .5s ease both;} /**/\n';
			str+='@-webkit-keyframes b_a_'+j+'_'+j1+' {0% {margin-left:'+(j-1)*-100+'%;} 100% {margin-left:'+(j1-1)*-100+'%;}} /**/\n';
			return str;
		}
		var actCss=function(){
			var css1='';
			$.each(li,function(i,e){
				if( (i+1) < li.size() ) {
					css1+=actMovie(i+1,true);
					css1+=actMovie(Math.abs(i-li.size()),false);

				}
			});
			return css1;
		}();
		var style=function(id){
			var sdom=$('body').find('#'+id);
			if(sdom.size()==0){
				$('body').prepend('<style type="text/css" id="'+id+'"></style>');
				sdom=$('body').find('#'+id);
			}
			return sdom;
		}
		k=style(kid);
		k1=style(kid+'_ul');
		k.html(actCss);
		touchstart=function(e){
			//e.preventDefault();
			if(!e.touches.length) return;
			ul.data('lock',true);
			var touch = event.touches[0];
			startX = touch.pageX;
         	startY = touch.pageY;
         	$(e.target).data('startX',startX);
         	$(e.target).data('startY',startY);
		}
		touchmove=function(e){
			e.preventDefault();
			if(!e.touches.length) return;
			var touch = event.touches[0];
			toX = touch.pageX;
         	toY = touch.pageY; 
         	$(e.target).data('toX',toX);
         	$(e.target).data('toY',toY);
			startX = $(e.target).data('startX');
         	startY = $(e.target).data('startY'); 
         	x=(startX-toX)*-1;
         	y=startY-toY;
         	act=ul.data('act');
         	if(act==1&&x>0) return false;
         	if(act==li.size()&&x<0) return false;	
         	ul.css('margin-left',x);
		}
		touchend=function(e){
			try{ 
				qm.sildeDiv.go(x,o,box,ul,li,cb);
			}catch(err){
			}
          	$(e.target).data('startX',0);
         	$(e.target).data('startY',0);
		}
 		box[0].addEventListener('touchstart',touchstart,false);
		box[0].addEventListener('touchmove',touchmove,false);
		box[0].addEventListener('touchend',touchend,false);
		if(autoScroll){
			setInterval(function(){
	 			qm.sildeDiv.go(-250,o,box,ul,li,cb);	
			}, 3000); 
		}
	},
	'go':function(sw,o,box,ul,li,cb){ 
		act=ul.data('act')*1;
		gid=function(){
			var key='',i=8;
			while(i--){key += Math.floor(Math.random()*16.0).toString(16);} 
			return key
		}();
		goDef=function(){
			var css='';
				css='@-webkit-keyframes bannerBack'+gid+' {0% {margin-left:'+ul.css('margin-left')+';} 100% {margin-left:0px;}}';
				css='.banner'+gid+' {-webkit-animation:bannerBack'+gid+' .5s ease both;}'+css;
			k1.html(css); 
			// alert(css)
			ul.removeAttr('class').addClass('banner'+gid);
			setTimeout(function(){
				ul.removeClass('banner'+gid).css('margin-left','');
				k1.html('');
			},500);
			return false;
		}
		goActive=function(){ 
			act1=act,cname='';
			if(sw<0) act1+=1;
			if(sw>0) act1-=1;
			if(! act1>0) act1=1;
			if(act1>li.size()) act1=li.size();
			ul.data('act',act1);
			box.css({
				'visibility':'visible',
				'-webkit-animation-delay':Math.random()+'ms'
			});
			cname='act_'+act+'_'+act1;
			box.removeAttr('class').addClass(cname);
			
			backcss='.'+cname+' ul {margin-left:0px;-webkit-animation:bannerBack .5s ease both;}';
			backcss+='@-webkit-keyframes bannerBack {0% {margin-left:'+ul.css('margin-left')+';} 100% {margin-left:0px;}}';
			ul.css('margin-left','');
			k1.html(backcss);
			setTimeout(function(){
				k1.html('');
			},500);
			if(typeof(cb)!="undefined") cb({
				'box':o,
				'act':act1
			});
		}	
		if(act==1&&sw>0) return goDef();
		// if(act==li.size()&&sw<0) return goDef();
		if(act==li.size()) act = 0;
		if(Math.abs(sw)<10) return goDef();
		goActive();
	}
};