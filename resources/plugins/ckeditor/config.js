/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.allowedContent = true;
    config.filebrowserBrowseUrl = 'http://localhost:8080/TheCodeholic/resources/plugins/ckfinder/ckfinder.html';
    config.filebrowserUploadUrl = 'http://localhost:8080/TheCodeholic/resources/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.imagebrowserBrowseUrl = 'http://localhost:8080/TheCodeholic/resources/plugins/ckfinder/ckfinder.html';
    config.imagebrowserUploadUrl = 'http://localhost:8080/TheCodeholic/resources/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

};
// CKEDITOR.replace( 'editor_ckf',
// {
//     filebrowserBrowseUrl: "{{ asset('ckfinder/ckfinder.html?Type=Files') }}",
//     filebrowserImageBrowseUrl: "{{ asset('ckfinder/ckfinder.html?Type=Images') }}",
//     filebrowserFlashBrowseUrl: "{{ asset('ckfinder/ckfinder.html?Type=Flash') }}",
//     filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
//     filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connctor/php/connector.php?command=QuickUpload&type=Images') }}",
//     filebrowserFlashUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
// });

