// CKEDITOR
ClassicEditor
    .create(document.querySelector('#body-surat'))
    .catch( error => {
        console.error( error );
    });
//Quill
// new Quill("#body-surat", {
//     bounds: "#full-container .editor",
//     modules: {
//         toolbar: [
//             [{ font: ['Times New Roman', 'Arial', 'Verdana', 'Tahoma', 'Calibri'] }, { size: [] }],
//             ["bold", "italic", "underline", "strike"],
//             [
//                 { color: [] },
//                 { background: [] }
//             ],
//             [
//                 { script: "super" },
//                 { script: "sub" }
//             ],
//             [
//                 { list: "ordered" },
//                 { list: "bullet" },
//                 { indent: "-1" },
//                 { indent: "+1" }
//             ],
//             ["direction", { align: [] }],
//             ["link", "image", "video"],
//             ["clean"]]
//         },
//         theme: "snow"
//     })
