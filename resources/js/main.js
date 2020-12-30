$(document).ready(function(){
        $('#list_topic .topic_item .item').hide()
        $('#list_topic .topic_item p.post_cat').click(function() {
            var post_cat_id=$(this).data("id")
            $(this).next('.post_sub_cat_'.post_cat_id).slideToggle()
        })
        $('#wrapper #header .container .wp_menu span#menu_icon').click(function(){
            $('#wrapper #header .container #menu_respon').slideToggle();
        })
        $('#wrapper #header .container #menu_respon #topic span#topic_section').click(function(){
            $('#wrapper #header .container #menu_respon #topic #category').slideToggle()
        })
        $('#wrapper #header .container #menu_respon #topic #category .post_cat_item').children('span.post_cat_title').click(function(){
            $(this).next('.post_sub_cat').slideToggle();
        })
    
})