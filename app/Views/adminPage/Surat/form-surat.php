<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-content'); ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $head; ?></h3>
                <p class="text-subtitle text-muted">Buat Surat Online Anda</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url('/dashboard') ?>">Surat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Buat Surat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section d-flex justify-content-center align-items-center">
<!--        <div class="card col-md-10">-->
            <form action="<?= base_url('/surat/save'); ?>" method="POST" enctype="multipart/form-data">
                <?php csrf_field(); ?>
                <!-- <div class="card-header">
                    <h4 class="card-title">Body</h4>
                </div> -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama-surat">Nama Surat</label>
                        <input type="text" id="nama-surat" class="form-control" name="nama_surat"
                               placeholder="Nama Surat">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="kop">KOP SURAT</label>
                        <input type="file" id="kop" class="form-control" name="kop" onchange="previewImage(this)">
                        <img id="preview" src="#" alt="Preview" style="width: 800px; max-height: 200px; margin-top: 10px; display: none;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="suratContent"></label>
                        <textarea style="color: black; resize: vertical;" name="data" class="card-body" id="suratContent"></textarea>
                    </div>
                </div>
                <div class="card-header">
                    <div class="buttons">
                        <button type="button" class="btn btn-secondary">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
<!--        </div>-->
    </section>
</div>
    <!-- <script src="assets/js/pages/form-editor.js"></script> -->
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        // const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea#suratContent',
            width: 800,
            height: 1123,
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
            theme_advanced_buttons3_add : "preview",
            plugin_preview_width : "800",
            plugin_preview_height : "1123",
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            // link_list: [
            //     { title: 'My page 1', value: 'https://www.tiny.cloud' },
            //     { title: 'My page 2', value: 'http://www.moxiecode.com' }
            // ],
            // image_list: [
            //     { title: 'My page 1', value: 'https://www.tiny.cloud' },
            //     { title: 'My page 2', value: 'http://www.moxiecode.com' }
            // ],
            // image_class_list: [
            //     { title: 'None', value: '' },
            //     { title: 'Some class', value: 'class-name' }
            // ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                }
            },
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            image_caption: true,
            // save_onsavecallback: () => {
            //     console.log('Saved');
            // }
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            // skin: useDarkMode ? 'oxide-dark' : 'oxide',
            // content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block'; // Menampilkan gambar setelah diinputkan
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none'; // Menyembunyikan gambar jika tidak ada file yang dipilih
            }
        }
    </script>

<?= $this->endSection(); ?>