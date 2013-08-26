var
HOMEURL = 'js/',
DHVERSION = '.js?v=1352864374549',
SCRIPTLIST = {
	lib: 'js/lib.js',
	init: HOMEURL + 'init' + DHVERSION,
	//top: HOMEURL + 'top' + DHVERSION,
	//left: HOMEURL + 'left' + DHVERSION,
    jquery: HOMEURL + 'jquery' + DHVERSION,
    main: HOMEURL + 'main' + DHVERSION,
    //head: HOMEURL + 'head.min' + DHVERSION,
    load: HOMEURL + 'jquery.lazyload.min' + DHVERSION
};
head.js({ jquery: SCRIPTLIST['jquery'] });
head.js({ load: SCRIPTLIST['load'] });
head.js({ main: SCRIPTLIST['main'] });

head.js({ lib: SCRIPTLIST['lib'] }).ready('lib', function(){
    $(document).ready(function(){
    //info = $("#pageid").html();
	//var DH_mConvert = new mConvert();
    });
});

/*
head.js({ main: SCRIPTLIST['left'] }).ready('main', function(){
    $(document).ready(function(){
        
$('#pageM').one('mouseover', function(){
			head.js({ init: SCRIPTLIST['left'] }, function(){
				var DH_NavBarCategories = new navBarCategories();
			});
		});
        
    });
});
*/


