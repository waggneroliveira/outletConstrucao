// $(function(){"use strict";var e,t=window.console||{log:function(){}},a=window.URL||window.webkitURL,o=$("#image"),r=$("#download"),d=$("#dataX"),p=$("#dataY"),c=$("#dataHeight"),i=$("#dataWidth"),n=$("#dataRotate"),l=$("#dataScaleX"),s=$("#dataScaleY"),v={aspectRatio:16/9,preview:".img-preview",crop:function(e){d.val(Math.round(e.detail.x)),p.val(Math.round(e.detail.y)),c.val(Math.round(e.detail.height)),i.val(Math.round(e.detail.width)),n.val(e.detail.rotate),l.val(e.detail.scaleX),s.val(e.detail.scaleY)}},g=o.attr("src"),h="cropped.jpg",m="image/jpeg";$('[data-toggle="tooltip"]').tooltip(),o.on({ready:function(e){t.log(e.type)},cropstart:function(e){t.log(e.type,e.detail.action)},cropmove:function(e){t.log(e.type,e.detail.action)},cropend:function(e){t.log(e.type,e.detail.action)},crop:function(e){t.log(e.type)},zoom:function(e){t.log(e.type,e.detail.ratio)}}).cropper(v),$.isFunction(document.createElement("canvas").getContext)||$('button[data-method="getCroppedCanvas"]').prop("disabled",!0),void 0===document.createElement("cropper").style.transition&&($('button[data-method="rotate"]').prop("disabled",!0),$('button[data-method="scale"]').prop("disabled",!0)),void 0===r[0].download&&r.addClass("disabled"),$(".docs-toggles").on("change","input",function(){var e,t,a=$(this),r=a.attr("name"),d=a.prop("type");o.data("cropper")&&("checkbox"===d?(v[r]=a.prop("checked"),e=o.cropper("getCropBoxData"),t=o.cropper("getCanvasData"),v.ready=function(){o.cropper("setCropBoxData",e),o.cropper("setCanvasData",t)}):"radio"===d&&(v[r]=a.val()),o.cropper("destroy").cropper(v))}),$(".docs-buttons").on("click","[data-method]",function(){var d,p,c,i=$(this),n=i.data(),l=o.data("cropper");if(!i.prop("disabled")&&!i.hasClass("disabled")&&l&&n.method){if(void 0!==(n=$.extend({},n)).target&&(p=$(n.target),void 0===n.option))try{n.option=JSON.parse(p.val())}catch(e){t.log(e.message)}switch(d=l.cropped,n.method){case"rotate":d&&v.viewMode>0&&o.cropper("clear");break;case"getCroppedCanvas":"image/jpeg"===m&&(n.option||(n.option={}),n.option.fillColor="#fff")}switch(c=o.cropper(n.method,n.option,n.secondOption),n.method){case"rotate":d&&v.viewMode>0&&o.cropper("crop");break;case"scaleX":case"scaleY":$(this).data("option",-n.option);break;case"getCroppedCanvas":c&&($("#getCroppedCanvasModal").modal().find(".modal-body").html(c),r.hasClass("disabled")||(download.download=h,r.attr("href",c.toDataURL(m))));break;case"destroy":e&&(a.revokeObjectURL(e),e="",o.attr("src",g))}if($.isPlainObject(c)&&p)try{p.val(JSON.stringify(c))}catch(e){t.log(e.message)}}}),$(document.body).on("keydown",function(e){if(e.target===this&&o.data("cropper")&&!(this.scrollTop>300))switch(e.which){case 37:e.preventDefault(),o.cropper("move",-1,0);break;case 38:e.preventDefault(),o.cropper("move",0,-1);break;case 39:e.preventDefault(),o.cropper("move",1,0);break;case 40:e.preventDefault(),o.cropper("move",0,1)}});var u=$("#inputImage");a?u.change(function(){var t,r=this.files;o.data("cropper")&&r&&r.length&&(t=r[0],/^image\/\w+$/.test(t.type)?(h=t.name,m=t.type,e&&a.revokeObjectURL(e),e=a.createObjectURL(t),o.cropper("destroy").attr("src",e).cropper(v),u.val("")):window.alert("Please choose an image file."))}):u.prop("disabled",!0).parent().addClass("disabled")});


$(function(){

    var canvas  = $("#cropperImg"),
        // context = canvas.get(0).getContext("2d"),
        $result = $('#result');

    $('#inputImage').on( 'change', function(){
        if (this.files && this.files[0]) {
        if ( this.files[0].type.match(/^image\//) ) {
            var reader = new FileReader();
            reader.onload = function(evt) {
                var img = new Image();
                
                img.onload = function() {
                    // context.drawImage(img, 0, 0);

                    canvas.attr('src', img.src);
                    // $('.cropper-container').remove();

                    var cropper = canvas.cropper({
                        aspectRatio: 9 / 9,
                        zoomOnWheel: false,
                        getData: true
                    });

                    canvas.cropper('replace').url('img.src');

                    
                    
                    $('#btnCrop').click(function() {
                        // Get a string base 64 data url
                        $('.cropper-container').remove();
                        var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png"); 
                        $result.append( $('<img>').attr('src', croppedImageDataURL) );

                        // $('#inputImage').val(croppedImageDataURL);
                    });
                    
                    $('#btnRestore').click(function() {
                        canvas.cropper('reset');
                        $result.empty();
                    });
                };
                img.src = evt.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
        else {
            alert("Invalid file type! Please select an image file.");
        }
        }
        else {
        alert('No file(s) selected.');
        }
    });

    // var canvas = e;

    // canvas.toBlob(function(blob) {
    //     var newImg = document.createElement('img'),
    //         url = URL.createObjectURL(blob);

    //     newImg.onload = function() {
    //         // no longer need to read the blob so it's revoked
    //         URL.revokeObjectURL(url);
    //     };

    //     newImg.src = url;
    //     // document.body.appendChild(newImg);
    //     console.log(newImg);
    // });




    // let cropper;

    // $('#inputImage').on('change', function(){
    //     var image = $(this).val();

    //     console.log($(this).cropper === cropper);
    //     cropper = new Cropper(image);

    //     // $image.ready()

    //     // $('#image').attr('src', image);
    // })

});
