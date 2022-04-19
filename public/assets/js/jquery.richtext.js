/*
 RichText: WYSIWYG editor developed as jQuery plugin

 @name RichText
 @author https://github.com/webfashionist - Bob Schockweiler - richtext@webfashion.eu
 @license GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 @preserve

 Copyright (C) 2020 Bob Schockweiler ( richtext@webfashion.eu )

 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as published
 by the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU Affero General Public License for more details.

 You should have received a copy of the GNU Affero General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

(function($) {

    $.fn.richText = function(options) {

        // set default options
        // and merge them with the parameter options
        var settings = $.extend({

            // text formatting
            bold: true,
            italic: true,
            underline: true,

            // text alignment
            leftAlign: true,
            centerAlign: true,
            rightAlign: true,
            justify: true,

            // lists
            ol: true,
            ul: true,

            // title
            heading: true,

            // fonts
            fonts: true,
            fontList: ["Arial",
                "Arial Black",
                "Comic Sans MS",
                "Courier New",
                "Geneva",
                "Georgia",
                "Helvetica",
                "Impact",
                "Lucida Console",
                "Tahoma",
                "Times New Roman",
                "Verdana"
            ],
            fontColor: true,
            fontSize: true,

            // uploads
            imageUpload: true,
            fileUpload: true,

            // media
            videoEmbed: true,

            // link
            urls: true,

            // tables
            table: true,

            // code
            removeStyles: true,
            code: true,

            // colors
            colors: [],

            // dropdowns
            fileHTML: '',
            imageHTML: '',

            // translations
            translations: {
                'title': 'Title',
                'white': 'White',
                'black': 'Black',
                'brown': 'Brown',
                'beige': 'Beige',
                'darkBlue': 'Dark Blue',
                'blue': 'Blue',
                'lightBlue': 'Light Blue',
                'darkRed': 'Dark Red',
                'red': 'Red',
                'darkGreen': 'Dark Green',
                'green': 'Green',
                'purple': 'Purple',
                'darkTurquois': 'Dark Turquois',
                'turquois': 'Turquois',
                'darkOrange': 'Dark Orange',
                'orange': 'Orange',
                'yellow': 'Yellow',
                'imageURL': 'Image URL',
                'fileURL': 'File URL',
                'linkText': 'Link text',
                'url': 'URL',
                'size': 'Size',
                'responsive': 'Responsive',
                'text': 'Text',
                'openIn': 'Open in',
                'sameTab': 'Same tab',
                'newTab': 'New tab',
                'align': 'Align',
                'left': 'Left',
                'justify': 'Justify',
                'center': 'Center',
                'right': 'Right',
                'rows': 'Rows',
                'columns': 'Columns',
                'add': 'Add',
                'pleaseEnterURL': 'Please enter an URL',
                'videoURLnotSupported': 'Video URL not supported',
                'pleaseSelectImage': 'Please select an image',
                'pleaseSelectFile': 'Please select a file',
                'bold': 'Bold',
                'italic': 'Italic',
                'underline': 'Underline',
                'alignLeft': 'Align left',
                'alignCenter': 'Align centered',
                'alignRight': 'Align right',
                'addOrderedList': 'Add ordered list',
                'addUnorderedList': 'Add unordered list',
                'addHeading': 'Add Heading/title',
                'addFont': 'Add font',
                'addFontColor': 'Add font color',
                'addFontSize': 'Add font size',
                'addImage': 'Add image',
                'addVideo': 'Add video',
                'addFile': 'Add file',
                'addURL': 'Add URL',
                'addTable': 'Add table',
                'removeStyles': 'Remove styles',
                'code': 'Show HTML code',
                'undo': 'Undo',
                'redo': 'Redo',
                'close': 'Close'
            },

            // privacy
            youtubeCookies: false,

            // dev settings
            useSingleQuotes: false,
            height: 0,
            heightPercentage: 0,
            id: "",
            class: "",
            useParagraph: false,
            maxlength: 0,
            callback: undefined

        }, options);


        /* prepare toolbar */
        var $inputElement = $(this);
        $inputElement.addClass("richText-initial");
        var $editor,
            $toolbarList = $('<ul />'),
            $toolbarElement = $('<li />'),

            $btnItalic = $('<a />', {
                class: "richText-btn",
                "data-command": "italic",
                "title": settings.translations.italic,
                html: "<span><svg class='text-editor-svg' class='text-editor-svg' width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'><path class='text-editor-svg-path' d='M4.99955 16.6666H7.66622L10.6384 3.33329H8.33289C7.86066 3.33329 7.49955 2.97218 7.49955 2.49996C7.49955 2.02774 7.86066 1.66663 8.33289 1.66663H14.9996C15.4718 1.66663 15.8329 2.02774 15.8329 2.49996C15.8329 2.97218 15.4718 3.33329 14.9996 3.33329H12.3329L9.36066 16.6666H11.6662C12.1384 16.6666 12.4996 17.0277 12.4996 17.5C12.4996 17.9722 12.1384 18.3333 11.6662 18.3333H4.99955C4.52733 18.3333 4.16622 17.9722 4.16622 17.5C4.16622 17.0277 4.52733 16.6666 4.99955 16.6666Z' fill='#A3A3A3' /></svg></span>"
            }),
            $btnBold = $('<a />', {
                class: "richText-btn",
                "data-command": "bold",
                "title": settings.translations.bold,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M13.6663 9.50002C15.4719 7.61113 15.3608 4.61113 13.4719 2.83335C12.6108 2.00002 11.4441 1.55557 10.2497 1.55557H4.61077C4.08299 1.55557 3.63855 2.00002 3.63855 2.52779C3.63855 3.05557 4.08299 3.50002 4.61077 3.50002H5.52744V16.5556H4.61077C4.08299 16.5556 3.63855 17 3.63855 17.5278C3.63855 18.0556 4.08299 18.5 4.61077 18.5H11.6386C14.2497 18.5 16.3608 16.3611 16.3608 13.7778C16.333 11.9167 15.3052 10.2778 13.6663 9.50002ZM10.2497 3.47224C11.7774 3.47224 13.0274 4.72224 13.0274 6.25002C13.0274 7.77779 11.7774 9.02779 10.2497 9.02779H7.47188V3.47224H10.2497ZM11.6386 16.5278H7.47188V10.9722H11.6386C13.1663 10.9722 14.4163 12.2222 14.4163 13.75C14.4163 15.2778 13.1663 16.5278 11.6386 16.5278Z" fill="#795BF1"/></svg></span>'
            }), // bold
            $btnUnderline = $('<a />', {
                class: "richText-btn",
                "data-command": "underline",
                "title": settings.translations.underline,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M3.38875 3.33329H3.91653V9.47218C3.91653 12.8333 6.63875 15.5555 9.99986 15.5555C13.361 15.5555 16.0832 12.8333 16.0832 9.47218V3.33329H16.611C17.0832 3.33329 17.4443 2.97218 17.4443 2.49996C17.4443 2.02774 17.0832 1.66663 16.611 1.66663H13.8888C13.4165 1.66663 13.0554 2.02774 13.0554 2.49996C13.0554 2.97218 13.4165 3.33329 13.8888 3.33329H14.4165V9.47218C14.4165 11.9166 12.4443 13.8888 9.99986 13.8888C7.55542 13.8888 5.5832 11.9166 5.5832 9.47218V3.33329H6.11098C6.5832 3.33329 6.94431 2.97218 6.94431 2.49996C6.94431 2.02774 6.5832 1.66663 6.11098 1.66663H3.38875C2.91653 1.66663 2.55542 2.02774 2.55542 2.49996C2.55542 2.97218 2.94431 3.33329 3.38875 3.33329Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M16.6667 16.6666H3.33333C2.86111 16.6666 2.5 17.0277 2.5 17.4999C2.5 17.9721 2.86111 18.3332 3.33333 18.3332H16.6667C17.1389 18.3332 17.5 17.9721 17.5 17.4999C17.5 17.0277 17.1389 16.6666 16.6667 16.6666Z" fill="#A3A3A3"/></svg></span>'
            }), // underline


            // left align
            $btnLeftAlign = $('<a />', {
                class: "richText-btn",
                "data-command": "justifyLeft",
                "title": settings.translations.alignLeft,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M17.5004 4.16667H2.50045C2.02823 4.16667 1.66711 3.80555 1.66711 3.33333C1.66711 2.86111 2.02823 2.5 2.50045 2.5H17.5004C17.9727 2.5 18.3338 2.86111 18.3338 3.33333C18.3338 3.80555 17.9727 4.16667 17.5004 4.16667Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M12.5004 8.61106H2.50045C2.02823 8.61106 1.66711 8.24995 1.66711 7.77773C1.66711 7.30551 2.02823 6.9444 2.50045 6.9444H12.5004C12.9727 6.9444 13.3338 7.30551 13.3338 7.77773C13.3338 8.24995 12.9727 8.61106 12.5004 8.61106Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M17.5004 13.0555H2.50045C2.02823 13.0555 1.66711 12.6944 1.66711 12.2221C1.66711 11.7499 2.02823 11.3888 2.50045 11.3888H17.5004C17.9727 11.3888 18.3338 11.7499 18.3338 12.2221C18.3338 12.6944 17.9727 13.0555 17.5004 13.0555Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M12.5004 17.4999H2.50045C2.02823 17.4999 1.66711 17.1388 1.66711 16.6666C1.66711 16.1944 2.02823 15.8333 2.50045 15.8333H12.5004C12.9727 15.8333 13.3338 16.1944 13.3338 16.6666C13.3338 17.1388 12.9727 17.4999 12.5004 17.4999Z" fill="#A3A3A3"/></svg></span > '
            }), // left align
            $btnCenterAlign = $('<a />', {
                class: "richText-btn",
                "data-command": "justifyCenter",
                "title": settings.translations.alignCenter,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M17.5004 4.16667H2.50039C2.02816 4.16667 1.66705 3.80555 1.66705 3.33333C1.66705 2.86111 2.02816 2.5 2.50039 2.5H17.5004C17.9726 2.5 18.3337 2.86111 18.3337 3.33333C18.3337 3.80555 17.9726 4.16667 17.5004 4.16667Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M15.0004 8.61106H5.00039C4.52816 8.61106 4.16705 8.24995 4.16705 7.77773C4.16705 7.30551 4.52816 6.9444 5.00039 6.9444H15.0004C15.4726 6.9444 15.8337 7.30551 15.8337 7.77773C15.8337 8.24995 15.4726 8.61106 15.0004 8.61106Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M17.5004 13.0555H2.50039C2.02816 13.0555 1.66705 12.6944 1.66705 12.2221C1.66705 11.7499 2.02816 11.3888 2.50039 11.3888H17.5004C17.9726 11.3888 18.3337 11.7499 18.3337 12.2221C18.3337 12.6944 17.9726 13.0555 17.5004 13.0555Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M15.0004 17.4999H5.00039C4.52816 17.4999 4.16705 17.1388 4.16705 16.6666C4.16705 16.1944 4.52816 15.8333 5.00039 15.8333H15.0004C15.4726 15.8333 15.8337 16.1944 15.8337 16.6666C15.8337 17.1388 15.4726 17.4999 15.0004 17.4999Z" fill="#A3A3A3"/></svg></span>'
            }), // centered
            $btnRightAlign = $('<a />', {
                class: "richText-btn",
                "data-command": "justifyRight",
                "title": settings.translations.alignRight,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M17.5004 4.16667H2.50039C2.02816 4.16667 1.66705 3.80555 1.66705 3.33333C1.66705 2.86111 2.02816 2.5 2.50039 2.5H17.5004C17.9726 2.5 18.3337 2.86111 18.3337 3.33333C18.3337 3.80555 17.9726 4.16667 17.5004 4.16667Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M17.5004 8.61106H7.50039C7.02816 8.61106 6.66705 8.24995 6.66705 7.77773C6.66705 7.30551 7.02816 6.9444 7.50039 6.9444H17.5004C17.9726 6.9444 18.3337 7.30551 18.3337 7.77773C18.3337 8.24995 17.9726 8.61106 17.5004 8.61106Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M17.5004 13.0555H2.50039C2.02816 13.0555 1.66705 12.6944 1.66705 12.2221C1.66705 11.7499 2.02816 11.3888 2.50039 11.3888H17.5004C17.9726 11.3888 18.3337 11.7499 18.3337 12.2221C18.3337 12.6944 17.9726 13.0555 17.5004 13.0555Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M17.5004 17.4999H7.50039C7.02816 17.4999 6.66705 17.1388 6.66705 16.6666C6.66705 16.1944 7.02816 15.8333 7.50039 15.8333H17.5004C17.9726 15.8333 18.3337 16.1944 18.3337 16.6666C18.3337 17.1388 17.9726 17.4999 17.5004 17.4999Z" fill="#A3A3A3"/></svg></span>'
            }), // right align
            $btnOL = $('<a />', {
                class: "richText-btn",
                "data-command": "insertOrderedList",
                "title": settings.translations.addOrderedList,
                html: '<span class="fa fa-list-ol"></span>'
            }), // ordered list
            $btnUL = $('<a />', {
                class: "richText-btn",
                "data-command": "insertUnorderedList",
                "title": settings.translations.addUnorderedList,
                html: '<span class="fa fa-list"></span>'
            }), // unordered list
            $btnHeading = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addHeading,
                html: '<span class="fa fa-header fa-heading"></span>'
            }), // title/header
            $btnFont = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addFont,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M10.0003 5.83333C10.9208 5.83333 11.667 5.08714 11.667 4.16667C11.667 3.24619 10.9208 2.5 10.0003 2.5C9.07987 2.5 8.33368 3.24619 8.33368 4.16667C8.33368 5.08714 9.07987 5.83333 10.0003 5.83333Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M10.0003 11.6667C10.9208 11.6667 11.667 10.9205 11.667 10C11.667 9.07953 10.9208 8.33334 10.0003 8.33334C9.07987 8.33334 8.33368 9.07953 8.33368 10C8.33368 10.9205 9.07987 11.6667 10.0003 11.6667Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M10.0003 17.5C10.9208 17.5 11.667 16.7538 11.667 15.8333C11.667 14.9128 10.9208 14.1667 10.0003 14.1667C9.07987 14.1667 8.33368 14.9128 8.33368 15.8333C8.33368 16.7538 9.07987 17.5 10.0003 17.5Z" fill="#A3A3A3"/></svg></span>'
            }), // font color
            $btnFontColor = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addFontColor,
                html: '<span class="fa fa-paint-brush"></span>'
            }), // font color
            $btnFontSize = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addFontSize,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M9.97196 15.1666H8.8053V4.83323H12.472V5.77768C12.472 6.2499 12.8331 6.61101 13.3053 6.61101C13.7775 6.61101 14.1386 6.2499 14.1386 5.77768V3.9999C14.1386 3.52768 13.7775 3.16656 13.3053 3.16656H2.63863C2.16641 3.16656 1.8053 3.52768 1.8053 3.9999V5.77768C1.8053 6.2499 2.16641 6.61101 2.63863 6.61101C3.11085 6.61101 3.47196 6.2499 3.47196 5.77768V4.83323H7.13863V15.1388H5.97196C5.49974 15.1388 5.13863 15.4999 5.13863 15.9721C5.13863 16.4443 5.49974 16.8055 5.97196 16.8055H9.97196C10.4442 16.8055 10.8053 16.4443 10.8053 15.9721C10.8053 15.4999 10.4164 15.1666 9.97196 15.1666Z" fill="#A3A3A3"/><path class="text-editor-svg-path" d="M17.3609 7.41666H11.0275C10.5553 7.41666 10.1942 7.77777 10.1942 8.24999V9.38888C10.1942 9.8611 10.5553 10.2222 11.0275 10.2222C11.4998 10.2222 11.8609 9.8611 11.8609 9.38888V9.08332H13.3609V15.1667H12.9164C12.4442 15.1667 12.0831 15.5278 12.0831 16C12.0831 16.4722 12.4442 16.8333 12.9164 16.8333H15.4998C15.972 16.8333 16.3331 16.4722 16.3331 16C16.3331 15.5278 15.972 15.1667 15.4998 15.1667H15.0275V9.08332H16.5276V9.38888C16.5276 9.8611 16.8887 10.2222 17.3609 10.2222C17.8331 10.2222 18.1942 9.8611 18.1942 9.38888V8.24999C18.1942 7.80555 17.8331 7.41666 17.3609 7.41666Z" fill="#A3A3A3"/></svg></span>'
            }), // font color
            $btnImageUpload = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addImage,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M15 18.3333C15.663 18.3333 16.2989 18.0699 16.7678 17.6011C17.2366 17.1322 17.5 16.4963 17.5 15.8333V4.16663C17.5 3.50358 17.2366 2.8677 16.7678 2.39886C16.2989 1.93002 15.663 1.66663 15 1.66663H5C4.33696 1.66663 3.70107 1.93002 3.23223 2.39886C2.76339 2.8677 2.5 3.50358 2.5 4.16663V15.8333C2.5 16.4963 2.76339 17.1322 3.23223 17.6011C3.70107 18.0699 4.33696 18.3333 5 18.3333H15ZM4.16667 4.16663C4.16667 3.94561 4.25446 3.73365 4.41074 3.57737C4.56702 3.42109 4.77899 3.33329 5 3.33329H15C15.221 3.33329 15.433 3.42109 15.5893 3.57737C15.7455 3.73365 15.8333 3.94561 15.8333 4.16663V9.65829L13.925 7.74163C13.8475 7.66352 13.7554 7.60152 13.6538 7.55922C13.5523 7.51691 13.4433 7.49513 13.3333 7.49513C13.2233 7.49513 13.1144 7.51691 13.0129 7.55922C12.9113 7.60152 12.8191 7.66352 12.7417 7.74163L9.16667 11.325L7.25833 9.40829C7.18086 9.33019 7.0887 9.26819 6.98715 9.22588C6.8856 9.18358 6.77668 9.16179 6.66667 9.16179C6.55666 9.16179 6.44774 9.18358 6.34619 9.22588C6.24464 9.26819 6.15247 9.33019 6.075 9.40829L4.16667 11.325V4.16663ZM4.16667 15.8333V13.675L6.66667 11.175L8.575 13.0916C8.65247 13.1697 8.74464 13.2317 8.84619 13.274C8.94774 13.3163 9.05666 13.3381 9.16667 13.3381C9.27668 13.3381 9.3856 13.3163 9.48715 13.274C9.5887 13.2317 9.68086 13.1697 9.75833 13.0916L13.3333 9.50829L15.8333 12.0083V15.8333C15.8333 16.0543 15.7455 16.2663 15.5893 16.4225C15.433 16.5788 15.221 16.6666 15 16.6666H5C4.77899 16.6666 4.56702 16.5788 4.41074 16.4225C4.25446 16.2663 4.16667 16.0543 4.16667 15.8333Z" fill="#A3A3A3"/></svg></span>'
            }), // image
            $btnVideoEmbed = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addVideo,
                html: '<span class="fa fa-video-camera fa-video"></span>'
            }), // video
            $btnFileUpload = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addFile,
                html: '<span class="fa fa-file-text-o far fa-file-alt"></span>'
            }), // file
            $btnURLs = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addURL,
                html: '<span><svg class="text-editor-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M17.3565 8.26421L10.7032 14.9167C9.96865 15.6773 8.96911 16.1255 7.91255 16.1678C6.856 16.2102 5.82378 15.8436 5.03069 15.1442C4.64341 14.7796 4.33333 14.3409 4.11884 13.8541C3.90434 13.3673 3.78981 12.8425 3.78204 12.3106C3.77427 11.7787 3.87341 11.2507 4.07359 10.7579C4.27377 10.2651 4.5709 9.81751 4.94736 9.44171L10.614 3.77505C11.0608 3.34125 11.6603 3.10066 12.283 3.10525C12.9057 3.10984 13.5016 3.35925 13.942 3.79959C14.3823 4.23992 14.6317 4.83583 14.6363 5.45854C14.6409 6.08125 14.4003 6.68076 13.9665 7.12755L8.29986 12.7942C8.15367 12.933 7.95978 13.0104 7.75819 13.0104C7.5566 13.0104 7.36271 12.933 7.21652 12.7942C7.07403 12.6499 6.99412 12.4553 6.99412 12.2525C6.99412 12.0498 7.07403 11.8552 7.21652 11.7109L11.7474 7.18005C11.9038 7.02268 11.9914 6.80961 11.9908 6.58769C11.9901 6.36577 11.9014 6.15319 11.744 5.99671C11.5867 5.84023 11.3736 5.75268 11.1517 5.7533C10.9297 5.75393 10.7172 5.84268 10.5607 6.00005L6.02986 10.5292C5.57405 10.9864 5.3181 11.6057 5.3181 12.2513C5.3181 12.8969 5.57405 13.5162 6.02986 13.9734C6.49368 14.4162 7.11028 14.6632 7.75152 14.6632C8.39277 14.6632 9.00936 14.4162 9.47319 13.9734L15.1399 8.30671C15.5209 7.93303 15.8241 7.48751 16.0319 6.99591C16.2397 6.50431 16.348 5.97639 16.3505 5.44269C16.3529 4.90898 16.2496 4.38008 16.0464 3.88657C15.8431 3.39306 15.5441 2.94474 15.1665 2.56754C14.7889 2.19034 14.3403 1.89175 13.8466 1.68903C13.3529 1.48631 12.8239 1.38349 12.2901 1.38651C11.7564 1.38953 11.2286 1.49834 10.7372 1.70664C10.2459 1.91494 9.80064 2.21859 9.42736 2.60005L3.76069 8.26671C3.22668 8.80046 2.80532 9.43604 2.52163 10.1357C2.23793 10.8354 2.09767 11.585 2.10917 12.3399C2.12068 13.0948 2.28371 13.8398 2.58859 14.5305C2.89347 15.2212 3.334 15.8437 3.88402 16.3609C4.91614 17.3201 6.27673 17.8471 7.68569 17.8334C9.25958 17.8329 10.7688 17.2073 11.8815 16.0942L18.5349 9.44088C18.6144 9.36401 18.6779 9.27205 18.7216 9.17038C18.7653 9.06871 18.7883 8.95936 18.7892 8.84871C18.7902 8.73806 18.7691 8.62833 18.7272 8.52592C18.6853 8.4235 18.6234 8.33046 18.5452 8.25222C18.4669 8.17397 18.3739 8.1121 18.2715 8.07019C18.1691 8.02829 18.0593 8.00721 17.9487 8.00817C17.838 8.00913 17.7287 8.03212 17.627 8.0758C17.5253 8.11947 17.4334 8.18295 17.3565 8.26255V8.26421Z" fill="#A3A3A3"/></svg></span>'
            }), // urls/links
            $btnTable = $('<a />', {
                class: "richText-btn",
                "title": settings.translations.addTable,
                html: '<span class="fa fa-table"></span>'
            }), // table
            $btnRemoveStyles = $('<a />', {
                class: "richText-btn",
                "data-command": "removeFormat",
                "title": settings.translations.removeStyles,
                html: '<span class="fa fa-recycle"></span>'
            }), // clean up styles
            $btnCode = $('<a />', {
                class: "richText-btn",
                "data-command": "toggleCode",
                "title": settings.translations.code,
                html: '<span class="fa fa-code"></span>'
            }); // code
        $btnJustify = $('<a />', {
            class: "richText-btn",
            "data-command": "justifyFull",
            "title": settings.translations.justify,
            html: '<span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0007 5.83333C10.9211 5.83333 11.6673 5.08714 11.6673 4.16667C11.6673 3.24619 10.9211 2.5 10.0007 2.5C9.08018 2.5 8.33398 3.24619 8.33398 4.16667C8.33398 5.08714 9.08018 5.83333 10.0007 5.83333Z" fill="#A3A3A3"/><path d="M10.0007 11.6666C10.9211 11.6666 11.6673 10.9205 11.6673 9.99998C11.6673 9.0795 10.9211 8.33331 10.0007 8.33331C9.08018 8.33331 8.33398 9.0795 8.33398 9.99998C8.33398 10.9205 9.08018 11.6666 10.0007 11.6666Z" fill="#A3A3A3"/><path d="M10.0007 17.5C10.9211 17.5 11.6673 16.7538 11.6673 15.8333C11.6673 14.9128 10.9211 14.1666 10.0007 14.1666C9.08018 14.1666 8.33398 14.9128 8.33398 15.8333C8.33398 16.7538 9.08018 17.5 10.0007 17.5Z" fill="#A3A3A3"/></svg></span>'
        });


        /* prepare toolbar dropdowns */
        var $dropdownOuter = $('<div />', { class: "richText-dropdown-outer" });
        var $dropdownClose = $('<span />', {
            class: "richText-dropdown-close",
            html: '<span title="' + settings.translations.close + '"><span></span><svg class="text-editor-svg" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="text-editor-svg-path" d="M5.36218 24.6375C5.47838 24.7546 5.61663 24.8476 5.76896 24.9111C5.92128 24.9745 6.08466 25.0072 6.24968 25.0072C6.41469 25.0072 6.57808 24.9745 6.7304 24.9111C6.88272 24.8476 7.02098 24.7546 7.13718 24.6375L14.9997 16.7625L22.8622 24.6375C22.9784 24.7546 23.1166 24.8476 23.269 24.9111C23.4213 24.9745 23.5847 25.0072 23.7497 25.0072C23.9147 25.0072 24.0781 24.9745 24.2304 24.9111C24.3827 24.8476 24.521 24.7546 24.6372 24.6375C24.7543 24.5212 24.8473 24.383 24.9108 24.2307C24.9743 24.0784 25.0069 23.915 25.0069 23.75C25.0069 23.5849 24.9743 23.4216 24.9108 23.2692C24.8473 23.1169 24.7543 22.9787 24.6372 22.8625L16.7622 15L24.6372 7.13746C24.8726 6.90208 25.0048 6.58283 25.0048 6.24996C25.0048 5.91708 24.8726 5.59784 24.6372 5.36246C24.4018 5.12708 24.0826 4.99484 23.7497 4.99484C23.4168 4.99484 23.0976 5.12708 22.8622 5.36246L14.9997 13.2375L7.13718 5.36246C6.9018 5.12708 6.58256 4.99484 6.24968 4.99484C5.9168 4.99484 5.59756 5.12708 5.36218 5.36246C5.1268 5.59784 4.99457 5.91708 4.99457 6.24996C4.99457 6.58283 5.1268 6.90208 5.36218 7.13746L13.2372 15L5.36218 22.8625C5.24502 22.9787 5.15203 23.1169 5.08857 23.2692C5.0251 23.4216 4.99243 23.5849 4.99243 23.75C4.99243 23.915 5.0251 24.0784 5.08857 24.2307C5.15203 24.383 5.24502 24.5212 5.36218 24.6375Z" fill="#A3A3A3"/></svg></span>'
        });
        var $dropdownList = $('<ul />', { class: "richText-dropdown" }), // dropdown lists
            $dropdownBox = $('<div />', { class: "richText-dropdown" }), // dropdown boxes / custom dropdowns
            $form = $('<div />', { class: "richText-form" }), // symbolic form
            $formItem = $('<div />', { class: 'richText-form-item' }), // form item
            $formLabel = $('<label />'), // form label
            $formInput = $('<input />', { type: "text" }), //form input field
            $formInputFile = $('<input />', { type: "file" }), // form file input field
            $formInputSelect = $('<select />'),
            $formButton = $('<button />', { text: settings.translations.add, class: "btn" }); // button

        /* internal settings */
        var savedSelection; // caret position/selection
        var editorID = "richText-" + Math.random().toString(36).substring(7);
        var ignoreSave = false,
            $resizeImage = null;

        /* prepare editor history */
        var history = [];
        history[editorID] = [];
        var historyPosition = [];
        historyPosition[editorID] = 0;

        /* list dropdown for titles */
        var $titles = $dropdownList.clone();
        $titles.append($('<li />', { html: '<a data-command="formatBlock" data-option="h1">' + settings.translations.title + ' #1</a>' }));
        $titles.append($('<li />', { html: '<a data-command="formatBlock" data-option="h2">' + settings.translations.title + ' #2</a>' }));
        $titles.append($('<li />', { html: '<a data-command="formatBlock" data-option="h3">' + settings.translations.title + ' #3</a>' }));
        $titles.append($('<li />', { html: '<a data-command="formatBlock" data-option="h4">' + settings.translations.title + ' #4</a>' }));
        $btnHeading.append($dropdownOuter.clone().append($titles.prepend($dropdownClose.clone())));

        /* list dropdown for fonts */
        var fonts = settings.fontList;
        var $fonts = $dropdownList.clone();
        for (var i = 0; i < fonts.length; i++) {
            $fonts.append($('<li />', { html: '<a style="font-family:' + fonts[i] + ';" data-command="fontName" data-option="' + fonts[i] + '">' + fonts[i] + '</a>' }));
        }
        $btnFont.append($dropdownOuter.clone().append($fonts.prepend($dropdownClose.clone())));

        /* list dropdown for font sizes */
        var fontSizes = [24, 18, 16, 14, 12];
        var $fontSizes = $dropdownList.clone();
        for (var i = 0; i < fontSizes.length; i++) {
            $fontSizes.append($('<li />', { html: '<a style="font-size:' + fontSizes[i] + 'px;" data-command="fontSize" data-option="' + fontSizes[i] + '">' + settings.translations.text + ' ' + fontSizes[i] + 'px</a>' }));
        }
        $btnFontSize.append($dropdownOuter.clone().append($fontSizes.prepend($dropdownClose.clone())));

        /* font colors */
        var $fontColors = $dropdownList.clone();
        $fontColors.html(loadColors("forecolor"));
        $btnFontColor.append($dropdownOuter.clone().append($fontColors.prepend($dropdownClose.clone())));


        /* background colors */
        //var $bgColors = $dropdownList.clone();
        //$bgColors.html(loadColors("hiliteColor"));
        //$btnBGColor.append($dropdownOuter.clone().append($bgColors));

        /* box dropdown for links */
        var $linksDropdown = $dropdownBox.clone();
        var $linksForm = $form.clone().attr("id", "richText-URL").attr("data-editor", editorID);
        $linksForm.append(
            $formItem.clone()
            .append($formLabel.clone().text(settings.translations.url).attr("for", "url"))
            .append($formInput.clone().attr("id", "url"))
        );
        $linksForm.append(
            $formItem.clone()
            .append($formLabel.clone().text(settings.translations.text).attr("for", "urlText"))
            .append($formInput.clone().attr("id", "urlText"))
        );
        $linksForm.append(
            $formItem.clone()
            .append($formLabel.clone().text(settings.translations.openIn).attr("for", "openIn"))
            .append(
                $formInputSelect
                .clone().attr("id", "openIn")
                .append($("<option />", { value: '_self', text: settings.translations.sameTab }))
                .append($("<option />", { value: '_blank', text: settings.translations.newTab }))
            )
        );
        $linksForm.append($formItem.clone().append($formButton.clone()));
        $linksDropdown.append($linksForm);
        $btnURLs.append($dropdownOuter.clone().append($linksDropdown.prepend($dropdownClose.clone())));

        /* box dropdown for video embedding */
        var $videoDropdown = $dropdownBox.clone();
        var $videoForm = $form.clone().attr("id", "richText-Video").attr("data-editor", editorID);
        $videoForm.append(
            $formItem.clone()
            .append($formLabel.clone().text(settings.translations.url).attr("for", "videoURL"))
            .append($formInput.clone().attr("id", "videoURL"))
        );
        $videoForm.append(
            $formItem.clone()
            .append($formLabel.clone().text(settings.translations.size).attr("for", "size"))
            .append(
                $formInputSelect
                .clone().attr("id", "size")
                .append($("<option />", { value: 'responsive', text: settings.translations.responsive }))
                .append($("<option />", { value: '640x360', text: '640x360' }))
                .append($("<option />", { value: '560x315', text: '560x315' }))
                .append($("<option />", { value: '480x270', text: '480x270' }))
                .append($("<option />", { value: '320x180', text: '320x180' }))
            )
        );
        $videoForm.append($formItem.clone().append($formButton.clone()));
        $videoDropdown.append($videoForm);
        $btnVideoEmbed.append($dropdownOuter.clone().append($videoDropdown.prepend($dropdownClose.clone())));

        /* box dropdown for image upload/image selection */
        var $imageDropdown = $dropdownBox.clone();
        var $imageForm = $form.clone().attr("id", "richText-Image").attr("data-editor", editorID);

        if (settings.imageHTML &&
            ($(settings.imageHTML).find('#imageURL').length > 0 || $(settings.imageHTML).attr("id") === "imageURL")) {
            // custom image form
            $imageForm.html(settings.imageHTML);
        } else {
            // default image form
            $imageForm.append(
                $formItem.clone()
                .append($formLabel.clone().text(settings.translations.imageURL).attr("for", "imageURL"))
                .append($formInput.clone().attr("id", "imageURL"))
            );
            $imageForm.append(
                $formItem.clone()
                .append($formLabel.clone().text(settings.translations.align).attr("for", "align"))
                .append(
                    $formInputSelect
                    .clone().attr("id", "align")
                    .append($("<option />", { value: 'left', text: settings.translations.left }))
                    .append($("<option />", { value: 'center', text: settings.translations.center }))
                    .append($("<option />", { value: 'right', text: settings.translations.right }))
                )
            );
        }
        $imageForm.append($formItem.clone().append($formButton.clone()));
        $imageDropdown.append($imageForm);
        $btnImageUpload.append($dropdownOuter.clone().append($imageDropdown.prepend($dropdownClose.clone())));

        /* box dropdown for file upload/file selection */
        var $fileDropdown = $dropdownBox.clone();
        var $fileForm = $form.clone().attr("id", "richText-File").attr("data-editor", editorID);

        if (settings.fileHTML &&
            ($(settings.fileHTML).find('#fileURL').length > 0 || $(settings.fileHTML).attr("id") === "fileURL")) {
            // custom file form
            $fileForm.html(settings.fileHTML);
        } else {
            // default file form
            $fileForm.append(
                $formItem.clone()
                .append($formLabel.clone().text(settings.translations.fileURL).attr("for", "fileURL"))
                .append($formInput.clone().attr("id", "fileURL"))
            );
            $fileForm.append(
                $formItem.clone()
                .append($formLabel.clone().text(settings.translations.linkText).attr("for", "fileText"))
                .append($formInput.clone().attr("id", "fileText"))
            );
        }
        $fileForm.append($formItem.clone().append($formButton.clone()));
        $fileDropdown.append($fileForm);
        $btnFileUpload.append($dropdownOuter.clone().append($fileDropdown.prepend($dropdownClose.clone())));

        /* box dropdown for tables */
        var $tableDropdown = $dropdownBox.clone();
        var $tableForm = $form.clone().attr("id", "richText-Table").attr("data-editor", editorID);
        $tableForm.append(
            $formItem.clone()
            .append($formLabel.clone().text(settings.translations.rows).attr("for", "tableRows"))
            .append($formInput.clone().attr("id", "tableRows").attr("type", "number"))
        );
        $tableForm.append(
            $formItem.clone()
            .append($formLabel.clone().text(settings.translations.columns).attr("for", "tableColumns"))
            .append($formInput.clone().attr("id", "tableColumns").attr("type", "number"))
        );
        $tableForm.append($formItem.clone().append($formButton.clone()));
        $tableDropdown.append($tableForm);
        $btnTable.append($dropdownOuter.clone().append($tableDropdown.prepend($dropdownClose.clone())));


        /* initizalize editor */
        function init() {
            var value, attributes, attributes_html = '';

            if (settings.useParagraph !== false) {
                // set default tag when pressing ENTER to <p> instead of <div>
                document.execCommand("DefaultParagraphSeparator", false, 'p');
            }


            // reformat $inputElement to textarea
            if ($inputElement.prop("tagName") === "TEXTAREA") {
                // everything perfect
            } else if ($inputElement.val()) {
                value = $inputElement.val();
                attributes = $inputElement.prop("attributes");
                // loop through <select> attributes and apply them on <div>
                $.each(attributes, function() {
                    if (this.name) {
                        attributes_html += ' ' + this.name + '="' + this.value + '"';
                    }
                });
                $inputElement.replaceWith($('<textarea' + attributes_html + ' data-richtext="init">' + value + '</textarea>'));
                $inputElement = $('[data-richtext="init"]');
                $inputElement.removeAttr("data-richtext");
            } else if ($inputElement.html()) {
                value = $inputElement.html();
                attributes = $inputElement.prop("attributes");
                // loop through <select> attributes and apply them on <div>
                $.each(attributes, function() {
                    if (this.name) {
                        attributes_html += ' ' + this.name + '="' + this.value + '"';
                    }
                });
                $inputElement.replaceWith($('<textarea' + attributes_html + ' data-richtext="init">' + value + '</textarea>'));
                $inputElement = $('[data-richtext="init"]');
                $inputElement.removeAttr("data-richtext");
            } else {
                attributes = $inputElement.prop("attributes");
                // loop through <select> attributes and apply them on <div>
                $.each(attributes, function() {
                    if (this.name) {
                        attributes_html += ' ' + this.name + '="' + this.value + '"';
                    }
                });
                $inputElement.replaceWith($('<textarea' + attributes_html + ' data-richtext="init"></textarea>'));
                $inputElement = $('[data-richtext="init"]');
                $inputElement.removeAttr("data-richtext");
            }

            $editor = $('<div />', { class: "richText" });
            var $editorView = $('<div />', { class: "richText-editor", id: editorID, contenteditable: true });
            var $toolbar = $('<div />', { class: "richText-toolbar" });
            $toolbar.append($toolbarList);

            /* text formatting */
            if (settings.bold === true) {
                $toolbarList.append($toolbarElement.clone().append($btnBold));
            }
            if (settings.italic === true) {
                $toolbarList.append($toolbarElement.clone().append($btnItalic));
            }
            if (settings.underline === true) {
                $toolbarList.append($toolbarElement.clone().append($btnUnderline));
            }
            if (settings.fontSize === true) {
                $toolbarList.append($toolbarElement.clone().append($btnFontSize));
            }

            /* align */
            if (settings.leftAlign === true) {
                $toolbarList.append($toolbarElement.clone().append($btnLeftAlign));
            }
            if (settings.centerAlign === true) {
                $toolbarList.append($toolbarElement.clone().append($btnCenterAlign));
            }
            if (settings.rightAlign === true) {
                $toolbarList.append($toolbarElement.clone().append($btnRightAlign));
            }


            /* lists */
            // if (settings.ol === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnOL));
            // }
            // if (settings.ul === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnUL));
            // }

            /* fonts */
            // if (settings.fonts === true && settings.fontList.length > 0) {
            //     $toolbarList.append($toolbarElement.clone().append($btnFont));
            // }


            /* heading */
            // if (settings.heading === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnHeading));
            // }

            /* colors */
            // if (settings.fontColor === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnFontColor));
            // }

            /* urls */
            if (settings.urls === true) {
                $toolbarList.append($toolbarElement.clone().append($btnURLs));
            }
            /* uploads */
            if (settings.imageUpload === true) {
                $toolbarList.append($toolbarElement.clone().append($btnImageUpload));
            }
            if (settings.justify === true) {
                $toolbarList.append($toolbarElement.clone().append($btnJustify));
            }
            // if (settings.fileUpload === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnFileUpload));
            // }

            /* media */
            // if (settings.videoEmbed === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnVideoEmbed));
            // }



            // if (settings.table === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnTable));
            // }

            /* code */
            // if (settings.removeStyles === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnRemoveStyles));
            // }
            // if (settings.code === true) {
            //     $toolbarList.append($toolbarElement.clone().append($btnCode));
            // }

            // set current textarea value to editor
            $editorView.html($inputElement.val());

            $editor.append($editorView);
            $editor.append($toolbar);
            $editor.append($inputElement.clone().hide());
            $inputElement.replaceWith($editor);

            // append bottom toolbar
            $editor.append(
                $('<div />', { class: 'richText-toolbar' })
                .append($('<a />', {
                    class: 'richText-undo is-disabled',
                    html: '<span class="fa fa-undo"></span>',
                    'title': settings.translations.undo
                }))
                .append($('<a />', {
                    class: 'richText-redo is-disabled',
                    html: '<span class="fa fa-repeat fa-redo"></span>',
                    'title': settings.translations.redo
                }))
                .append($('<a />', { class: 'richText-help', html: '<span class="fa fa-question-circle"></span>' }))
            );

            if (settings.maxlength > 0) {
                // display max length in editor toolbar
                $editor.data('maxlength', settings.maxlength);
                $editor.children('.richText-toolbar').children('.richText-help').before($('<a />', {
                    class: 'richText-length',
                    text: '0/' + settings.maxlength
                }));
            }

            if (settings.height && settings.height > 0) {
                // set custom editor height
                $editor.children(".richText-editor, .richText-initial").css({
                    'min-height': settings.height + 'px',
                    'height': settings.height + 'px'
                });
            } else if (settings.heightPercentage && settings.heightPercentage > 0) {
                // set custom editor height in percentage
                var parentHeight = $editor.parent().innerHeight(); // get editor parent height
                var height = (settings.heightPercentage / 100) * parentHeight; // calculate pixel value from percentage
                height -= $toolbar.outerHeight() * 2; // remove toolbar size
                height -= parseInt($editor.css("margin-top")); // remove margins
                height -= parseInt($editor.css("margin-bottom")); // remove margins
                height -= parseInt($editor.find(".richText-editor").css("padding-top")); // remove paddings
                height -= parseInt($editor.find(".richText-editor").css("padding-bottom")); // remove paddings
                $editor.children(".richText-editor, .richText-initial").css({
                    'min-height': height + 'px',
                    'height': height + 'px'
                });
            }

            // add custom class
            if (settings.class) {
                $editor.addClass(settings.class);
            }
            if (settings.id) {
                $editor.attr("id", settings.id);
            }

            // fix the first line
            fixFirstLine();

            // save history
            history[editorID].push($editor.find("textarea").val());

            if (settings.callback && typeof settings.callback === 'function') {
                settings.callback($editor);
            }
        }

        // initialize editor
        init();


        /** EVENT HANDLERS */

        // Help popup
        $editor.find(".richText-help").on("click", function() {
            var $editor = $(this).parents(".richText");
            if ($editor) {
                var $outer = $('<div />', {
                    class: 'richText-help-popup',
                    style: 'position:absolute;top:0;right:0;bottom:0;left:0;background-color: rgba(0,0,0,0.3);'
                });
                var $inner = $('<div />', { style: 'position:relative;margin:60px auto;padding:20px;background-color:#FAFAFA;width:70%;font-family:Calibri,Verdana,Helvetica,sans-serif;font-size:small;' });
                var $content = $('<div />', { html: '<span id="closeHelp" style="display:block;position:absolute;top:0;right:0;padding:10px;cursor:pointer;" title="' + settings.translations.close + '"><span class="fa fa-times"></span></span>' });
                $content.append('<h3 style="margin:0;">RichText</h3>');
                $content.append('<hr><br>Powered by <a href="https://github.com/webfashionist/RichText" target="_blank">webfashionist/RichText</a> (Github) <br>License: <a href="https://github.com/webfashionist/RichText/blob/master/LICENSE" target="_blank">AGPL-3.0</a>');

                $outer.append($inner.append($content));
                $editor.append($outer);

                $outer.on("click", "#closeHelp", function() {
                    $(this).parents('.richText-help-popup').remove();
                });
            }
        });

        // undo / redo
        $(document).on("click", ".richText-undo, .richText-redo", function(e) {
            var $this = $(this);
            var $editor = $this.parents('.richText');
            if ($this.hasClass("richText-undo") && !$this.hasClass("is-disabled")) {
                undo($editor);
            } else if ($this.hasClass("richText-redo") && !$this.hasClass("is-disabled")) {
                redo($editor);
            }
        });


        // Saving changes from editor to textarea
        $(document).on("input change blur keydown keyup", ".richText-editor", function(e) {
            if ((e.keyCode === 9 || e.keyCode === "9") && e.type === "keydown") {
                // tab through table cells
                e.preventDefault();
                tabifyEditableTable(window, e);
                return false;
            }
            fixFirstLine();
            updateTextarea();
            doSave($(this).attr("id"));
            updateMaxLength($(this).attr('id'));
        });


        // add context menu to several Node elements
        $(document).on('contextmenu', '.richText-editor', function(e) {

            var $list = $('<ul />', { 'class': 'list-rightclick richText-list' });
            var $li = $('<li />');
            // remove Node selection
            $('.richText-editor').find('.richText-editNode').removeClass('richText-editNode');

            var $target = $(e.target);
            var $richText = $target.parents('.richText');
            var $toolbar = $richText.find('.richText-toolbar');

            var positionX = e.pageX - $richText.offset().left;
            var positionY = e.pageY - $richText.offset().top;

            $list.css({
                'top': positionY,
                'left': positionX
            });


            if ($target.prop("tagName") === "A") {
                // edit URL
                e.preventDefault();

                $list.append($li.clone().html('<span class="fa fa-link"></span>'));
                $target.parents('.richText').append($list);
                $list.find('.fa-link').on('click', function() {
                    $('.list-rightclick.richText-list').remove();
                    $target.addClass('richText-editNode');
                    var $popup = $toolbar.find('#richText-URL');
                    $popup.find('input#url').val($target.attr('href'));
                    $popup.find('input#urlText').val($target.text());
                    $popup.find('select#openIn').val($target.attr('target'));
                    $toolbar.find('.richText-btn').children('.fa-link').parents('li').addClass('is-selected');
                });

                return false;
            } else if ($target.prop("tagName") === "IMG") {
                // edit image
                e.preventDefault();

                $list.append($li.clone().html('<span class="fa fa-image"></span>'));
                $target.parents('.richText').append($list);
                $list.find('.fa-image').on('click', function() {
                    var align;
                    if ($target.parent('div').length > 0 && $target.parent('div').attr('style') === 'text-align:center;') {
                        align = 'center';
                    } else {
                        align = $target.attr('align');
                    }
                    $('.list-rightclick.richText-list').remove();
                    $target.addClass('richText-editNode');
                    var $popup = $toolbar.find('#richText-Image');
                    $popup.find('input#imageURL').val($target.attr('src'));
                    $popup.find('select#align').val(align);
                    $toolbar.find('.richText-btn').children('.fa-image').parents('li').addClass('is-selected');
                });

                return false;
            }

        });

        // Saving changes from textarea to editor
        $(document).on("input change blur", ".richText-initial", function() {
            if (settings.useSingleQuotes === true) {
                $(this).val(changeAttributeQuotes($(this).val()));
            }
            var editorID = $(this).siblings('.richText-editor').attr("id");
            updateEditor(editorID);
            doSave(editorID);
            updateMaxLength(editorID);
        });

        // Save selection seperately (mainly needed for Safari)
        $(document).on("dblclick mouseup", ".richText-editor", function() {
            var editorID = $(this).attr("id");
            doSave(editorID);
        });

        // embedding video
        $(document).on("click", "#richText-Video button.btn", function(event) {
            event.preventDefault();
            var $button = $(this);
            var $form = $button.parent('.richText-form-item').parent('.richText-form');
            if ($form.attr("data-editor") === editorID) {
                // only for the currently selected editor
                var url = $form.find('input#videoURL').val();
                var size = $form.find('select#size').val();

                if (!url) {
                    // no url set
                    $form.prepend($('<div />', {
                        style: 'color:red;display:none;',
                        class: 'form-item is-error',
                        text: settings.translations.pleaseEnterURL
                    }));
                    $form.children('.form-item.is-error').slideDown();
                    setTimeout(function() {
                        $form.children('.form-item.is-error').slideUp(function() {
                            $(this).remove();
                        });
                    }, 5000);
                } else {
                    // write html in editor
                    var html = '';
                    html = getVideoCode(url, size);
                    if (!html) {
                        $form.prepend($('<div />', {
                            style: 'color:red;display:none;',
                            class: 'form-item is-error',
                            text: settings.translations.videoURLnotSupported
                        }));
                        $form.children('.form-item.is-error').slideDown();
                        setTimeout(function() {
                            $form.children('.form-item.is-error').slideUp(function() {
                                $(this).remove();
                            });
                        }, 5000);
                    } else {
                        if (settings.useSingleQuotes === true) {

                        } else {

                        }
                        restoreSelection(editorID, true);
                        pasteHTMLAtCaret(html);
                        updateTextarea();
                        // reset input values
                        $form.find('input#videoURL').val('');
                        $('.richText-toolbar li.is-selected').removeClass("is-selected");
                    }
                }
            }
        });

        // Resize images
        $(document).on('mousedown', function(e) {
            var $target = $(e.target);
            if (!$target.hasClass('richText-list') && $target.parents('.richText-list').length === 0) {
                // remove context menu
                $('.richText-list.list-rightclick').remove();
                if (!$target.hasClass('richText-form') && $target.parents('.richText-form').length === 0) {
                    $('.richText-editNode').each(function() {
                        var $this = $(this);
                        $this.removeClass('richText-editNode');
                        if ($this.attr('class') === '') {
                            $this.removeAttr('class');
                        }
                    });
                }
            }
            if ($target.prop("tagName") === "IMG" && $target.parents("#" + editorID)) {
                startX = e.pageX;
                startY = e.pageY;
                startW = $target.innerWidth();
                startH = $target.innerHeight();

                var left = $target.offset().left;
                var right = $target.offset().left + $target.innerWidth();
                var bottom = $target.offset().top + $target.innerHeight();
                var top = $target.offset().top;
                var resize = false;
                $target.css({ 'cursor': 'default' });

                if (startY <= bottom && startY >= bottom - 20 && startX >= right - 20 && startX <= right) {
                    // bottom right corner
                    $resizeImage = $target;
                    $resizeImage.css({ 'cursor': 'nwse-resize' });
                    resize = true;
                }

                if ((resize === true || $resizeImage) && !$resizeImage.data("width")) {
                    // set initial image size and prevent dragging image while resizing
                    $resizeImage.data("width", $target.parents("#" + editorID).innerWidth());
                    $resizeImage.data("height", $target.parents("#" + editorID).innerHeight() * 3);
                    e.preventDefault();
                } else if (resize === true || $resizeImage) {
                    // resizing active, prevent other events
                    e.preventDefault();
                } else {
                    // resizing disabled, allow dragging image
                    $resizeImage = null;
                }

            }
        });
        $(document)
            .mouseup(function() {
                if ($resizeImage) {
                    $resizeImage.css({ 'cursor': 'default' });
                }
                $resizeImage = null;
            })
            .mousemove(function(e) {
                if ($resizeImage !== null) {
                    var maxWidth = $resizeImage.data('width');
                    var currentWidth = $resizeImage.width();
                    var maxHeight = $resizeImage.data('height');
                    var currentHeight = $resizeImage.height();
                    if ((startW + e.pageX - startX) <= maxWidth && (startH + e.pageY - startY) <= maxHeight) {
                        // only resize if new size is smaller than the original image size
                        $resizeImage.innerWidth(startW + e.pageX - startX); // only resize width to adapt height proportionally
                        // $box.innerHeight(startH + e.pageY-startY);
                        updateTextarea();
                    } else if ((startW + e.pageX - startX) <= currentWidth && (startH + e.pageY - startY) <= currentHeight) {
                        // only resize if new size is smaller than the previous size
                        $resizeImage.innerWidth(startW + e.pageX - startX); // only resize width to adapt height proportionally
                        updateTextarea();
                    }
                }
            });

        // adding URL
        $(document).on("click", "#richText-URL button.btn", function(event) {
            event.preventDefault();
            var $button = $(this);
            var $form = $button.parent('.richText-form-item').parent('.richText-form');
            if ($form.attr("data-editor") === editorID) {
                // only for currently selected editor
                var url = $form.find('input#url').val();
                var text = $form.find('input#urlText').val();
                var target = $form.find('#openIn').val();

                // set default values
                if (!target) {
                    target = '_self';
                }
                if (!text) {
                    text = url;
                }
                if (!url) {
                    // no url set
                    $form.prepend($('<div />', {
                        style: 'color:red;display:none;',
                        class: 'form-item is-error',
                        text: settings.translations.pleaseEnterURL
                    }));
                    $form.children('.form-item.is-error').slideDown();
                    setTimeout(function() {
                        $form.children('.form-item.is-error').slideUp(function() {
                            $(this).remove();
                        });
                    }, 5000);
                } else {
                    // write html in editor
                    var html = '';
                    if (settings.useSingleQuotes === true) {
                        html = "<a href='" + url + "' target='" + target + "'>" + text + "</a>";
                    } else {
                        html = '<a href="' + url + '" target="' + target + '">' + text + '</a>';
                    }
                    restoreSelection(editorID, false, true);

                    var $editNode = $('.richText-editNode');
                    if ($editNode.length > 0 && $editNode.prop("tagName") === "A") {
                        $editNode.attr("href", url);
                        $editNode.attr("target", target);
                        $editNode.text(text);
                        $editNode.removeClass('richText-editNode');
                        if ($editNode.attr('class') === '') {
                            $editNode.removeAttr('class');
                        }
                    } else {
                        pasteHTMLAtCaret(html);
                    }
                    // reset input values
                    $form.find('input#url').val('');
                    $form.find('input#urlText').val('');
                    $('.richText-toolbar li.is-selected').removeClass("is-selected");
                }
            }
        });

        // adding image
        $(document).on("click", "#richText-Image button.btn", function(event) {
            event.preventDefault();
            var $button = $(this);
            var $form = $button.parent('.richText-form-item').parent('.richText-form');
            if ($form.attr("data-editor") === editorID) {
                // only for currently selected editor
                var url = $form.find('#imageURL').val();
                var align = $form.find('select#align').val();

                // set default values
                if (!align) {
                    align = 'center';
                }
                if (!url) {
                    // no url set
                    $form.prepend($('<div />', {
                        style: 'color:red;display:none;',
                        class: 'form-item is-error',
                        text: settings.translations.pleaseSelectImage
                    }));
                    $form.children('.form-item.is-error').slideDown();
                    setTimeout(function() {
                        $form.children('.form-item.is-error').slideUp(function() {
                            $(this).remove();
                        });
                    }, 5000);
                } else {
                    // write html in editor
                    var html = '';
                    if (settings.useSingleQuotes === true) {
                        if (align === "center") {
                            html = "<div style='text-align:center;'><img src='" + url + "'></div>";
                        } else {
                            html = "<img src='" + url + "' align='" + align + "'>";
                        }
                    } else {
                        if (align === "center") {
                            html = '<div style="text-align:center;"><img src="' + url + '"></div>';
                        } else {
                            html = '<img src="' + url + '" align="' + align + '">';
                        }
                    }
                    restoreSelection(editorID, true);
                    var $editNode = $('.richText-editNode');
                    if ($editNode.length > 0 && $editNode.prop("tagName") === "IMG") {
                        $editNode.attr("src", url);
                        if ($editNode.parent('div').length > 0 && $editNode.parent('div').attr('style') === 'text-align:center;' && align !== 'center') {
                            $editNode.unwrap('div');
                            $editNode.attr('align', align);
                        } else if (($editNode.parent('div').length === 0 || $editNode.parent('div').attr('style') !== 'text-align:center;') && align === 'center') {
                            $editNode.wrap('<div style="text-align:center;"></div>');
                            $editNode.removeAttr('align');
                        } else {
                            $editNode.attr('align', align);
                        }
                        $editNode.removeClass('richText-editNode');
                        if ($editNode.attr('class') === '') {
                            $editNode.removeAttr('class');
                        }
                    } else {
                        pasteHTMLAtCaret(html);
                    }
                    // reset input values
                    $form.find('input#imageURL').val('');
                    $('.richText-toolbar li.is-selected').removeClass("is-selected");
                }
            }
        });

        // adding file
        $(document).on("click", "#richText-File button.btn", function(event) {
            event.preventDefault();
            var $button = $(this);
            var $form = $button.parent('.richText-form-item').parent('.richText-form');
            if ($form.attr("data-editor") === editorID) {
                // only for currently selected editor
                var url = $form.find('#fileURL').val();
                var text = $form.find('#fileText').val();

                // set default values
                if (!text) {
                    text = url;
                }
                if (!url) {
                    // no url set
                    $form.prepend($('<div />', {
                        style: 'color:red;display:none;',
                        class: 'form-item is-error',
                        text: settings.translations.pleaseSelectFile
                    }));
                    $form.children('.form-item.is-error').slideDown();
                    setTimeout(function() {
                        $form.children('.form-item.is-error').slideUp(function() {
                            $(this).remove();
                        });
                    }, 5000);
                } else {
                    // write html in editor
                    var html = '';
                    if (settings.useSingleQuotes === true) {
                        html = "<a href='" + url + "' target='_blank'>" + text + "</a>";
                    } else {
                        html = '<a href="' + url + '" target="_blank">' + text + '</a>';
                    }
                    restoreSelection(editorID, true);
                    pasteHTMLAtCaret(html);
                    // reset input values
                    $form.find('input#fileURL').val('');
                    $form.find('input#fileText').val('');
                    $('.richText-toolbar li.is-selected').removeClass("is-selected");
                }
            }
        });


        // adding table
        $(document).on("click", "#richText-Table button.btn", function(event) {
            event.preventDefault();
            var $button = $(this);
            var $form = $button.parent('.richText-form-item').parent('.richText-form');
            if ($form.attr("data-editor") === editorID) {
                // only for currently selected editor
                var rows = $form.find('input#tableRows').val();
                var columns = $form.find('input#tableColumns').val();

                // set default values
                if (!rows || rows <= 0) {
                    rows = 2;
                }
                if (!columns || columns <= 0) {
                    columns = 2;
                }

                // generate table
                var html = '';
                if (settings.useSingleQuotes === true) {
                    html = "<table class='table-1'><tbody>";
                } else {
                    html = '<table class="table-1"><tbody>';
                }
                for (var i = 1; i <= rows; i++) {
                    // start new row
                    html += '<tr>';
                    for (var n = 1; n <= columns; n++) {
                        // start new column in row
                        html += '<td> </td>';
                    }
                    html += '</tr>';
                }
                html += '</tbody></table>';

                // write html in editor
                restoreSelection(editorID, true);
                pasteHTMLAtCaret(html);
                // reset input values
                $form.find('input#tableColumns').val('');
                $form.find('input#tableRows').val('');
                $('.richText-toolbar li.is-selected').removeClass("is-selected");
            }
        });

        // opening / closing toolbar dropdown
        $(document).on("click", function(event) {
            var $clickedElement = $(event.target);

            if ($clickedElement.parents('.richText-toolbar').length === 0) {
                // element not in toolbar
                // ignore
            } else if ($clickedElement.hasClass("richText-dropdown-outer")) {
                // closing dropdown by clicking inside the editor
                $clickedElement.parent('a').parent('li').removeClass("is-selected");
            } else if ($clickedElement.find(".richText").length > 0) {
                // closing dropdown by clicking outside of the editor
                $('.richText-toolbar li').removeClass("is-selected");
            } else if ($clickedElement.parent().hasClass("richText-dropdown-close")) {
                // closing dropdown by clicking on the close button
                $('.richText-toolbar li').removeClass("is-selected");
            } else if ($clickedElement.hasClass("richText-btn") && $(event.target).children('.richText-dropdown-outer').length > 0) {
                // opening dropdown by clicking on toolbar button
                $clickedElement.parent('li').addClass("is-selected");

                if ($clickedElement.children('.fa,svg').hasClass("fa-link")) {
                    // put currently selected text in URL form to replace it
                    restoreSelection(editorID, false, true);
                    var selectedText = getSelectedText();
                    $clickedElement.find("input#urlText").val('');
                    $clickedElement.find("input#url").val('');
                    if (selectedText) {
                        $clickedElement.find("input#urlText").val(selectedText);
                    }
                } else if ($clickedElement.hasClass("fa-image")) {
                    // image
                }
            }
        });

        // Executing editor commands
        $(document).on("click", ".richText-toolbar a[data-command]", function(event) {
            var $button = $(this);
            var $toolbar = $button.closest('.richText-toolbar');
            var $editor = $toolbar.siblings('.richText-editor');
            var id = $editor.attr("id");
            if ($editor.length > 0 && id === editorID && (!$button.parent("li").attr('data-disable') || $button.parent("li").attr('data-disable') === "false")) {
                event.preventDefault();
                var command = $(this).data("command");

                if (command === "toggleCode") {
                    toggleCode($editor.attr("id"));
                } else {
                    var option = null;
                    if ($(this).data('option')) {
                        option = $(this).data('option').toString();
                        if (option.match(/^h[1-6]$/)) {
                            command = "heading";
                        }
                    }

                    formatText(command, option, id);
                    if (command === "removeFormat") {
                        // remove HTML/CSS formatting
                        $editor.find('*').each(function() {
                            // remove all, but very few, attributes from the nodes
                            var keepAttributes = [
                                "id", "class",
                                "name", "action", "method",
                                "src", "align", "alt", "title",
                                "style", "webkitallowfullscreen", "mozallowfullscreen", "allowfullscreen",
                                "width", "height", "frameborder"
                            ];
                            var element = $(this);
                            var attributes = $.map(this.attributes, function(item) {
                                return item.name;
                            });
                            $.each(attributes, function(i, item) {
                                if (keepAttributes.indexOf(item) < 0 && item.substr(0, 5) !== 'data-') {
                                    element.removeAttr(item);
                                }
                            });
                            if (element.prop('tagName') === "A") {
                                // remove empty URL tags
                                element.replaceWith(function() {
                                    return $('<span />', { html: $(this).html() });
                                });
                            }
                        });
                        formatText('formatBlock', 'div', id);
                    }
                    // clean up empty tags, which can be created while replacing formatting or when copy-pasting from other tools
                    $editor.find('div:empty,p:empty,li:empty,h1:empty,h2:empty,h3:empty,h4:empty,h5:empty,h6:empty').remove();
                    $editor.find('h1,h2,h3,h4,h5,h6').unwrap('h1,h2,h3,h4,h5,h6');
                }
            }
            // close dropdown after click
            $button.parents('li.is-selected').removeClass('is-selected');
        });


        /** INTERNAL METHODS **/

        /**
         * Format text in editor
         * @param {string} command
         * @param {string|null} option
         * @param {string} editorID
         * @private
         */
        function formatText(command, option, editorID) {
            if (typeof option === "undefined") {
                option = null;
            }
            // restore selection from before clicking on any button
            doRestore(editorID);
            // Temporarily enable designMode so that
            // document.execCommand() will work
            // document.designMode = "ON";
            // Execute the command
            if (command === "heading" && getSelectedText()) {
                // IE workaround
                pasteHTMLAtCaret('<' + option + '>' + getSelectedText() + '</' + option + '>');
            } else if (command === "fontSize" && parseInt(option) > 0) {
                var selection = getSelectedText();
                selection = (selection + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br>' + '$2');
                var html = (settings.useSingleQuotes ? "<span style='font-size:" + option + "px;'>" + selection + "</span>" : '<span style="font-size:' + option + 'px;">' + selection + '</span>');
                pasteHTMLAtCaret(html);
            } else {
                document.execCommand(command, false, option);
            }
            // Disable designMode
            // document.designMode = "OFF";
        }


        /**
         * Update textarea when updating editor
         * @private
         */
        function updateTextarea() {
            var $editor = $('#' + editorID);
            var content = $editor.html();
            if (settings.useSingleQuotes === true) {
                content = changeAttributeQuotes(content);
            }
            $editor.siblings('.richText-initial').val(content);
        }


        /**
         * Update editor when updating textarea
         * @private
         */
        function updateEditor(editorID) {
            var $editor = $('#' + editorID);
            var content = $editor.siblings('.richText-initial').val();
            $editor.html(content);
        }


        /**
         * Save caret position and selection
         * @return object
         **/
        function saveSelection(editorID) {
            var containerEl = document.getElementById(editorID);
            var range, start, end, type;
            if (window.getSelection && document.createRange) {
                var sel = window.getSelection && window.getSelection();
                if (sel && sel.rangeCount > 0 && $(sel.anchorNode).parents('#' + editorID).length > 0) {
                    range = window.getSelection().getRangeAt(0);
                    var preSelectionRange = range.cloneRange();
                    preSelectionRange.selectNodeContents(containerEl);
                    preSelectionRange.setEnd(range.startContainer, range.startOffset);

                    start = preSelectionRange.toString().length;
                    end = (start + range.toString().length);

                    type = (start === end ? 'caret' : 'selection');
                    anchor = sel.anchorNode; //(type === "caret" && sel.anchorNode.tagName ? sel.anchorNode : false);
                    start = (type === 'caret' && anchor !== false ? start : preSelectionRange.toString().length);
                    end = (type === 'caret' && anchor !== false ? end : (start + range.toString().length));

                    return {
                        start: start,
                        end: end,
                        type: type,
                        anchor: anchor,
                        editorID: editorID
                    }
                }
            }
            return (savedSelection ? savedSelection : {
                start: 0,
                end: 0
            });
        }


        /**
         * Restore selection
         **/
        function restoreSelection(editorID, media, url) {
            var containerEl = document.getElementById(editorID);
            var savedSel = savedSelection;
            if (!savedSel) {
                // fix selection if editor has not been focused
                savedSel = {
                    'start': 0,
                    'end': 0,
                    'type': 'caret',
                    'editorID': editorID,
                    'anchor': $('#' + editorID).children('div')[0]
                };
            }

            if (savedSel.editorID !== editorID) {
                return false;
            } else if (media === true) {
                containerEl = (savedSel.anchor ? savedSel.anchor : containerEl); // fix selection issue
            } else if (url === true) {
                if (savedSel.start === 0 && savedSel.end === 0) {
                    containerEl = (savedSel.anchor ? savedSel.anchor : containerEl); // fix selection issue
                }
            }

            if (window.getSelection && document.createRange) {
                var charIndex = 0,
                    range = document.createRange();
                if (!range || !containerEl) {
                    window.getSelection().removeAllRanges();
                    return true;
                }
                range.setStart(containerEl, 0);
                range.collapse(true);
                var nodeStack = [containerEl],
                    node, foundStart = false,
                    stop = false;

                while (!stop && (node = nodeStack.pop())) {
                    if (node.nodeType === 3) {
                        var nextCharIndex = charIndex + node.length;
                        if (!foundStart && savedSel.start >= charIndex && savedSel.start <= nextCharIndex) {
                            range.setStart(node, savedSel.start - charIndex);
                            foundStart = true;
                        }
                        if (foundStart && savedSel.end >= charIndex && savedSel.end <= nextCharIndex) {
                            range.setEnd(node, savedSel.end - charIndex);
                            stop = true;
                        }
                        charIndex = nextCharIndex;
                    } else {
                        var i = node.childNodes.length;
                        while (i--) {
                            nodeStack.push(node.childNodes[i]);
                        }
                    }
                }
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }


        /**
         * Save caret position and selection
         * @return object
         **/
        /*
       function saveSelection(editorID) {
           var containerEl = document.getElementById(editorID);
           var start;
           if (window.getSelection && document.createRange) {
               var sel = window.getSelection && window.getSelection();
               if (sel && sel.rangeCount > 0) {
                   var range = window.getSelection().getRangeAt(0);
                   var preSelectionRange = range.cloneRange();
                   preSelectionRange.selectNodeContents(containerEl);
                   preSelectionRange.setEnd(range.startContainer, range.startOffset);
                   start = preSelectionRange.toString().length;

                   return {
                       start: start,
                       end: start + range.toString().length,
                       editorID: editorID
                   }
               } else {
                   return (savedSelection ? savedSelection : {
                       start: 0,
                       end: 0
                   });
               }
           } else if (document.selection && document.body.createTextRange) {
               var selectedTextRange = document.selection.createRange();
               var preSelectionTextRange = document.body.createTextRange();
               preSelectionTextRange.moveToElementText(containerEl);
               preSelectionTextRange.setEndPoint("EndToStart", selectedTextRange);
               start = preSelectionTextRange.text.length;

               return {
                   start: start,
                   end: start + selectedTextRange.text.length,
                   editorID: editorID
               };
           }
       }
       */

        /**
         * Restore selection
         **/

        /*
       function restoreSelection(editorID) {
           var containerEl = document.getElementById(editorID);
           var savedSel = savedSelection;
           if(savedSel.editorID !== editorID) {
               return false;
           }
           if (window.getSelection && document.createRange) {
               var charIndex = 0, range = document.createRange();
               range.setStart(containerEl, 0);
               range.collapse(true);
               var nodeStack = [containerEl], node, foundStart = false, stop = false;

               while (!stop && (node = nodeStack.pop())) {
                   if (node.nodeType === 3) {
                       var nextCharIndex = charIndex + node.length;
                       if (!foundStart && savedSel.start >= charIndex && savedSel.start <= nextCharIndex) {
                           range.setStart(node, savedSel.start - charIndex);
                           foundStart = true;
                       }
                       if (foundStart && savedSel.end >= charIndex && savedSel.end <= nextCharIndex) {
                           range.setEnd(node, savedSel.end - charIndex);
                           stop = true;
                       }
                       charIndex = nextCharIndex;
                   } else {
                       var i = node.childNodes.length;
                       while (i--) {
                           nodeStack.push(node.childNodes[i]);
                       }
                   }
               }
               var sel = window.getSelection();
               sel.removeAllRanges();
               sel.addRange(range);
           } else if (document.selection && document.body.createTextRange) {
               var textRange = document.body.createTextRange();
               textRange.moveToElementText(containerEl);
               textRange.collapse(true);
               textRange.moveEnd("character", savedSel.end);
               textRange.moveStart("character", savedSel.start);
               textRange.select();
           }
       }
       */

        /**
         * Enables tabbing/shift-tabbing between contentEditable table cells
         * @param {Window} win - Active window context.
         * @param {Event} e - jQuery Event object for the keydown that fired.
         */
        function tabifyEditableTable(win, e) {

            if (e.keyCode !== 9) {
                return false;
            }

            var sel;
            if (win.getSelection) {
                sel = win.getSelection();
                if (sel.rangeCount > 0) {

                    var textNode = null,
                        direction = null;

                    if (!e.shiftKey) {
                        direction = "next";
                        textNode = (sel.focusNode.nodeName === "TD") ?
                            (sel.focusNode.nextSibling != null) ?
                            sel.focusNode.nextSibling :
                            (sel.focusNode.parentNode.nextSibling != null) ?
                            sel.focusNode.parentNode.nextSibling.childNodes[0] :
                            null :
                            (sel.focusNode.parentNode.nextSibling != null) ?
                            sel.focusNode.parentNode.nextSibling :
                            (sel.focusNode.parentNode.parentNode.nextSibling != null) ?
                            sel.focusNode.parentNode.parentNode.nextSibling.childNodes[0] :
                            null;
                    } else {
                        direction = "previous";
                        textNode = (sel.focusNode.nodeName === "TD") ?
                            (sel.focusNode.previousSibling != null) ?
                            sel.focusNode.previousSibling :
                            (sel.focusNode.parentNode.previousSibling != null) ?
                            sel.focusNode.parentNode.previousSibling.childNodes[sel.focusNode.parentNode.previousSibling.childNodes.length - 1] :
                            null :
                            (sel.focusNode.parentNode.previousSibling != null) ?
                            sel.focusNode.parentNode.previousSibling :
                            (sel.focusNode.parentNode.parentNode.previousSibling != null) ?
                            sel.focusNode.parentNode.parentNode.previousSibling.childNodes[sel.focusNode.parentNode.parentNode.previousSibling.childNodes.length - 1] :
                            null;
                    }

                    if (textNode != null) {
                        sel.collapse(textNode, Math.min(textNode.length, sel.focusOffset + 1));
                        if (textNode.textContent != null) {
                            sel.selectAllChildren(textNode);
                        }
                        e.preventDefault();
                        return true;
                    } else if (textNode === null && direction === "next" && sel.focusNode.nodeName === "TD") {
                        // add new row on TAB if arrived at the end of the row
                        var $table = $(sel.focusNode).parents("table");
                        var cellsPerLine = $table.find("tr").first().children("td").length;
                        var $tr = $("<tr />");
                        var $td = $("<td />");
                        for (var i = 1; i <= cellsPerLine; i++) {
                            $tr.append($td.clone());
                        }
                        $table.append($tr);
                        // simulate tabing through table
                        tabifyEditableTable(window, {
                            keyCode: 9,
                            shiftKey: false,
                            preventDefault: function() {}
                        });
                    }
                }
            }
            return false;
        }

        /**
         * Returns the text from the current selection
         * @private
         * @return {string|boolean}
         */
        function getSelectedText() {
            var range;
            if (window.getSelection) { // all browsers, except IE before version 9
                range = window.getSelection();
                return range.toString() ? range.toString() : range.focusNode.nodeValue;
            } else if (document.selection.createRange) { // Internet Explorer
                range = document.selection.createRange();
                return range.text;
            }
            return false;
        }

        /**
         * Save selection
         */
        function doSave(editorID) {
            var $textarea = $('.richText-editor#' + editorID).siblings('.richText-initial');
            addHistory($textarea.val(), editorID);
            savedSelection = saveSelection(editorID);
        }

        /**
         * @param editorID
         * @returns {boolean}
         */
        function updateMaxLength(editorID) {
            var $editorInner = $('.richText-editor#' + editorID);
            var $editor = $editorInner.parents('.richText');
            if (!$editor.data('maxlength')) {
                return true;
            }
            var color;
            var maxLength = parseInt($editor.data('maxlength'));
            var content = $editorInner.text();
            var percentage = (content.length / maxLength) * 100;
            if (percentage > 99) {
                color = 'red';
            } else if (percentage >= 90) {
                color = 'orange';
            } else {
                color = 'black';
            }

            $editor.find('.richText-length').html('<span class="' + color + '">' + content.length + '</span>/' + maxLength);

            if (content.length > maxLength) {
                // content too long
                undo($editor);
                return false;
            }
            return true;
        }

        /**
         * Add to history
         * @param val Editor content
         * @param id Editor ID
         */
        function addHistory(val, id) {
            if (!history[id]) {
                return false;
            }
            if (history[id].length - 1 > historyPosition[id]) {
                history[id].length = historyPosition[id] + 1;
            }

            if (history[id][history[id].length - 1] !== val) {
                history[id].push(val);
            }

            historyPosition[id] = history[id].length - 1;
            setHistoryButtons(id);
        }

        function setHistoryButtons(id) {
            if (historyPosition[id] <= 0) {
                $editor.find(".richText-undo").addClass("is-disabled");
            } else {
                $editor.find(".richText-undo").removeClass("is-disabled");
            }

            if (historyPosition[id] >= history[id].length - 1 || history[id].length === 0) {
                $editor.find(".richText-redo").addClass("is-disabled");
            } else {
                $editor.find(".richText-redo").removeClass("is-disabled");
            }
        }

        /**
         * Undo
         * @param $editor
         */
        function undo($editor) {
            var id = $editor.children('.richText-editor').attr('id');
            historyPosition[id]--;
            if (!historyPosition[id] && historyPosition[id] !== 0) {
                return false;
            }
            var value = history[id][historyPosition[id]];
            $editor.find('textarea').val(value);
            $editor.find('.richText-editor').html(value);
            setHistoryButtons(id);
        }

        /**
         * Undo
         * @param $editor
         */
        function redo($editor) {
            var id = $editor.children('.richText-editor').attr('id');
            historyPosition[id]++;
            if (!historyPosition[id] && historyPosition[id] !== 0) {
                return false;
            }
            var value = history[id][historyPosition[id]];
            $editor.find('textarea').val(value);
            $editor.find('.richText-editor').html(value);
            setHistoryButtons(id);
        }

        /**
         * Restore selection
         */
        function doRestore(id) {
            if (savedSelection) {
                restoreSelection((id ? id : savedSelection.editorID));
            }
        }

        /**
         * Paste HTML at caret position
         * @param {string} html HTML code
         * @private
         */
        function pasteHTMLAtCaret(html) {
            // add HTML code for Internet Explorer
            var sel, range;
            if (window.getSelection) {
                // IE9 and non-IE
                sel = window.getSelection();
                if (sel.getRangeAt && sel.rangeCount) {
                    range = sel.getRangeAt(0);
                    range.deleteContents();

                    // Range.createContextualFragment() would be useful here but is
                    // only relatively recently standardized and is not supported in
                    // some browsers (IE9, for one)
                    var el = document.createElement("div");
                    el.innerHTML = html;
                    var frag = document.createDocumentFragment(),
                        node, lastNode;
                    while ((node = el.firstChild)) {
                        lastNode = frag.appendChild(node);
                    }
                    range.insertNode(frag);

                    // Preserve the selection
                    if (lastNode) {
                        range = range.cloneRange();
                        range.setStartAfter(lastNode);
                        range.collapse(true);
                        sel.removeAllRanges();
                        sel.addRange(range);
                    }
                }
            } else if (document.selection && document.selection.type !== "Control") {
                // IE < 9
                document.selection.createRange().pasteHTML(html);
            }
        }


        /**
         * Change quotes around HTML attributes
         * @param  {string} string
         * @return {string}
         */
        function changeAttributeQuotes(string) {
            if (!string) {
                return '';
            }

            var regex;
            var rstring;
            if (settings.useSingleQuotes === true) {
                regex = /\s+(\w+\s*=\s*(["][^"]*["])|(['][^']*[']))+/g;
                rstring = string.replace(regex, function($0, $1, $2) {
                    if (!$2) {
                        return $0;
                    }
                    return $0.replace($2, $2.replace(/\"/g, "'"));
                });
            } else {
                regex = /\s+(\w+\s*=\s*(['][^']*['])|(["][^"]*["]))+/g;
                rstring = string.replace(regex, function($0, $1, $2) {
                    if (!$2) {
                        return $0;
                    }
                    return $0.replace($2, $2.replace(/'/g, '"'));
                });
            }
            return rstring;
        }


        /**
         * Load colors for font or background
         * @param {string} command Command
         * @returns {string}
         * @private
         */
        function loadColors(command) {
            var colors = [];
            var result = '';

            colors["#FFFFFF"] = settings.translations.white;
            colors["#000000"] = settings.translations.black;
            colors["#7F6000"] = settings.translations.brown;
            colors["#938953"] = settings.translations.beige;
            colors["#1F497D"] = settings.translations.darkBlue;
            colors["blue"] = settings.translations.blue;
            colors["#4F81BD"] = settings.translations.lightBlue;
            colors["#953734"] = settings.translations.darkRed;
            colors["red"] = settings.translations.red;
            colors["#4F6128"] = settings.translations.darkGreen;
            colors["green"] = settings.translations.green;
            colors["#3F3151"] = settings.translations.purple;
            colors["#31859B"] = settings.translations.darkTurquois;
            colors["#4BACC6"] = settings.translations.turquois;
            colors["#E36C09"] = settings.translations.darkOrange;
            colors["#F79646"] = settings.translations.orange;
            colors["#FFFF00"] = settings.translations.yellow;

            if (settings.colors && settings.colors.length > 0) {
                colors = settings.colors;
            }

            for (var i in colors) {
                result += '<li class="inline"><a data-command="' + command + '" data-option="' + i + '" style="text-align:left;" title="' + colors[i] + '"><span class="box-color" style="background-color:' + i + '"></span></a></li>';
            }
            return result;
        }


        /**
         * Toggle (show/hide) code or editor
         * @private
         */
        function toggleCode(editorID) {
            doRestore(editorID);
            if ($editor.find('.richText-editor').is(":visible")) {
                // show code
                $editor.find('.richText-initial').show();
                $editor.find('.richText-editor').hide();
                // disable non working buttons
                $('.richText-toolbar').find('.richText-btn').each(function() {
                    if ($(this).children('.fa-code').length === 0) {
                        $(this).parent('li').attr("data-disable", "true");
                    }
                });
                convertCaretPosition(editorID, savedSelection);
            } else {
                // show editor
                $editor.find('.richText-initial').hide();
                $editor.find('.richText-editor').show();
                convertCaretPosition(editorID, savedSelection, true);
                // enable all buttons again
                $('.richText-toolbar').find('li').removeAttr("data-disable");
            }
        }


        /**
         * Convert caret position from editor to code view (or in reverse)
         * @param {string} editorID
         * @param {object} selection
         * @param {boolean} reverse
         **/
        function convertCaretPosition(editorID, selection, reverse) {
            var $editor = $('#' + editorID);
            var $textarea = $editor.siblings(".richText-initial");

            var code = $textarea.val();
            if (!selection || !code) {
                return { start: 0, end: 0 };
            }

            if (reverse === true) {
                savedSelection = { start: $editor.text().length, end: $editor.text().length, editorID: editorID };
                restoreSelection(editorID);
                return true;
            }
            selection.node = $textarea[0];
            var states = {
                start: false,
                end: false,
                tag: false,
                isTag: false,
                tagsCount: 0,
                isHighlight: (selection.start !== selection.end)
            };
            for (var i = 0; i < code.length; i++) {
                if (code[i] === "<") {
                    // HTML tag starts
                    states.isTag = true;
                    states.tag = false;
                    states.tagsCount++;
                } else if (states.isTag === true && code[i] !== ">") {
                    states.tagsCount++;
                } else if (states.isTag === true && code[i] === ">") {
                    states.isTag = false;
                    states.tag = true;
                    states.tagsCount++;
                } else if (states.tag === true) {
                    states.tag = false;
                }

                if (!reverse) {
                    if ((selection.start + states.tagsCount) <= i && states.isHighlight && !states.isTag && !states.tag && !states.start) {
                        selection.start = i;
                        states.start = true;
                    } else if ((selection.start + states.tagsCount) <= i + 1 && !states.isHighlight && !states.isTag && !states.tag && !states.start) {
                        selection.start = i + 1;
                        states.start = true;
                    }
                    if ((selection.end + states.tagsCount) <= i + 1 && !states.isTag && !states.tag && !states.end) {
                        selection.end = i + 1;
                        states.end = true;
                    }
                }

            }
            createSelection(selection.node, selection.start, selection.end);
            return selection;
        }

        /**
         * Create selection on node element
         * @param {Node} field
         * @param {int} start
         * @param {int} end
         **/
        function createSelection(field, start, end) {
            if (field.createTextRange) {
                var selRange = field.createTextRange();
                selRange.collapse(true);
                selRange.moveStart('character', start);
                selRange.moveEnd('character', end);
                selRange.select();
                field.focus();
            } else if (field.setSelectionRange) {
                field.focus();
                field.setSelectionRange(start, end);
            } else if (typeof field.selectionStart != 'undefined') {
                field.selectionStart = start;
                field.selectionEnd = end;
                field.focus();
            }
        }


        /**
         * Get video embed code from URL
         * @param {string} url Video URL
         * @param {string} size Size in the form of widthxheight
         * @return {string|boolean}
         * @private
         **/
        function getVideoCode(url, size) {
            var video = getVideoID(url);
            var responsive = false,
                success = false;

            if (!video) {
                // video URL not supported
                return false;
            }

            if (!size) {
                size = "640x360";
                size = size.split("x");
            } else if (size !== "responsive") {
                size = size.split("x");
            } else {
                responsive = true;
                size = "640x360";
                size = size.split("x");
            }

            var html = '<br><br>';
            if (responsive === true) {
                html += '<div class="videoEmbed" style="position:relative;height:0;padding-bottom:56.25%">';
            }
            var allowfullscreen = 'webkitallowfullscreen mozallowfullscreen allowfullscreen';

            if (video.platform === "YouTube") {
                var youtubeDomain = (settings.youtubeCookies ? 'www.youtube.com' : 'www.youtube-nocookie.com');
                html += '<iframe src="https://' + youtubeDomain + '/embed/' + video.id + '?ecver=2" width="' + size[0] + '" height="' + size[1] + '" frameborder="0"' + (responsive === true ? ' style="position:absolute;width:100%;height:100%;left:0"' : '') + ' ' + allowfullscreen + '></iframe>';
                success = true;
            } else if (video.platform === "Vimeo") {
                html += '<iframe src="https://player.vimeo.com/video/' + video.id + '" width="' + size[0] + '" height="' + size[1] + '" frameborder="0"' + (responsive === true ? ' style="position:absolute;width:100%;height:100%;left:0"' : '') + ' ' + allowfullscreen + '></iframe>';
                success = true;
            } else if (video.platform === "Facebook") {
                html += '<iframe src="https://www.facebook.com/plugins/video.php?href=' + encodeURI(url) + '&show_text=0&width=' + size[0] + '" width="' + size[0] + '" height="' + size[1] + '" style="' + (responsive === true ? 'position:absolute;width:100%;height:100%;left:0;border:none;overflow:hidden"' : 'border:none;overflow:hidden') + '" scrolling="no" frameborder="0" allowTransparency="true" ' + allowfullscreen + '></iframe>';
                success = true;
            } else if (video.platform === "Dailymotion") {
                html += '<iframe frameborder="0" width="' + size[0] + '" height="' + size[1] + '" src="//www.dailymotion.com/embed/video/' + video.id + '"' + (responsive === true ? ' style="position:absolute;width:100%;height:100%;left:0"' : '') + ' ' + allowfullscreen + '></iframe>';
                success = true;
            }

            if (responsive === true) {
                html += '</div>';
            }
            html += '<br><br>';

            if (success) {
                return html;
            }
            return false;
        }

        /**
         * Returns the unique video ID
         * @param {string} url
         * return {object|boolean}
         **/
        function getVideoID(url) {
            var vimeoRegExp = /(?:http?s?:\/\/)?(?:www\.)?(?:vimeo\.com)\/?(.+)/;
            var youtubeRegExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var facebookRegExp = /(?:http?s?:\/\/)?(?:www\.)?(?:facebook\.com)\/.*\/videos\/[0-9]+/;
            var dailymotionRegExp = /(?:http?s?:\/\/)?(?:www\.)?(?:dailymotion\.com)\/video\/([a-zA-Z0-9]+)/;
            var youtubeMatch = url.match(youtubeRegExp);
            var vimeoMatch = url.match(vimeoRegExp);
            var facebookMatch = url.match(facebookRegExp);
            var dailymotionMatch = url.match(dailymotionRegExp);

            if (youtubeMatch && youtubeMatch[2].length === 11) {
                return {
                    "platform": "YouTube",
                    "id": youtubeMatch[2]
                };
            } else if (vimeoMatch && vimeoMatch[1]) {
                return {
                    "platform": "Vimeo",
                    "id": vimeoMatch[1]
                };
            } else if (facebookMatch && facebookMatch[0]) {
                return {
                    "platform": "Facebook",
                    "id": facebookMatch[0]
                };
            } else if (dailymotionMatch && dailymotionMatch[1]) {
                return {
                    "platform": "Dailymotion",
                    "id": dailymotionMatch[1]
                };
            }

            return false;
        }


        /**
         * Fix the first line as by default the first line has no tag container
         */
        function fixFirstLine() {
            if ($editor && !$editor.find(".richText-editor").html()) {
                // set first line with the right tags
                if (settings.useParagraph !== false) {
                    $editor.find(".richText-editor").html('<p><br></p>');
                } else {
                    $editor.find(".richText-editor").html('<div><br></div>');
                }
            } else {
                // replace tags, to force <div> or <p> tags and fix issues
                if (settings.useParagraph !== false) {
                    $editor.find(".richText-editor").find('div:not(.videoEmbed)').replaceWith(function() {
                        return $('<p />', { html: $(this).html() });
                    });
                } else {
                    $editor.find(".richText-editor").find('p').replaceWith(function() {
                        return $('<div />', { html: $(this).html() });
                    });
                }
            }
            updateTextarea();
        }

        return $(this);
    };

    $.fn.unRichText = function(options) {

        // set default options
        // and merge them with the parameter options
        var settings = $.extend({
            delay: 0 // delay in ms
        }, options);

        var $editor, $textarea, $main;
        var $el = $(this);

        /**
         * Initialize undoing RichText and call remove() method
         */
        function init() {

            if ($el.hasClass('richText')) {
                $main = $el;
            } else if ($el.hasClass('richText-initial') || $el.hasClass('richText-editor')) {
                $main = $el.parents('.richText');
            }

            if (!$main) {
                // node element does not correspond to RichText elements
                return false;
            }

            $editor = $main.find('.richText-editor');
            $textarea = $main.find('.richText-initial');

            if (parseInt(settings.delay) > 0) {
                // a delay has been set
                setTimeout(remove, parseInt(settings.delay));
            } else {
                remove();
            }
        }

        init();

        /**
         * Remove RichText elements
         */
        function remove() {
            $main.find('.richText-toolbar').remove();
            $main.find('.richText-editor').remove();
            $textarea
                .unwrap('.richText')
                .data('editor', 'richText')
                .removeClass('richText-initial')
                .show();

            if (settings.callback && typeof settings.callback === 'function') {
                settings.callback();
            }
        }

    };

}(jQuery));