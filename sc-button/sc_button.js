(function() {  
    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add a button',  
                image : url+'/sc_button.png',  
                onclick : function() {  
                     ed.selection.setContent('[button url="ADDRESS"]' + ed.selection.getContent() + 'BUTTON TEXT[/button]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);  
})();