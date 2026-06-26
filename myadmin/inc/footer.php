<script src="<?= Root ?>/assets/js/jquery.min.js"></script>
<script src="<?= Root ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= Root ?>/assets/vendors/summernote/summernote-lite.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->
<script src="<?= Root ?>/assets/vendors/ckeditor4/ckeditor.js"></script>
<script src="<?= Root ?>/assets/vendors/ckeditor4/samples/js/sample.js"></script>

<script>
    $('.editor').summernote({
        height: 300
    });

    initSample();
    var editor = CKEDITOR.replace('editor');
    editor.resize('100%', '500', true);


    // CKEDITOR.replace( 'editor1' );

    // CKEDITOR.replace( 'editor1', {
    //     font_names: 'Arial/Arial, Helvetica, sans-serif;'
        // language: 'fr',
        // uiColor: '#9AB8F3'
    // });

    // CKEDITOR.editorConfig = function( config ) {
    //     config.font_names = 'Arial/Arial, Helvetica, sans-serif;' +
    //     'Comic Sans MS/Comic Sans MS, cursive;' +
    //     'Courier New/Courier New, Courier, monospace;' +
    //     'Georgia/Georgia, serif;' +
    //     'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
    //     'Tahoma/Tahoma, Geneva, sans-serif;' +
    //     'Times New Roman/Times New Roman, Times, serif;' +
    //     'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
    //     'Verdana/Verdana, Geneva, sans-serif;';
    // };

    

    // ClassicEditor
    //     .create( document.querySelector( '#ckeditor' ) )
    //     .then( editor => {
    //             console.log( editor );
    //     } )
    //     .catch( error => {
    //             console.error( error );
    //     } );
    

    // $.summernote.dom.walkPoint = (function (_super) {
    //     return function () {
    //         var startPoint = arguments[0]
    //         var endPoint = arguments[1]
    //         var handler = arguments[2]
    //         var isSkipInnerOffset = arguments[3]
    //         let point = startPoint;

    //         while (point) {
    //             handler(point);

    //             if ($.summernote.dom.isSamePoint(point, endPoint)) {
    //                 break;
    //             }
    //             const isSkipOffset = isSkipInnerOffset &&
    //                 startPoint.node !== point.node &&
    //                 endPoint.node !== point.node;
    //             point = $.summernote.dom.nextPoint(point, isSkipOffset);
    //         }
    //     };

    // })($.summernote.dom.walkPoint);
    
</script>
<script>
    $(document).ready(function(){
       $('#short_name').keyup(function () {
           var title = $(this).val();
           var slug = title.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
           $('#url_slug').val(slug);
       });
    });
</script>
<script>
    function imageUpload(size, e) {
            if (size === 'small') {
                var progress = $('#progressbar');
                var progressbar = $('.small-progress-bar');
                var preview = $("#preview-s");
                var preview_image = $("#preview-s img");
                var image_url = $("#small_image_url");
                var error_msg = $("#err-s");
            }else if (size === 'large')  {
                var progress = $('#progressbar-large');
                var progressbar = $('.large-progress-bar');
                var preview = $("#preview");
                var preview_image = $("#preview img");
                var image_url = $("#large_image_url");
                var error_msg = $("#err");
            }
            e.preventDefault();
            var form = new FormData()
            var file = e.target.files[0];
            form.append('image_url', file);
            form.append('size', size);
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();

                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            console.log(percentComplete);
                            progress.css('width', percentComplete + '%');

                            if (percentComplete > 0) {
                                progressbar.removeClass('d-none');
                            }
                            if (percentComplete >= 45) {
                                progress.removeClass('bg-warning')
                                progress.addClass('bg-info')
                            } else if (percentComplete >= 80) {
                                progress.removeClass('bg-info')
                                progress.addClass('bg-success')
                            }

                        }
                    }, false);

                    return xhr;
                },
                url: '<?= Root . "/inc/image_upload.inc.php"; ?>',
                type: "POST",
                data: form,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    preview.fadeOut();
                    error_msg.fadeOut();
                },

                success: function (data) {
                    console.log(data)
                    if (data['error'] === true) {
                        console.log(data)
                        // invalid file format.
                        error_msg.fadeIn().html(data['message']);
                    } else {
                        // view uploaded file.
                        preview.fadeIn();
                        preview.addClass('d-block');
                        preview_image.attr('src', data['image']);
                        image_url.val(data['image']);
                        // $("#form")[0].reset();
                    }
                },
                complete: function (xhr) {
                    progress.css('width', "100%")
                    progressbar.fadeOut(2000);
                },
                error: function (e) {
                    console.log(e)
                    error_msg.html(e).fadeIn();
                }
            });
    }
</script>

<?php
    if($pageTitle == "Call Tracking Table - CMS" || $pageTitle == "Test Article" || $pageTitle == "Bot Log Table - CMS")
    {
?>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    order: [[3, 'desc']]
                });
            } );

            function saveData(event,fieldname,primaryid){
                console.log($('#'+event.target.id).val());
                console.log(fieldname);
                console.log(primaryid);


                $.ajax({
                    type:"POST",
                    url:"call_tracking_updates.php",
                    data: { id : primaryid, field : fieldname, value : $('#'+event.target.id).val() },
                    beforeSend:function(){
                        // window.alert("saving data");
                        // $(".post_submitting").show().html("<center><img src='images/loading.gif'/></center>");
                    },success:function(response){   
                        window.alert("Data Saved");
                        //alert(response);
                        console.log("success");
                        // $("#return_update_msg").html(response); 
                        // $(".post_submitting").fadeOut(1000);                
                    }
                });

            }
        </script>
        <script>
            $(".close").on("click", function() {
                $(".close").alert('close');
            });

            function copyToClipboard(id) 
            {
                // Get the text field
                var copyText = document.getElementById(id);

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.value);

                // Alert the copied text
                console.log("Copied the text: " + copyText.value);
            }
            
        </script>

        
<?php
    }
?>

</body>
</html>