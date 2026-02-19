var video = document.querySelector("#video-webcam");
navigator.getUserMedia =
    navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia ||
    navigator.oGetUserMedia;
if (navigator.getUserMedia) {
    navigator.getUserMedia({ video: true }, handleVideo, videoError);
}
function handleVideo(stream) {
    video.srcObject = stream;
}
function videoError(e) {
    alert("Izinkan menggunakan webcam untuk demo!");
}
function takeSnapshot() {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    context.drawImage(video, 0, 0);

    canvas.toBlob(function (blob) {
        const reader = new FileReader();

        reader.onload = function () {
            // 🔥 CLEAR dulu supaya tidak pakai foto lama
            sessionStorage.removeItem("imageBlob");

            sessionStorage.setItem("imageBlob", reader.result);

            window.location.href = "/preview";
        };

        reader.readAsDataURL(blob);
    }, "image/png");
}

// Versi clean untuk belajar
// document.addEventListener("DOMContentLoaded", function () {

//     const video = document.getElementById("video-webcam");

//     async function startCamera() {
//         try {
//             const stream = await navigator.mediaDevices.getUserMedia({
//                 video: true,
//                 audio: false
//             });

//             console.log("Camera OK");

//             video.srcObject = stream;

//             video.onloadedmetadata = () => {
//                 video.play();
//             };

//         } catch (error) {
//             console.error("Camera Error:", error);
//         }
//     }

//     if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
//         startCamera();
//     }

//     window.takeSnapshot = function () {
//         if (!video.videoWidth) {
//             alert("Kamera belum siap.");
//             return;
//         }

//         const canvas = document.createElement("canvas");
//         const context = canvas.getContext("2d");

//         canvas.width = video.videoWidth;
//         canvas.height = video.videoHeight;

//         context.drawImage(video, 0, 0);

//         const dataURL = canvas.toDataURL("image/png");
//         localStorage.setItem("image", dataURL);

//         window.location.href = "/preview";
//     };

// });
