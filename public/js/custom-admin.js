jQuery(document).ready(function ($) {
    $('select.select2').select2({
        tags: true
    });

    $('select.no_tag').select2({});


    $('.add_download_item').on('click',function (event) {
        var wrapper = $('.download-wrapper');
        var item = '<div class="input-group">\n' +
            '    <input dir="ltr" type="text" name="downloadLinks[]" class="form-control" placeholder="لینک دانلود فیلم">\n' +
            '    <input dir="ltr" type="text" name="downloadLinksScreen[]" class="form-control" placeholder="لینک اسکرین شات">\n' +
            '    <input dir="ltr" type="text" name="downloadLinksQuality[]" class="form-control" placeholder="کیفیت لینک دانلود">\n' +
            '      <a href="#" class="remove_download_item">\n' +
            '        حذف\n' +
            '      </a>\n' +
            '    \n' +
            '  </div>';
        event.preventDefault();
        wrapper.append(item);
    });
    $(document).on('click','.remove_download_item' , function (event) {
        event.preventDefault();
        var $this = $(this);
        $this.parent().remove();
    });




    $('.add_subtitle_item').on('click',function (event) {
        var wrapper = $('.subtitle-wrapper');
        var item = '<div class="input-group">\n' +
            '                    <input dir="ltr" type="text" name="subtitleDownloadLinks[]" class="form-control"\n' +
            '                           placeholder="لینک دانلود زیرنویس" ">\n' +
            '                    <a href="#" class="remove_subtitle_item">حذف</a>\n' +
            '                </div>';
        event.preventDefault();
        wrapper.append(item);
    });
    $(document).on('click','.remove_subtitle_item' , function (event) {
        event.preventDefault();
        var $this = $(this);
        $this.parent().remove();
    });


});

