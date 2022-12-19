console.log('works');
if(document.querySelector('.answer-editor')) {
    tinymce.init({
        selector: '.answer-editor',
        skin: 'bootstrap',
        plugins: 'lists, link, code',
        toolbar: 'bold italic strikethrough blockquote bullist numlist backcolor | link',
        menubar: false,
        branding: false
    });
}

if(document.querySelector('.question-editor')) {
    tinymce.init({
        selector: '.question-editor',
        skin: 'bootstrap',
        plugins: 'lists, link, code',
        toolbar: 'bold italic strikethrough blockquote bullist numlist backcolor | link',
        menubar: false,
        branding: false
    });
}
