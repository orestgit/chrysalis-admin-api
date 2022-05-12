$(function () {
    $(function () {
        var Accordion1 = function (el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
            var links = this.el.find(".link");
            links.on(
                "click", { el: this.el, multiple: this.multiple },
                this.dropdown
            );
        };
        Accordion1.prototype.dropdown = function (e) {
            var $el = e.data.el;
            ($this = $(this)), ($next = $this.next());
            $next.slideToggle();
            $this.parent().toggleClass("open, admin-sidemenu-active");
            // for arrow
            $(this).find(".dropdown__arrow").toggleClass("up__arrow");
            if ($(this).find(".dropdown__arrow").hasClass("up__arrow")) {
                $(".dropdown__arrow").removeClass("up__arrow");
                $(this).find(".dropdown__arrow").toggleClass("up__arrow");
            }
            //for arrow end
            if (!e.data.multiple) {
                $el
                    .find(".submenu")
                    .not($next)
                    .slideUp()
                    .parent()
                    .removeClass("open, admin-sidemenu-active");
            }
        };
        var accordion1 = new Accordion1($("#accordion1"), false);
    });
    $('#table-0,#table-1,#table-2,#table-3,#table-4,#table-5').DataTable();
    $(document).on("click", '#mydiv', function () {
        alert("You have just clicked on ");
    });

    function appendImagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).closest('.avatar-upload').find('.imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $(input).closest('.avatar-upload').find('.imagePreview').hide();
                $(input).closest('.avatar-upload').find('.imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change", ".multiimageUpload", function () {
        appendImagePreview(this);
    });
});

$(document).ready(function () {
    // to add questions to protocol
    var count_array=[];
    var click_count=0;
    $('#add_chapter_questions').on('click',function (e) {
        e.preventDefault();
        click_count=click_count+1;
        var current_count=$(this).data('count')+1;
        $(this). data('count', current_count);
        count_array.push(current_count);
        $('input:hidden[name=ids]').val(count_array.join(","));
        var html='' +
            '<div id="'+current_count+'">' +
            '                   <div class="row">\n' +
            '                    <div class="col-sm-12 col-lg-12 col-xs-12">\n' +
            '                        <div class="form-container">\n' +
            '                            <label> Questions</label>\n' +
            '                            <input  class="form-control address_field "  name="question_'+current_count+'"placeholder="">\n' +
            '                        </div>\n' +
            '                    </div>\n' +'  ' +

            '<div class="col-sm-12">' +
            ' <div class="form-container"><a class="btn btn-danger delete_chapter_question_row pull-right" data-id="'+current_count+'">Delete</a></div></div> <br/>' +
            '                                </div>\n' +

            '                            </div>\n' +

            '                        </div>\n' +

            '                    </div>\n' +
            '                </div></div>';
        $('#append_chapter_questions').append(html);
    })

    $('body').on('click',".delete_chapter_question_row", function(){
        var id=$(this).data('id');
        if($(this).hasClass('existing_record')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:config.routes.removeChapterQuestion,
                data:{question_id:$(this).data('id')},
                success:function(data){
                    console.log(data);
                }
            });
        }
        else{
            var Index = count_array.indexOf(id);
            count_array.splice(Index, 1);
            $('input:hidden[name=ids]').val(count_array.join(","));
        }
        $('div#'+id).remove();
    })

    $('.select').niceSelect();
    // google maps places
    // Prepare location info object.
    var locationInfo = {
        geo: null,
        country: null,
        state: null,
        city: null,
        postalCode: null,
        street: null,
        streetNumber: null,
        reset: function () {
            this.geo = null;
            this.country = null;
            this.state = null;
            this.city = null;
            this.postalCode = null;
            this.street = null;
            this.streetNumber = null;
        }
    };

    googleAutocomplete = {
        autocompleteField: function (fieldId) {
            (autocomplete = new google.maps.places.Autocomplete(
                document.getElementById(fieldId)
            )), { types: ["geocode", 'address'] };
            google.maps.event.addListener(autocomplete, "place_changed", function () {
                // Segment results into usable parts.
                var place = autocomplete.getPlace(),
                    address = place.address_components,
                    lat = place.geometry.location.lat(),
                    lng = place.geometry.location.lng();
                console.log(lat);
                console.log(lng);
                console.log(place);
                console.log(address);
                document.getElementById("lat").value = lat;
                document.getElementById("lng").value = lng;
                var latlng = new google.maps.LatLng(lat, lng);
                console.log(latlng);
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'latLng': lat }, function (results, status) {
                    console.log("status" + status);
                    console.log("result" + result);
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            for (j = 0; j < results[0].address_components.length; j++) {
                                if (results[0].address_components[j].types[0] == 'postal_code')
                                    alert("Zip Code: " + results[0].address_components[j].short_name);
                            }
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
                });
                locationInfo.reset();
                // Save the individual address components.
                locationInfo.geo = [lat, lng];
                console.log(locationInfo.geo);
                for (var i = 0; i < address.length; i++) {
                    var component = address[i].types[0];
                    switch (component) {
                        case "country":
                            locationInfo.country = address[i]["long_name"];
                            break;
                        case "administrative_area_level_1":
                            locationInfo.state = address[i]["long_name"];
                            break;
                        case "locality":
                            locationInfo.city = address[i]["long_name"];
                            break;
                        case "postal_code":
                            locationInfo.postalCode = address[i]["long_name"];
                            break;
                        case "route":
                            locationInfo.street = address[i]["long_name"];
                            break;
                        case "street_number":
                            locationInfo.streetNumber = address[i]["long_name"];
                            break;
                        default:
                            break;
                    }
                }
                // Preview map.
                /* var src =
                     "https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyAILGVlt-SOiL381JT3TQ9dxxoNIUuxrV8&center=" +
                     lat +
                     "," +
                     lng +
                     "&zoom=14&size=480x125&maptype=roadmap&sensor=false",
                     img = document.createElement("img");
                 img.src = src;
                 img.className = "absolute top-0 left-0 z-20";
                 document.getElementById("js-preview-map").appendChild(img);
                 // Preview JSON output.
                 document.getElementById("js-preview-json").innerHTML = JSON.stringify(
                     locationInfo,
                     null,
                     5
                 );*/
            });
        }
    };
    // Attach listener to address input field.
    googleAutocomplete.autocompleteField("address");
    var count_array = [];
    var options_array=[];
    $(document).ready(function () {
        //
        $('#imgInp').on('change', function () {
            console.log($(this).files);
        })

        $(".imageUpload").change(function () {
            appendImagePreview(this);
        });

        var click_count = 0;

        // code to add new protocol questions
        $('#add_protocol_question').on('click', function (e) {

            e.preventDefault();
            //  var type = $('#question_type').val();
            var current_count = $(this).data('count') + 1;
            var current_class = current_count == 1 ? "current" : "";
            $(this).data('count', current_count);
            count_array.push(current_count);
            $('input:hidden[name=ids]').val(count_array.join(","));
            // $('input:hidden[name=question_type]').val(type);
            var tab = '<li class="theme-tab-item ' + current_class + ' class_' + current_count + '"  data-tab="tab-' + current_count + '">' + current_count + '</li>';
            var tab_content = '';
            var question = 'question_' + current_count;
            var option_1 = 'thumbnail_' + current_count;
            var option_2 = 'option_2' + current_count;
            var option_3 = 'option_3' + current_count;
            var option_4 = 'option_4' + current_count;
            var answer = 'answer_' + current_count;

            var choose_answer = 'choose_answer_' + current_count;
            tab_content = '<div id="tab-' + current_count + '"  class="theme-tab-content ' + current_class + '  class_' + current_count + '" >' +
                '   <div  class="container-fluid">\n' +
                '     <div  class="row">\n' +
                '      <div  class="col-12 col-lg-6">\n' +
                '         <div  class="section-header section-title-head section-lessons-md px-0">\n' +
                '            <div class="section-header__title">\n' +
                '               <h4 class="h4">  Question   Details </h4>\n' +
                '            </div>\n' +
                '         </div>\n' +
                '         <div  class="input-fields-container">\n' +
                '            <div class="form-group form-input-container">\n' +
                '               <input type="hidden"  name=' + answer + ' value="1">' +
                '               <textarea class="form-control   input__theme textarea__theme"  name="' + question + '" id="" rows="3" placeholder="Question"></textarea>\n' +
                '            </div>\n' +
                '            <div  class="form-group form-input-container">\n' +
                '               <textarea class="form-control   input__theme textarea__theme"  name="hint_' + current_count + '" id="" rows="3" placeholder="Hint"></textarea>\n' +
                '            </div>\n' +
                '   <label class=" d-none">Video Thumbnail </label>' +
                '  <div class="checkbox-select-option answer-single-images d-none">' +
                '                <div class="choose-answer choose-answer-images">' +
                '                        <div class="avatar-upload">' +
                '                             <div class="qr-code-view "><input type="file" id="one_' + current_count + '"  name="' + option_1 + '" class="multiimageUpload new_file" accept=".png, .jpg, .jpeg"/></div> ' +
                '                                <label for="one_' + current_count + '" class="image-picker-label mb-0">' +
                '                                   <div class="avatar-edit avatar-checkbox-image imagePreview " > </div></label>' +
                '                           </div>' +
                '                           ' +
                '                   </div>' +
                '               </div>' +
                '            <input type="hidden" name="question_type_' + current_count + '" value="1" >\n' +
                '         </div>\n' +
                '   <label  class=" d-none">Video </label>' +
                '  <div class="checkbox-select-option answer-single-images d-none">' +
                '                <div class="choose-answer choose-answer-images">' +
                '                        <div class="avatar-upload">' +
                '                             <div class="qr-code-view "><input type="file" id="two_' + current_count + '"  name="' + option_2 + '" class="multiimageUpload new_file" accept=".mp4,.mov"/></div> ' +
                '                                <label for="two_' + current_count + '" class="image-picker-label mb-0">' +
                '                                   <div class="avatar-edit avatar-checkbox-image imagePreview " > </div></label>' +
                '                           </div>' +
                '                           ' +
                '                   </div>' +
                '               </div>' +
                '            <input type="hidden" name="question_type_' + current_count + '" value="1" >\n' +
                '         </div>\n' +
                '      <div  class="col-12 col-lg-6">\n' +
                '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
                '               <h4 class="h4">  Question   Options </h4>\n' +
                '       </div>\n' +
                '         <div  class="checkbox-select-option answer-single">\n' +
                '            <div    class="choose-answer">\n' +
                '               <input   type="radio"  value="1"  id="radio1_' + current_count + '" name="radio_' + current_count + '" class="correct_answer"  data-option="1" data-count=' + current_count + ' name=' + choose_answer + '  checked>\n' +
                '               <label for="radio1_' + current_count + '">Yes</label>\n' +
                '            </div>\n' +
                '            <div  class="choose-answer">\n' +
                '               <input   type="radio"  value="2"   name="radio_' + current_count + '"  id="radio2_' + current_count + '" class="correct_answer"  data-option="2" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                '               <label for="radio2_' + current_count + '">No</label>\n' +
                '            </div>\n' +
                '         </div>\n' +

                '            <div  class="form-group form-input-container">\n' +
                '               <textarea class="form-control   input__theme textarea__theme"  name="explanation_' + current_count + '" id="" rows="3" placeholder="Explanation"></textarea>\n' +
                '            </div>\n' +

                '            <div  class="form-group form-input-container  d-none">\n' +
                '               <input type="text" class="form-control   "  name="buttont_text_' + current_count + '" id="" rows="3" placeholder="Button Text">\n' +
                '            </div>\n' +


                '            <div  class="form-group form-input-container  d-none">\n' +
                '               <input type="text" class="form-control   "  name="button_link_' + current_count + '" id="" rows="3" placeholder="Button Link">\n' +
                '            </div>\n' +

                '            <div  class="form-group form-input-container">\n' +
                '               <input type="text" class="form-control  "  name="yes_option_text_' + current_count + '" id="" rows="3" placeholder="Yes Option Text">\n' +
                '            </div>\n' +

                '            <div  class="form-group form-input-container">\n' +
                '               <input type="text" class="form-control  "  name="no_option_text_' + current_count + '" id="" rows="3" placeholder="Yes Option Text">\n' +
                '            </div>\n' +

                '   </div>\n' +
                ' <div class="row"><div  class="col-12 col-lg-12"><a  data-route="' + config.routes.deleteProtocolQuestion + '"  data-id="' + current_count + '" class="btn btn__theme    btn-edit-remove delete_question">Delete</a></div></div> ' +
                '</div>' +
                '</div>'
            $('.theme-tabs').append(tab);
            $('#question_content').append(tab_content);
        })
        // code to append new question
        // 4 cases for appending questions append html for the chosen case and a global counter with question type is maintained in count_array
        // tab and tab content both are appended with selected type of question fields
        $('#add_question').on('click', function (e) {
            e.preventDefault();
            var type = $('#question_type').val();
            var current_count = $(this).data('count') + 1;
            var current_class = current_count == 1 ? "current" : "";
            $(this).data('count', current_count);
            count_array.push(current_count);
            console.log(count_array);
            $('input:hidden[name=ids]').val(count_array.join(","));
            $('input:hidden[name=question_type]').val(type);
            var tab = '<li class="theme-tab-item ' + current_class + ' class_' + current_count + '"  data-tab="tab-' + current_count + '">' + current_count + '</li>';
            var tab_content = '';
            var question = 'question_' + current_count;
            var option_1 = 'option_1' + current_count;
            var option_2 = 'option_2' + current_count;
            var option_3 = 'option_3' + current_count;
            var option_4 = 'option_4' + current_count;
            var answer = 'answer_' + current_count;
            var choose_answer = 'choose_answer_' + current_count;
            if (type == 1) {
                tab_content = '<div id="tab-' + current_count + '"  class="theme-tab-content ' + current_class + '  class_' + current_count + '" >' +
                    '   <div  class="container-fluid">\n' +
                    '     <div  class="row">\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '         <div  class="section-header section-title-head section-lessons-md px-0">\n' +
                    '            <div class="section-header__title">\n' +
                    '               <h4 class="h4">  Question   Details </h4>\n' +
                    '            </div>\n' +
                    '         </div>\n' +
                    '         <div  class="input-fields-container">\n' +
                    '            <div class="form-group form-input-container">\n' +
                    '               <input type="hidden"  name=' + answer + ' value="1">' +
                    '               <textarea class="form-control validate_input input__theme textarea__theme"  name="' + question + '" id="" rows="3" placeholder="Question"></textarea>\n' +
                    '            </div>\n' +
                    '            <div  class="form-group form-input-container">\n' +
                    '               <textarea class="form-control validate_input input__theme textarea__theme"  name="hint_' + current_count + '" id="" rows="3" placeholder="Hint"></textarea>\n' +
                    '            </div>\n' +
                    '            <input type="hidden" name="question_type_' + current_count + '" value="1" >\n' +
                    '         </div>\n' +
                    '      </div>\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
                    '               <h4 class="h4">  Question   Options </h4>\n' +
                    '       </div>\n' +
                    '         <div  class="checkbox-select-option answer-single">\n' +
                    '            <div    class="choose-answer">\n' +
                    '               <input   type="radio"  value="1"  id="radio1_' + current_count + '" name="radio_' + current_count + '" class="correct_answer"  data-option="1" data-count=' + current_count + ' name=' + choose_answer + '  checked>\n' +
                    '               <label for="radio1_' + current_count + '">Yes</label>\n' +
                    '            </div>\n' +
                    '            <div  class="choose-answer">\n' +
                    '               <input   type="radio"  value="2"   name="radio_' + current_count + '"  id="radio2_' + current_count + '" class="correct_answer"  data-option="2" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                    '               <label for="radio2_' + current_count + '">No</label>\n' +
                    '            </div>\n' +
                    '         </div>\n' +
                    '      </div>\n' +
                    '   </div>\n' +
                    ' <div class="row"><div  class="col-12 col-lg-12"><a  data-id="' + current_count + '" class="btn btn__theme    btn-edit-remove delete_question">Delete</a></div></div> ' +
                    '</div>' +
                    '</div>'
            }
            if (type == 2) {
                tab_content = '<div id="tab-' + current_count + '"  class="theme-tab-content ' + current_class + '  class_' + current_count + '" >' +
                    '   <div  class="container-fluid">\n' +
                    '     <div  class="row">\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '         <div  class="section-header section-title-head section-lessons-md px-0">\n' +
                    '            <div class="section-header__title">\n' +
                    '               <h4 class="h4">  Question   Details </h4>\n' +
                    '            </div>\n' +
                    '         </div>\n' +
                    '         <div  class="input-fields-container">\n' +
                    '            <div class="form-group form-input-container">\n' +
                    '               <input type="hidden"  name=' + answer + ' value="1">' +
                    '               <textarea class="form-control  validate_input input__theme textarea__theme"  name="' + question + '" id="" rows="3" placeholder="Question"></textarea>\n' +
                    '            </div>\n' +
                    '            <div  class="form-group form-input-container">\n' +
                    '               <textarea class="form-control  validate_input input__theme textarea__theme"  name="hint_' + current_count + '" id="" rows="3" placeholder="Hint"></textarea>\n' +
                    '            </div>\n' +
                    '            <input type="hidden" name="question_type_' + current_count + '" value="2" >\n' +
                    '         </div>\n' +
                    '      </div>\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
                    '               <h4 class="h4">  Question   Options </h4>\n' +
                    '       </div>\n' +
                    '         <div  class="checkbox-select-option answer-single">\n' +
                    '            <div    class="choose-answer">\n' +
                    '               <input   type="checkbox"  value="1" data-select="multiple"  id="radio1_' + current_count + '" name="radio_' + current_count + '" class="correct_answer"  data-option="1" data-count=' + current_count + ' name=' + choose_answer + '  checked>\n' +
                    '               <label for="radio1_' + current_count + '"></label><input type="text" name="' + option_1 + '"  class="form-control answer-field"/> \n' +
                    '            </div>\n' +
                    '            <div  class="choose-answer">\n' +
                    '               <input   type="checkbox"  value="2" data-select="multiple"    name="radio_' + current_count + '"  id="radio2_' + current_count + '" class="correct_answer"  data-option="2" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                    '               <label for="radio2_' + current_count + '"></label><input type="text" name="' + option_2 + '"  class="form-control answer-field"/>\n' +
                    '            </div>\n' +
                    '            <div  class="choose-answer">\n' +
                    '               <input   type="checkbox"  value="2"   data-select="multiple"   name="radio_' + current_count + '"  id="radio3_' + current_count + '" class="correct_answer"  data-option="3" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                    '               <label for="radio3_' + current_count + '"></label><input type="text" name="' + option_3 + '"  class="form-control answer-field"/>\n' +
                    '            </div>\n' +
                    '            <div  class="choose-answer">\n' +
                    '               <input   type="checkbox"  value="2" data-select="multiple"   name="radio_' + current_count + '"  id="radio4_' + current_count + '"  data-type="checkbox" class="correct_answer"  data-option="4" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                    '               <label for="radio4_' + current_count + '"></label><input type="text" name="' + option_4 + '"  class="form-control answer-field"/>\n' +
                    '            </div>\n' +
                    '         </div>\n' +
                    '      </div>\n' +
                    '   </div>\n' +
                    ' <div class="row"><div  class="col-12 col-lg-12"><a  data-id="' + current_count + '" class="btn btn__theme  btn-edit-remove delete_question">Delete</a></div></div> ' +
                    '</div>' +
                    '</div>'
            }
            if (type == 3) {
                tab_content = '<div id="tab-' + current_count + '"  class="theme-tab-content ' + current_class + '  class_' + current_count + '" >' +
                    '   <div  class="container-fluid">\n' +
                    '     <div  class="row">\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '         <div  class="section-header section-title-head section-lessons-md px-0">\n' +
                    '            <div class="section-header__title">\n' +
                    '               <h4 class="h4">  Question   Details </h4>\n' +
                    '            </div>\n' +
                    '         </div>\n' +
                    '         <div  class="input-fields-container">\n' +
                    '            <div class="form-group form-input-container">\n' +
                    '               <input type="hidden"  name=' + answer + ' value="1">' +
                    '               <textarea class="form-control validate_input input__theme textarea__theme"  name="' + question + '" id="" rows="3" placeholder="Question"></textarea>\n' +
                    '            </div>\n' +
                    '            <div  class="form-group form-input-container">\n' +
                    '               <textarea class="form-control validate_input input__theme textarea__theme"  name="hint_' + current_count + '" id="" rows="3" placeholder="Hint"></textarea>\n' +
                    '            </div>\n' +
                    '            <input type="hidden" name="question_type_' + current_count + '" value="3" >\n' +
                    '         </div>\n' +
                    '      </div>\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
                    '               <h4 class="h4">  Question   Options </h4>\n' +
                    '       </div>\n' +
                    '         <div  class="checkbox-select-option answer-single">\n' +
                    '            <div    class="choose-answer">\n' +
                    '               <input   type="radio"  value="1"  id="radio1_' + current_count + '" name="radio_' + current_count + '" class="correct_answer"  data-option="1" data-count=' + current_count + ' name=' + choose_answer + '  checked>\n' +
                    '               <label for="radio1_' + current_count + '"></label><input type="text" name="' + option_1 + '"  class="form-control answer-field validate_input"/> \n' +
                    '            </div>\n' +
                    '            <div  class="choose-answer">\n' +
                    '               <input   type="radio"  value="2"   name="radio_' + current_count + '"  id="radio2_' + current_count + '" class="correct_answer"  data-option="2" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                    '               <label for="radio2_' + current_count + '"></label><input type="text" name="' + option_2 + '"  class="form-control answer-field validate_input"/>\n' +
                    '            </div>\n' +
                    '            <div  class="choose-answer">\n' +
                    '               <input   type="radio"  value="2"   name="radio_' + current_count + '"  id="radio3_' + current_count + '" class="correct_answer"  data-option="2" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                    '               <label for="radio3_' + current_count + '"></label><input type="text" name="' + option_3 + '"  class="form-control answer-field validate_input"/>\n' +
                    '            </div>\n' +
                    '            <div  class="choose-answer">\n' +
                    '               <input   type="radio"  value="2"   name="radio_' + current_count + '"  id="radio4_' + current_count + '"  data-type="checkbox" class="correct_answer"  data-option="2" data-count=' + current_count + ' name=' + choose_answer + '>\n' +
                    '               <label for="radio4_' + current_count + '"></label><input type="text" name="' + option_4 + '"  class="form-control answer-field validate_input"/>\n' +
                    '            </div>\n' +
                    '         </div>\n' +
                    '      </div>\n' +
                    '   </div>\n' +
                    ' <div class="row"><div  class="col-12 col-lg-12"><a  data-id="' + current_count + '" class="btn btn__theme   btn-edit-remove delete_question">Delete</a></div></div> ' +
                    '</div>' +
                    '</div>'
            }
            if (type == 4) {
                tab_content = '<div id="tab-' + current_count + '"  class="theme-tab-content ' + current_class + '  class_' + current_count + '" >' +
                    '   <div  class="container-fluid">\n' +
                    '     <div  class="row">\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '         <div  class="section-header section-title-head section-lessons-md px-0">\n' +
                    '            <div class="section-header__title">\n' +
                    '               <h4 class="h4">  Question   Details </h4>\n' +
                    '            </div>\n' +
                    '         </div>\n' +
                    '         <div  class="input-fields-container">\n' +
                    '            <div class="form-group form-input-container">\n' +
                    '               <input type="hidden"  name=' + answer + ' value="1">' +
                    '               <textarea class="form-control input__theme textarea__theme validate_input"  name="' + question + '" id="" rows="3" placeholder="Question"></textarea>\n' +
                    '            </div>\n' +
                    '            <div  class="form-group form-input-container">\n' +
                    '               <textarea class="form-control input__theme textarea__theme validate_input"  name="hint_' + current_count + '" id="" rows="3" placeholder="Hint"></textarea>\n' +
                    '            </div>\n' +
                    '            <input type="hidden" name="question_type_' + current_count + '" value="4" >\n' +
                    '         </div>\n' +
                    '      </div>\n' +
                    '      <div  class="col-12 col-lg-6">\n' +
                    '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
                    '               <h4 class="h4">  Question   Options </h4>\n' +
                    '       </div>\n' +
                    '<div class="radio-cards">' +
                    '       <div class="answers-container">' +
                    '             <div class="checkbox-select-option answer-single-images">' +
                    '                <div class="choose-answer choose-answer-images">' +
                    '                     <input type="radio" class="correct_answer" id="radio1_' + current_count + '" name="radio_' + current_count + '" data-option="1"' +
                    '                    data-count="' + current_count + '"  name=' + choose_answer + ' checked="">' +
                    '                         <label for="radio1_' + current_count + '" class="mb-0">' +
                    '                        <div class="avatar-upload">' +
                    '                             <div class="qr-code-view "><input type="file" id="one_' + current_count + '"  name="' + option_1 + '" class="multiimageUpload" accept=".png, .jpg, .jpeg"/></div> ' +
                    '                                <label for="one_' + current_count + '" class="image-picker-label mb-0">' +
                    '                                   <div class="avatar-edit avatar-checkbox-image imagePreview " > </div></label>' +
                    '                           </div>' +
                    '                           ' +
                    '                   </div>' +
                    '               </div>' +
                    '             <div class="checkbox-select-option answer-single-images">' +
                    '                <div class="choose-answer choose-answer-images">' +
                    '                     <input type="radio" class="correct_answer" id="radio2_' + current_count + '" name="radio_' + current_count + '" data-option="2"' +
                    '                    data-count="' + current_count + '"  name=' + choose_answer + ' >' +
                    '                         <label for="radio2_' + current_count + '" class="mb-0">' +
                    '                        <div class="avatar-upload">' +
                    '                             <div class="qr-code-view "><input type="file" id="two_' + current_count + '"  name="' + option_2 + '" class="multiimageUpload" accept=".png, .jpg, .jpeg"/></div> ' +
                    '                                <label for="two_' + current_count + '" class="image-picker-label mb-0">' +
                    '                                   <div class="avatar-edit avatar-checkbox-image imagePreview " > </div></label>' +
                    '                           </div>' +
                    '                           ' +
                    '                      </div>' +
                    '               </div>' +
                    '             <div class="checkbox-select-option answer-single-images">' +
                    '                <div class="choose-answer choose-answer-images">' +
                    '                     <input type="radio" class="correct_answer" id="radio3_' + current_count + '" name="radio_' + current_count + '" data-option="3"' +
                    '                    data-count="' + current_count + '"  name=' + choose_answer + ' >' +
                    '                         <label for="radio3_' + current_count + '" class="mb-0">' +
                    '                        <div class="avatar-upload">' +
                    '                             <div class="qr-code-view "><input type="file" id="three_' + current_count + '"  name="' + option_3 + '" class="multiimageUpload" accept=".png, .jpg, .jpeg"/></div> ' +
                    '                                <label for="three_' + current_count + '" class="image-picker-label mb-0">' +
                    '                                   <div class="avatar-edit avatar-checkbox-image imagePreview " > </div></label>' +
                    '                           </div>' +
                    '                           ' +
                    '                      </div>' +
                    '               </div>' +
                    '             <div class="checkbox-select-option answer-single-images">' +
                    '                <div class="choose-answer choose-answer-images">' +
                    '                     <input type="radio" class="correct_answer" id="radio4_' + current_count + '" name="radio_' + current_count + '" data-option="1"' +
                    '                    data-count="' + current_count + '"  name=' + choose_answer + ' >' +
                    '                         <label for="radio4_' + current_count + '" class="mb-0">' +
                    '                        <div class="avatar-upload">' +
                    '                             <div class="qr-code-view "><input type="file" id="four_' + current_count + '" name="' + option_4 + '" class="multiimageUpload" accept=".png, .jpg, .jpeg"/></div> ' +
                    '                                <label for="four_' + current_count + '" class="image-picker-label mb-0">' +
                    '                                   <div class="avatar-edit avatar-checkbox-image imagePreview " > </div></label>' +
                    '                           </div>' +
                    '                           ' +
                    '                      </div>' +
                    '               </div>' +
                    '               </div>' +
                    '      </div>\n' +
                    '   </div>\n' +
                    ' <div class="row"><div  class="col-12 col-lg-12"><a  data-id="' + current_count + '" class="btn btn__theme   btn-edit-remove delete_question">Delete</a></div></div> ' +
                    '</div>' +
                    '</div>' +
                    '</div>'
            }
            $('.theme-tabs').append(tab);
            $('#question_content').append(tab_content);
            $('#submit_questions').show();
        })

        // code to select correct answer for single or multiple answers chosen
        let multiple_answers = [];
        let array = [1, 3, 4, 5];
        $('body').on('change', ".correct_answer ", function (e) {
            var is_mutiple = $(this).data('select');
            let answer = "answer_" + $(this).data('count');
            if (is_mutiple == 'multiple') {
                var temp = new Array();
                temp = $('input[name=' + answer + ']').val().split(/[,]+/);
                for (a in temp) {
                    temp[a] = parseInt(temp[a], 10);
                }
                if (!temp.includes($(this).data('option'))) {
                    temp.push($(this).data('option'));
                }
                if ($(this).is(":checked")) {
                    $(this).closest('.row').find('input[name=' + answer + ']').val(temp.join(","));
                } else {
                    var Index = temp.indexOf($(this).data('option'));

                    temp.splice(Index, 1);
                    $(this).closest('.row').find('input[name=' + answer + ']').val(temp.join(","));
                }
            } else {
                $(this).closest('.row').find('input[name=' + answer + ']').val($(this).data('option'));
            }

        })
       // function to validate  dynamically created forms, it checks newle creted elemens , old values have a data attr old='yes'
        function validate_fields() {
            var bool = true;
            $(".validate_input,.answer-field").each(function (index,value) {
                if ($(value).val() == '') {
                    $(value).addClass('required_field');
                    $('#error_blok').removeClass('d-none');
                    $('.alert').show();
                    bool = false;

                }
                else {
                        $(value).removeClass('required_field');
                }
            })
             $('.multiimageUpload').each(function (index,value) {
                if($(this).attr('data-old')=='yes'){

                }
                else{
                    if ($(value).get(0).files.length === 0) {
                        console.log('no file found')
                        $(value).closest('.choose-answer-images').addClass('required_field');
                        $('#error_blok').removeClass('d-none');
                        $('.alert').show();
                        bool = false;
                    }
                    else {
                        $(value).closest('.choose-answer-images').removeClass('required_field');
                    }
                }
            })
            return bool;
        }
        //validate form and submit dynamic questions
        $('#submit_questions').on('click', function (e) {
            e.preventDefault();
            if (validate_fields()) {
                $('form').submit();
            }
        })


        // code to add new surgical questions
        var options_count= [];
        $('#add_surgical_question').on('click', function (e) {
            e.preventDefault();
            var current_count = $(this).data('count') + 1;
            var current_class = current_count == 1 ? "current" : "";
            $(this).data('count', current_count);
            count_array.push(current_count);
            $('input:hidden[name=ids]').val(count_array.join(","));
            var tab = '<li class="theme-tab-item ' + current_class + ' class_' + current_count + '"  data-tab="tab-' + current_count + '">' + current_count + '</li>';
            var tab_content = '';
            var question = 'question_' + current_count;
            var option_1 = 'thumbnail_' + current_count;
            var option_2 = 'option_2' + current_count;
            var option_3 = 'option_3' + current_count;
            var option_4 = 'option_4' + current_count;
            var answer = 'answer_' + current_count;

            var choose_answer = 'choose_answer_' + current_count;
            tab_content = '<div id="tab-' + current_count + '"  class="theme-tab-content ' + current_class + '  class_' + current_count + '" >' +
                '   <div  class="container-fluid">\n' +
                '     <div  class="row">\n' +
                '      <div  class="col-12 col-lg-6">\n' +
                '         <div  class="section-header section-title-head section-lessons-md px-0">\n' +
                '            <div class="section-header__title">\n' +
                '               <h4 class="h4">  Question   Details </h4>\n' +
                '            </div>\n' +
                '         </div>\n' +
                '         <div  class="input-fields-container">\n' +
                '            <div class="form-group form-input-container">\n' +
                '               <input type="hidden"  name=' + answer + ' value="1">' +
                '               <textarea class="form-control   input__theme textarea__theme"  name="' + question + '" id="" rows="3" placeholder="Question"></textarea>\n' +
                '            </div>\n' +
                '            <input type="hidden" name="question_type_' + current_count + '" value="1" >\n' +
                '         </div>\n' +
                '            <input type="hidden" name="question_type_' + current_count + '" value="1" >\n' +
                '         </div>\n' +
                '      <div  class="col-12 col-lg-6">\n' +
                '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
                '               <h4 class="h4">  Hint/ Explanation</h4>\n' +
                '       </div>\n' +
                '         <div  class="input-fields-container">\n' +
                '            <div  class="form-group form-input-container">\n' +
                '               <textarea class="form-control   input__theme textarea__theme"  name="hint_' + current_count + '" id="" rows="3" placeholder="Hint"></textarea>\n' +
                '            </div>\n' +
                '                   </div>'+
                '   </div><br/><br/>\n <div id="append_options_'+current_count+'"></div>' +
                '<div  class="col-12 col-lg-4">' +
                '<div class="input-fields-container">' +
                '<input type="hidden" name="options_count" id="options_count_' + current_count + '"> <div class="form-group form-input-container">' +
                    '<select  class="form-control" id="option_select_' + current_count + '" ><option value="1">Option With images</option><option value="2">Option Without images</option></select></div></div></div>' +
                    '<div  class="col-12 col-lg-3"><a   data-id="' + current_count + '" class="btn btn__theme    btn-edit-remove add_option" data-count="0"  id="add_option_' + current_count + '">Add Question Option</a></div>' +
                '</div></div><br/>' +
                ' <div class="row"><div  class="col-12 col-lg-12"><a  data-route="' + config.routes.deleteProtocolQuestion + '"  data-id="' + current_count + '" class="btn btn__theme    btn-edit-remove delete_question">Delete</a></div></div> ' +
                '</div>' +

                '</div>'
            $('.theme-tabs').append(tab);
            $('#question_content').append(tab_content);
        })

    })
    function format_question_option_html(eixsting_option,div_id,col_class,is_image_selected){
        var html="<div id='"+div_id+"'><div class='container-fluid'><div class='row'>";
        html+='<div class="col-12 '+col_class+'">\n' +
            '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
            '               <h4 class="h4">  Hint</h4>\n' +
            '       </div>\n' +
            '         <div class="input-fields-container">\n' +
            '            <div class="form-group form-input-container">\n' +
            '               <textarea class="form-control   input__theme textarea__theme" name="'+eixsting_option+'hint_'+div_id+'" id="" rows="3" placeholder="Hint"></textarea>\n' +
            '            </div>\n' +
            '                   </div>   </div>';
        html+='<div class="col-12 '+col_class+'">\n' +
            '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
            '               <h4 class="h4">  Hint Color</h4>\n' +
            '       </div>\n' +
            '         <div class="input-fields-container">\n' +
            '            <div class="form-group form-input-container">\n' +
            '              <input type="color" name="'+eixsting_option+'hint_color_'+div_id+'"  value="#000000" class="form-control" />\n' +
            '            </div>\n' +
            '                   </div>   </div>';
        html+='<div class="col-12 '+col_class+'">\n' +
            '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
            '               <h4 class="h4">  Text</h4>\n' +
            '       </div>\n' +
            '         <div class="input-fields-container">\n' +
            '            <div class="form-group form-input-container">\n' +
            '               <textarea class="form-control   input__theme textarea__theme" name="'+eixsting_option+'text_'+div_id+'" id="" rows="3" placeholder="Text"></textarea>\n' +
            '            </div>\n' +
            '                   </div>   </div>';
        html+='<div class="col-12 '+col_class+'">\n' +
            '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
            '               <h4 class="h4">  Heading</h4>\n' +
            '       </div>\n' +
            '         <div class="input-fields-container">\n' +
            '            <div class="form-group form-input-container">\n' +
            '               <textarea class="form-control   input__theme textarea__theme" name="'+eixsting_option+'heading_'+div_id+'" id="" rows="3" placeholder="Heading"></textarea>\n' +
            '            </div>\n' +
            '                   </div>   </div>';
        if(is_image_selected==1){
            html+='<div class="col-12 '+col_class+'">\n' +
                '       <div class="section-header section-title-head section-lessons-md px-0">\n' +
                '               <h4 class="h4">  Images</h4>\n' +
                '       </div>\n' +
                '         <div class="input-fields-container">\n' +
                '            <div class="form-group form-input-container">\n' +
                '           <input type="file" name="'+eixsting_option+'images_'+div_id+'[]"  multiple > \n'+
                '            </div>\n' +
                '                   </div>   </div></div>';
        }
        var data_existing= eixsting_option =='' ?0:1
        html+='<div class="container-fluid"><div class="col-12"><a class="btn btn-danger  pull-right delete_question_option"  data-existing="'+data_existing+'" id="'+div_id+'">Delete</a></div></div>\n';
        return html;
    }
    $(document).on('click', ".add_option ", function (e) {
        var id=$(this).data('id');
        var current_count = $(this).data('count') + 1;
        var div_id= id+"_"+current_count;
        $(this).data('count', current_count);
        options_array.push(div_id);
        $("#options_count_"+id).val(options_array.join(","));
        var col_class=$("#option_select_"+id).val()==1 ? 'col-lg-2' :'col-lg-3';
        var html=format_question_option_html('',div_id,col_class,$("#option_select_"+id).val());
        $("#append_options_"+id).append(html);
    })
    var  existing_options_array=[];
    $(document).on('click', ".add_existing_option", function (e) {
        var id=$(this).data('id');
        var current_count = $(this).data('count') + 1;
        var div_id= id+"_"+current_count;
        $(this).data('count', current_count);
        existing_options_array.push(div_id);
        $("#existing_options_count_"+id).val(existing_options_array.join(","));
        var col_class=$("#option_select_"+id).val()==1 ? 'col-lg-2' :'col-lg-3';
        var html=format_question_option_html('existing_',div_id,col_class,$("#option_select_"+id).val());
        $("#append_options_"+id).append(html);
        console.log(existing_options_array);
    })
    // code to delete the question and update the indexes for current count for no of questions and next elements to be appended
    $(document).on('click', ".delete_question ", function (e) {

        e.preventDefault();
        if ($(this).data('delete') == 'yes') {
            var url = $(this).data('to');
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
                url: url,
                type: "POST",
                cache: false,
                data: { question_id: $(this).data('id') },
                success: function (response) {
                    $('#msg-holder').html('<div class="alert alert-danger" role="alert"> Question has been deleted  successfully</div>').fadeOut(5000);
                }
            })
        }

        let id = $(this).data('id');
        $('.class_' + id).remove();
        var Index = count_array.indexOf(id);
        count_array.splice(Index, 1);
        if (count_array.length == 0) {
             $('#add_question').data('count', 1);
             $('#submit_questions').hide();
        }
        $('input:hidden[name=ids]').val(count_array.join(","));
        var tabs_counter = 1;
        $('.theme-tab-item').each(function (i, item) {
            $(this).removeClass('current');
            $(this).html(tabs_counter);
            tabs_counter = tabs_counter + 1
        });
        $(".theme-tab-item:last,.theme-tab-content:last").addClass('current');
        var data_count = $('#add_question').data('count') - 1;
        $('#add_question').data('count', data_count);

    })
    $(document).on('click', ".delete_question_option ", function (e){
        var existing = $(this).data('existing') ==1 ? 'existing_' :'';
        var arr=existing!='' ? existing_options_array:options_array;
        let id = $(this).attr('id');
        $('#' + id).remove();
        var Index = arr.indexOf(id);
        arr.splice(Index,1);
        console.log(arr);
         $("#"+existing+''+"options_count_"+id).val(existing+''+options_array.join(","));
    })

    $(document).on('click', '.theme-tab-item', function () {
        var tab_id = $(this).attr('data-tab');
        $('ul.theme-tabs li').removeClass('current');
        $('.theme-tab-content').removeClass('current').fadeOut();
        $(this).addClass('current');
        $("#" + tab_id).addClass('current').fadeIn();
    });
    // menu
    $('.menu-icon').click(function () {
        $('.sidebar').toggleClass('sidebar-open'),
            $(this).toggleClass("is-active");
    })
    $('ul.theme-tabs li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.theme-tabs li').removeClass('current');
        $('.theme-tab-content').removeClass('current').fadeOut();

        $(this).addClass('current');
        $("#" + tab_id).addClass('current').fadeIn();
    });

    $('.input-images').imageUploader();
    $('#add_lesson').click(function () {
        $('#add_new_lesson').removeClass('d-none');
    })
    var count_array=[];
    var click_count=0;
    $('#add_education').on('click',function (e) {
        e.preventDefault();
        click_count=click_count+1;
        var current_count=$(this).data('count')+1;
        $(this). data('count', current_count);
        count_array.push(current_count);
        $('input:hidden[name=ids]').val(count_array.join(","));
        var html='' +
            '<div id="'+current_count+'">' +
            '                    <div class="col-sm-6 col-lg-6 col-xs-12  float-left">\n' +
            '                        <div class="form-group form-input-container">\n' +
            '                            <label> <h4 class="h4"> Education</h4></label>\n' +
            '                            <input required  class="form-control input__theme education_field "  name="details_'+current_count+'"placeholder="">\n' +
            '                        </div>\n' +
            '                    </div>\n' +'  ' +
            '                  <div class="col-sm-6 col-lg-6 col-xs-12 float-left">\n' +
            '                        <div class="form-group form-input-container">\n' +
            '                            <label> <h4 class="h4"> Year</h4></label>\n' +
            '                            <input required  class="form-control input__theme address_field date_picker" type="text"  name="year_'+current_count+'"placeholder="">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '               <div class="col-sm-12"><a class="btn btn-danger delete_education_row pull-right" data-id="'+current_count+'"> Delete </a></div> <br/>' +
            '                                </div>\n' +

            '                            </div>\n' +

            '                        </div>\n' +
            '                    </div>\n' +
            '                </div></div>';
        $('#education_div').append(html);
    })

    $('body').on('click',".delete_education_row", function(){
        var id=$(this).data('id');
        if($(this).hasClass('existing_record')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:config.routes.deleteEducation,
                data:{id:$(this).data('id')},
                success:function(data){
                    console.log(data);
                }
            });
        }
        else{
            var Index = count_array.indexOf(id);
            count_array.splice(Index, 1);
            $('input:hidden[name=ids]').val(count_array.join(","));
        }
        $('div#'+id).remove();
    })

    $('#checkboxes_container .theme-tab-item').on('click', function () {
        $('input[type=checkbox]').prop('checked', false);
        $('.section-header__controls').addClass('d-none');
    })
    $('.table input[type=checkbox]').on('change', function () {
        if ($(this).is(":checked")) {
            $('.section-header__controls').removeClass('d-none');
        } else {
            console.log('unchecked');
            let bool = false;
            $('input:checkbox').each(function () {
                if ($(this).is(':checked')) {
                    bool = true;
                }
            })
            if (bool == false) {
                $('.section-header__controls').addClass('d-none');
            }
        }
    })


    $('#country').on('change',function () {
        $('#states,#cities')
            .find('option')
            .remove();
        var url = config.routes.getStates;
        var c_id= $(this).val();
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            url: url,
            type: "POST",
            cache: false,
            data: {country_id:c_id},
            success: function(response){
                var states=$('#states');
                $('#states')
                    .append($("<option></option>")
                        .attr("value", '')
                        .text('Please select state '));
                $.each(response.states, function() {

                    var key= this.name;
                    var value= this.id;
                    $('#states')
                        .append($("<option></option>")
                            .attr("value", value)
                            .text(key));
                });
            }
        });
    })

    $('#states').on('change',function () {
        $('#cities')
            .find('option')
            .remove();
        var url = config.routes.getCities;
        var c_id= $(this).val();
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            url: url,
            type: "POST",
            cache: false,
            data: {state_id:c_id},
            success: function(response){
                var states=$('#states');
                $.each(response.cities, function() {
                    var key= this.name;
                    var value= this.id;
                    $('#cities')
                        .append($("<option></option>")
                            .attr("value", value)
                            .text(key));
                });
            }
        });
    })

    $('#bulk_apply').on('click', function () {
        let array = [];
        $('input:checkbox:checked').each(function () {
            array.push($(this).val());
        });
        let action = $('#bulk_acton').val();
        let url = $(this).data('to');
        if ($('.bulk_check').is(":checked")) {
            array.shift();
        }
        let data = JSON.stringify(array);
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            url: url,
            type: "POST",
            cache: false,
            data: { action: action, data: data },
            success: function (response) {
                console.log(response);
                if (response.success) {
                    location.reload();
                }
            }
        })
    })
    $('.bulk_check').on('change', function () {
        let check = $(this);
        let table = $('#table-' + $(this).data('id'));
        console.log(table);
        $('td input:checkbox', table).prop('checked', this.checked);
        if ($(check).is(":checked")) {
            $('.section-header__controls').removeClass('d-none');
        } else {
            $('.section-header__controls').addClass('d-none');
        }
    })
    // search input
    // if ($('#search-input').val().length > 0) {
    //     $('.search-input').addClass('focused');
    // } else {
    //     $('.search-input').removeClass('focused');
    // }


    $('#search-input').on('input', function (e) {
        if ($(this).val().length > 0) {
            $('.search-input').addClass('focused');
        } else {
            $('.search-input').removeClass('focused');
        }
        e.preventDefault();
    });




    // $('.text-editor').richText();

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
        if ($('#imagePreview').css('background-image') !== undefined) {
            $('.placeholder-view').css('opacity', '0');
            console.log("dasdasas")
        }
    });

    $("#imageUpload1").change(function () {
        readURL(this);
        if ($('#imagePreview1').css('background-image') !== undefined) {

            $('#imagePreview1 .placeholder-view').css('opacity', '0');
            console.log("dasdasas")
        }
    });

    // if ($('#imagePreview').css('background-image') !== undefined) {
    //     $('.placeholder-view').css('opacity', '0');
    //     console.log("dasdasas")
    // } else {
    //     $('.placeholder-view').css('opacity', '1');
    // }


    // // date picker ////


    $('#start_time').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 30,
        minTime: '8',
        startTime: '08:00 AM',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    var later = '';
    $('#start_time').timepicker('option', 'change', function (time) {
        $('#endtime').val('');
        var startHour = parseInt($('#start_time').val().substring(0, 2));
        var startMinutes = $('#start_time').val().substring(2, 8);
        var endMinTime = (startHour + 0.5).toString().concat(startMinutes);
        $('#end_time').timepicker('option', 'minTime', endMinTime);

    });
    $('#end_time').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 30,
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });

    // datepicker
    var months = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    var uDatepicker = $.datepicker._updateDatepicker;
    $.datepicker._updateDatepicker = function () {
        var ret = uDatepicker.apply(this, arguments);
        var $sel = this.dpDiv.find('select');
        $sel.find('option').each(function (i) {
            $(this).text(months[i]);
        });
        return ret;
    };
    $(function () {
        $('#course_type').on('change', function () {
            if ($(this).val() == 2) {
                $('div#location').removeClass('d-none');
            } else {
                $('div#location').addClass('d-none');
            }
        })
        var dateToday = new Date();
        jQuery("#from").datepicker({
            dateFormat: 'yy/mm/dd',
            showButtonPanel: true,
            minDate: 0,
            onSelect: function (selected) {
                $('#to').val('');
                var dt = new Date(selected);
                dt.setDate(dt.getDate() + 1);
                $("#to").datepicker("option", "minDate", dt);
            }
        });
        jQuery("#to").datepicker({
            minDate: 0,
            dateFormat: 'yy/mm/dd',
            onSelect: function (selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() - 1);
                $("#txtFrom").datepicker("option", "maxDate", dt);
            }
        });
        $("#datepicker").datepicker({
            changeMonth: true,
            dateFormat: 'yy-m-d',
            minDate: 0
        });
    });
});
$(function () {
    var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;
        var links = this.el.find('.link');
        links.on('click', { el: this.el, multiple: this.multiple }, this.dropdown)
    }
    Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();
        $next.slideToggle();
        $this.parent().toggleClass('open, admin-sidemenu-active');
        // for arrow
        $(this).find('.dropdown__arrow').toggleClass('up__arrow');
        if (
            $(this).find('.dropdown__arrow').hasClass('up__arrow')
        ) {
            $('.dropdown__arrow').removeClass('up__arrow');
            $(this).find('.dropdown__arrow').toggleClass('up__arrow');
        }
        //for arrow end
        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open, admin-sidemenu-active');
        };
    }
    var accordion = new Accordion($('#accordion'), false);
    $('body').on('click', '#qr_generator', function () {
        $(this).hide();
        let ibsCode = document.getElementById("QR_Input").value; //grab the value of the textbox input
        let display = document.getElementById("imagePreview"); // grab the output div
        if (ibsCode !== "") {
            let qrcode = new QRCode("imagePreview", {
                text: ibsCode,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        }
        setTimeout(function () {
            document.getElementById('qr_value').value = document.getElementById('generated_qr').src;
        }, 2000);

        var allImages = document.getElementsByTagName('img');
        for (var i = 0; i < allImages.length; i++) {
            console.log(allImages[i].src);
        }

        $('#imagePreview img').each(function () {

            localStorage.setItem('qrcode', document.getElementById('generated_qr'));
        });


        img = $(this).next('img');

        if (img.length > 0) {
            alert(img.attr('src'));
        }
    })
    $('body').on('focus',".date_picker", function(){
        $(this).datepicker();
    });
    
    $('li.admin-dashboard-active a').trigger('click');

});
