
$(document).ready(function () {
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if (link === location2) {
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');
        }
    });

    $('.delete-btn').click(function () {
        var res = confirm('Подтвердите действия');
        if (!res) {
            return false;
        }
    });

    // Инициализация CKEditor 5
    ClassicEditor
    .create(document.querySelector('.editor'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote',
                'insertTable', 'mediaEmbed'
            ],
            shouldNotGroupWhenFull: true
        },
        placeholder: 'Введите текст...',
        language: 'ru', // Установите язык, если нужно
        // Добавьте другие параметры конфигурации по мере необходимости
    })
    .catch(error => {
        console.error('Ошибка инициализации редактора:', error);
    });

});






// $(document).ready(function () {
//     $(".nav-treeview .nav-link, .nav-link").each(function () {
//         var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
//         var link = this.href;
//         if(link == location2){
//             $(this).addClass('active');
//             $(this).parent().parent().parent().addClass('menu-is-opening menu-open');

//         }
//     });

//     $('.delete-btn').click(function () {
//         var res = confirm('Подтвердите действия');
//         if(!res){
//             return false;
//         }
//     });
// })

// tinymce.init({
//     selector: 'editor',
//     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
//     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
//     tinycomments_mode: 'embedded',
//     tinycomments_author: 'Ярослав',
//     mergetags_list: [
//       { value: 'First.Name', title: 'First Name' },
//       { value: 'Email', title: 'Email' },
//     ],
//     ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
//   });



//    function elFinderBrowser (callback, value, meta) {
//     tinymce.activeEditor.windowManager.openUrl({
//         title: 'File Manager',
//         url: '/elfinder/tinymce5',
//         /**
//          * On message will be triggered by the child window
//          *
//          * @param dialogApi
//          * @param details
//          * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
//          */
//         onMessage: function (dialogApi, details) {
//             if (details.mceAction === 'fileSelected') {
//                 const file = details.data.file;

//                 // Make file info
//                 const info = file.name;

//                 // Provide file and text for the link dialog
//                 if (meta.filetype === 'file') {
//                     callback(file.url, {text: info, title: info});
//                 }

//                 // Provide image and alt text for the image dialog
//                 if (meta.filetype === 'image') {
//                     callback(file.url, {alt: info});
//                 }

//                 // Provide alternative source and posted for the media dialog
//                 if (meta.filetype === 'media') {
//                     callback(file.url);
//                 }

//                 dialogApi.close();
//             }
//         }
//     });
// }
