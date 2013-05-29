(function() {  
    tinymce.create('tinymce.plugins.hr', {  
        init : function(ed, url) {  
            ed.addButton('line', {  
                title : 'Add a Line',  
                image : url+'/sc_hr.png',  
                onclick : function() {  
                     ed.selection.setContent('[line]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('hr', tinymce.plugins.hr);  
})();