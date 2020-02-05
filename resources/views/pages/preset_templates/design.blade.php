<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mailedit | Preset Template Designer </title>
    <link rel="stylesheet" href="//unpkg.com/grapesjs@0.10.7/dist/css/grapes.min.css">
    <link rel="stylesheet" href="{{ asset('css/editor/material.css')}}">
    <link rel="stylesheet" href="{{ asset('css/editor/tooltip.css')}}">
    <link rel="stylesheet" href="{{ asset('css/editor/toastr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/editor/grapesjs-preset-newsletter.css')}}">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//unpkg.com/grapesjs@0.10.7/dist/grapes.min.js"></script>
    <script src="{{ asset('js/editor/grapesjs-preset-newsletter.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>


    <script src="{{ asset('js/editor/ajaxable.min.js')}}"></script>
</head>

<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .nl-link {
        color: inherit;
    }

    .info-link {
        text-decoration: none;
    }

    #info-cont {
        line-height: 17px;
    }

    .grapesjs-logo {
        display: block;
        height: 90px;
        margin: 0 auto;
        width: 90px;
    }

    .grapesjs-logo path {
        stroke: #eee !important;
        stroke-width: 8 !important;
    }

    #toast-container {
        font-size: 13px;
        font-weight: lighter;
    }

    #toast-container>div,
    #toast-container>div:hover {
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        font-family: Helvetica, sans-serif;
    }

    #toast-container>div {
        opacity: 0.95;
    }
</style>

<body>


    <div id="gjs" style="height:0px; overflow:hidden">
    {!! $preset_template->content !!}
    </div>



    <form id="test-form" class="test-form" action="http://grapes.16mb.com/s" method="POST" style="display:none">
        <div class="putsmail-c">
            <!-- <a href="https://putsmail.com/" target="_blank">
                <img src="./img/putsmail.png" style="opacity:0.85;" />
            </a> -->
            <div class="gjs-sm-property" style="font-size: 10px">
                Test delivering offered by <a class="nl-link" href="https://litmus.com/" target="_blank">Litmus</a> with <a class="nl-link" href="https://putsmail.com/" target="_blank">Putsmail</a>
                <span class="form-status" style="opacity: 0">
                    <i class="fa fa-refresh anim-spin" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="gjs-sm-property">
            <div class="gjs-field">
                <span id="gjs-sm-input-holder">
                    <input type="email" name="email" placeholder="Email" required>
                </span>
            </div>
        </div>

        <div class="gjs-sm-property">
            <div class="gjs-field">
                <span id="gjs-sm-input-holder">
                    <input type="text" name="subject" placeholder="Subject" required>
                </span>
            </div>
        </div>
        <input type="hidden" name="body">
        <button class="gjs-btn-prim gjs-btn-import" style="width: 100%">SEND</button>
    </form>


    <div id="info-cont" style="display:none">
        <br />
        <h2 style="text-align:center;">Mailedit Desginer</h2>
    </div>


    <script type="text/javascript">
        var host = 'http://artf.github.io/grapesjs/';
        var images = [
            host + 'img/grapesjs-logo.png',
            host + 'img/tmp-blocks.jpg',
            host + 'img/tmp-tgl-images.jpg',
            host + 'img/tmp-send-test.jpg',
            host + 'img/tmp-devices.jpg',
        ];

        // Set up GrapesJS editor with the Newsletter plugin
        var editor = grapesjs.init({
            height: '100%',
            //noticeOnUnload: 0,
            storageManager: {
                autoload: 0,
            },
            assetManager: {
                assets: images,
                upload: 0,
                uploadText: 'Uploading is not available in this demo',
            },
            container: '#gjs',
            fromElement: true,
            plugins: ['gjs-preset-newsletter'],
            pluginsOpts: {
                'gjs-preset-newsletter': {
                    modalLabelImport: 'Paste all your code here below and click import',
                    modalLabelExport: 'Copy the code and use it wherever you want',
                    codeViewerTheme: 'material',
                    //defaultTemplate: templateImport,
                    importPlaceholder: '<table class="table"><tr><td class="cell">Hello world!</td></tr></table>',
                    cellStyle: {
                        'font-size': '12px',
                        'font-weight': 300,
                        'vertical-align': 'top',
                        color: 'rgb(111, 119, 125)',
                        margin: 0,
                        padding: 0,
                    }
                }
            }
        });


        // Let's add in this demo the possibility to test our newsletters
        var mdlClass = 'gjs-mdl-dialog-sm';
        var pnm = editor.Panels;
        var cmdm = editor.Commands;
        var testContainer = document.getElementById("test-form");
        var contentEl = testContainer.querySelector('input[name=body]');
        var md = editor.Modal;
        cmdm.add('send-test', {
            run(editor, sender) {
                sender.set('active', 0);
                var modalContent = md.getContentEl();
                var mdlDialog = document.querySelector('.gjs-mdl-dialog');
                var cmdGetCode = cmdm.get('gjs-get-inlined-html');
                contentEl.value = cmdGetCode && cmdGetCode.run(editor);
                mdlDialog.className += ' ' + mdlClass;
                testContainer.style.display = 'block';
                md.setTitle('Test your Newsletter');
                md.setContent('');
                md.setContent(testContainer);
                md.open();
                md.getModel().once('change:open', function() {
                    mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
                    //clean status
                })
            }
        });
        pnm.addButton('options', {
            id: 'send-test',
            className: 'fa fa-paper-plane',
            command: 'send-test',
            attributes: {
                'title': 'Test Newsletter',
                'data-tooltip-pos': 'bottom',
            },
        });

        //fa fa-refresh
        var statusFormElC = document.querySelector('.form-status');
        var statusFormEl = document.querySelector('.form-status i');
        var ajaxTest = ajaxable(testContainer).
        onStart(function() {
                statusFormEl.className = 'fa fa-refresh anim-spin';
                statusFormElC.style.opacity = '1';
                statusFormElC.className = 'form-status';
            })
            .onResponse(function(res) {
                if (res.data) {
                    statusFormElC.style.opacity = '0';
                    statusFormEl.removeAttribute('data-tooltip');
                    md.close();
                } else if (res.errors) {
                    statusFormEl.className = 'fa fa-exclamation-circle';
                    statusFormEl.setAttribute('data-tooltip', res.errors);
                    statusFormElC.className = 'form-status text-danger';
                }
            });

        // Add info command
        var infoContainer = document.getElementById("info-cont");
        cmdm.add('save', {
            run(editor, sender) {
                // sender.set('active', 0);
                // var mdlDialog = document.querySelector('.gjs-mdl-dialog');
                // mdlDialog.className += ' ' + mdlClass;
                // infoContainer.style.display = 'block';
                // md.setTitle('About this Template');
                // md.setContent('');
                // md.setContent(infoContainer);
                // md.open();
                // md.getModel().once('change:open', function() {
                //     mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
                // })
                // var content = editor.getHtml();
                var content = editor.runCommand('gjs-get-inlined-html');
                const url = `{{ route('admin.preset.update', $preset_template->uuid) }}`;
                console.log(content);
                $.ajax({
                    type: "PUT",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        content: content,
                        isHtml: true
                    },
                    success: function(data) {
                        if ((data.error)) {
                            console.log(error);
                        }
                        console.log(data)
                        window.location.replace(`{{ route('admin.preset.show', $preset_template->uuid) }}`);
                    }
                });

                console.log(url);
            }
        });
        pnm.addButton('options', {
            id: 'save',
            className: 'fa fa-save',
            command: 'save',
            attributes: {
                'title': 'Save',
                'data-tooltip-pos': 'bottom',
            },
        });

        // Simple warn notifier
        var origWarn = console.warn;
        toastr.options = {
            closeButton: true,
            preventDuplicates: true,
            showDuration: 250,
            hideDuration: 150
        };
        console.warn = function(msg) {
            toastr.warning(msg);
            origWarn(msg);
        };

        $(document).ready(function() {

            // Beautify tooltips
            $('*[title]').each(function() {
                var el = $(this);
                var title = el.attr('title').trim();
                if (!title)
                    return;
                el.attr('data-tooltip', el.attr('title'));
                el.attr('title', '');
            });

        });
    </script>
</body>

</html>