(function() {
	tinymce.create('tinymce.plugins.spShortcodes', {
		init : function(ed, url) {
			ed.addButton('sp_shortcodes', {
				title : 'Insert Shortcode',
				image : url + '/img/add.png',
				onclick : function() {
					tb_show('Shortcodes Manager', url + '/popup.php?&width=670&height=600');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : "Theme Shortcodes",
				author : 'Nova Design',
				authorurl : 'http://novacambodia.com/',
				infourl : '',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('sp_shortcodes', tinymce.plugins.spShortcodes);
})();