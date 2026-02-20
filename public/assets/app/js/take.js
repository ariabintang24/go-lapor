document.addEventListener("DOMContentLoaded", function () {
    const video = document.getElementById("video-webcam");

    // 🚨 Kalau tidak ada elemen video, jangan jalankan kamera
    if (!video) return;

    async function startCamera() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false,
            });

            video.srcObject = stream;
            video.play();
        } catch (error) {
            console.error("Camera Error:", error);
            alert("Izinkan menggunakan webcam untuk demo!");
        }
    }

    startCamera();

    window.takeSnapshot = function () {
        if (!video.videoWidth) {
            alert("Kamera belum siap.");
            return;
        }

        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        context.drawImage(video, 0, 0);

        canvas.toBlob(function (blob) {
            const reader = new FileReader();

            reader.onload = function () {
                sessionStorage.removeItem("imageBlob");
                sessionStorage.setItem("imageBlob", reader.result);
                window.location.href = "/preview";
            };

            reader.readAsDataURL(blob);
        }, "image/png");
    };
});

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
