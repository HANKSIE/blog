function ckeditorInit(target, uploadAPI) {
    ClassicEditor.create(target, {
        toolbar: {
            items: [
                "heading",
                "|",
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "|",
                "indent",
                "outdent",
                "|",
                "imageUpload",
                "blockQuote",
                "insertTable",
                "undo",
                "redo",
            ],
        },
        language: "zh",
        image: {
            toolbar: [
                "imageTextAlternative",
                "imageStyle:full",
                "imageStyle:side",
            ],
        },
        table: {
            contentToolbar: [
                "tableColumn",
                "tableRow",
                "mergeTableCells",
                "tableCellProperties",
                "tableProperties",
            ],
        },
        simpleUpload: {
            // The URL that the images are uploaded to.
            uploadUrl: uploadAPI,

            // Enable the XMLHttpRequest.withCredentials property.
            withCredentials: false,

            // Headers sent along with the XMLHttpRequest to the upload server.
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        },
        licenseKey: "",
    })
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error("Oops, something went wrong!");
            console.error(
                "Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:"
            );
            console.warn("Build id: n0gsfnwn24ph-ltg3fnvn6ys1");
            console.error(error);
        });
}
