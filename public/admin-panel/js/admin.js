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