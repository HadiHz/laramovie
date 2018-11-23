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




    $('#add_season').on('click',function (event) {
        var wrapper = $('.season-wrapper');
        var serialName =   serialNameFromblade;
        var serialImage = serialImageFromblade;
        var item = '<tr>\n' +
            '                            <th scope="row"><img alt="..." class="img-thumbnail serImg"\n' +
            '                                                 style="width:4rem;height:4rem;"></th>\n' +
            '                            <td>'+ serialName+'</td>\n' +
            '                            <td><input name="season_number[]" type="text" value=""></td>\n' +
            '                            <td><input name="number_of_episodes[]" type="text" value=""></td>\n' +
            '                            <td></td>\n' +
            '                            <td>\n' +
            '                                <button type="button" class="btn btn-danger mt-2 mb-2 remove_season">حذف</button>\n' +
            '\n' +
            '                            </td>\n' +
            '                        </tr>';
        event.preventDefault();
        wrapper.append(item);
        $(".serImg").attr("src",serialImage)
    });
    $(document).on('click','.remove_season' , function (event) {
        event.preventDefault();
        var flag =  confirm('آیا مطمئن هستید؟');
        if (flag){
            var $this = $(this);
            $this.parent().parent().remove();
        }

    });




    $('#add_episode').on('click',function (event) {
        var wrapper = $('.episode-wrapper');
        var serialName =   serialNameFromblade;
        var serialImage = serialImageFromblade;
        var seasonNum = seasonNumberFromblade;
        var item = '<tr>\n' +
            '                                <th scope="row"><img alt="..." class="img-thumbnail serImg"\n' +
            '                                                     style="width:4rem;height:4rem;"></th>\n' +
            '                                <td>'+ serialName +'</td>\n' +
            '                                <td>'+ seasonNum +'</td>\n' +
            '                                <td><input name="episode_number[]" type="text" ></td>\n' +
            '                                <td><input name="name[]" type="text" ></td>\n' +
            '                                <td><input name="release_date[]" data-field="date" type="text"></td>\n' +
            '                                <td>\n' +
            '                                    <button type="button" class="btn btn-danger mt-2 mb-2 remove_episode">حذف</button>\n' +
            '                                </td>\n' +
            '                            </tr>';
        event.preventDefault();
        wrapper.append(item);
        $(".serImg").attr("src",serialImage)
    });
    $(document).on('click','.remove_episode' , function (event) {
        event.preventDefault();
        var flag =  confirm('آیا مطمئن هستید؟');
        if (flag){
            var $this = $(this);
            $this.parent().parent().remove();
        }

    });



    $('#add_download_link').on('click',function (event) {
        var wrapper = $('.download_wrapper');
        var item = '<div class="row mb-3 mt-3 pr-3 pl-3 ">\n' +
            '\n' +
            '                    <div class="col-md-3 d-inline-block pl-0">\n' +
            '                        <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">\n' +
            '                            کیفیت لینک دانلود : </label>\n' +
            '                        <input name="downloadLinksQuality[]" type="text" class="form-control  d-inline-block w-50" id="inputDownloaQuality1"\n' +
            '                               placeholder="">\n' +
            '                    </div>\n' +
            '                    <div class="col-md-3 d-inline-block pl-0 pr-0">\n' +
            '                        <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">\n' +
            '                            لینک دانلود : </label>\n' +
            '                        <input name="downloadLinks[]" type="text" class="form-control  d-inline-block w-50" id="inputDownloaQuality1"\n' +
            '                               placeholder="">\n' +
            '                    </div>\n' +
            '                    <div class="col-md-3 d-inline-block pl-0 pr-0">\n' +
            '                        <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">\n' +
            '                            اسکرین شات : </label>\n' +
            '                        <input name="downloadLinksScreen[]" type="text" class="form-control  d-inline-block w-50" id="inputDownloaQuality1"\n' +
            '                               placeholder="">\n' +
            '                    </div>\n' +
            '                    <div class="col-12 col-md-2">\n' +
            '                        <button type="button" class="btn btn-danger remove_download_link">حذف لینک دانلود</button>\n' +
            '                    </div>\n' +
            '\n' +
            '                </div>';
        event.preventDefault();
        wrapper.append(item);
    });
    $(document).on('click','.remove_download_link' , function (event) {
        event.preventDefault();
        var flag =  confirm('آیا مطمئن هستید؟');
        if (flag){
            var $this = $(this);
            $this.parent().parent().remove();
        }

    });



    $('#add_subtitle').on('click',function (event) {
        var wrapper = $('.subtitle_wrapper');
        var item = '<div class="row mb-3 mt-3 pr-3 pl-3">\n' +
            '                    <div class="col-md-6 d-inline-block pl-0">\n' +
            '                        <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">لینک\n' +
            '                            دانلود زیرنویس : </label>\n' +
            '                        <input name="subtitleDownloadLinks[]" type="text" class="form-control  d-inline-block w-50" id="inputDownloaQuality1"\n' +
            '                               placeholder="">\n' +
            '                    </div>\n' +
            '\n' +
            '\n' +
            '                    <div class="col-12 col-md-3">\n' +
            '                        <button type="button" class="btn btn-danger remove_subtitle">حذف لینک دانلود زیرنویس</button>\n' +
            '                    </div>\n' +
            '                </div>';
        event.preventDefault();
        wrapper.append(item);
    });
    $(document).on('click','.remove_subtitle' , function (event) {
        event.preventDefault();
        var flag =  confirm('آیا مطمئن هستید؟');
        if (flag){
            var $this = $(this);
            $this.parent().parent().remove();
        }

    });


    $("#dtBox").DateTimePicker();



    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFile").change(function() {
        readURL(this);
    });




});

