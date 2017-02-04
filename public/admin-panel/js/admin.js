if(document.querySelector('#editor')) {
    var editor = new Quill('#editor', {
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                ['link', 'blockquote'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['clean'] 
            ],
        },
        theme: 'snow'
    });

    var forms = document.querySelectorAll('form');

    [].map.call(forms, function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var editorContent = form.querySelector('.wysiwyg');

            if(!editorContent) return form.submit();

            editorContent.value = form.querySelector('.ql-editor').innerHTML;

            return form.submit();        
        });
    });
}

var slug = function(str) {
    var $slug = '';
    var trimmed = $.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}

$('input[name="title"]').on('blur', function() {
    $self = $(this);
    $slug = $('input[name="slug"]');

    if(!$slug.val()) {
        $slug.val( slug($self.val()) );
    }
}).trigger('blur');