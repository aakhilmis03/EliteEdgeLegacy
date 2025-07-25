<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{url('admin_assets')}}/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="{{url('admin_assets')}}/plugins/simplebar/simplebar.css" rel="stylesheet" />
    <link href="{{url('admin_assets')}}/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="{{url('admin_assets')}}/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="{{url('admin_assets')}}/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{url('admin_assets')}}/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link id="main-css-href" rel="stylesheet" href="{{url('admin_assets')}}/css/style.css" />
    <script src="{{url('admin_assets')}}/plugins/nprogress/nprogress.js"></script>
<style>
.dataTables_wrapper .dataTables_filter { float: right;}
.invalid-feedback { display: inline-block; }
</style>

<script type="text/javascript" src="{{url('admin_assets')}}/plugins/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
        editor_selector : "TextEditor",
		mode : "textareas",
		theme : "advanced",
		skin: 'o2k7',
		forced_root_block : "",
		plugins : "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,openmanager",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		//Open Manager Options
		file_browser_callback: "openmanager",
		open_manager_upload_path: '../../../../../uploads/',

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE --> 
    