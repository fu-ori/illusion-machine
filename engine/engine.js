const postLayer1Canvas = document.getElementById('postLayer1_ID');
const postLayer2Canvas = document.getElementById('postLayer2_ID');
const postLayer3Canvas = document.getElementById('postLayer3_ID');
const postLayer4Canvas = document.getElementById('postLayer4_ID');
const postLayer5Canvas = document.getElementById('postLayer5_ID');
const postLayer6Canvas = document.getElementById('postLayer6_ID');
const postLayer7Canvas = document.getElementById('postLayer7_ID');

postLayer1Canvas.width = 1080;
postLayer1Canvas.height = 1350;

postLayer2Canvas.width = 1080;
postLayer2Canvas.height = 1350;

postLayer3Canvas.width = 1080;
postLayer3Canvas.height = 1350;

postLayer4Canvas.width = 1080;
postLayer4Canvas.height = 1350;

postLayer5Canvas.width = 1080;
postLayer5Canvas.height = 1350;

postLayer6Canvas.width = 1080;
postLayer6Canvas.height = 1350;

postLayer7Canvas.width = 1080;
postLayer7Canvas.height = 1350;

function imagine() {
    location.reload(true);
}
document.addEventListener('keydown', function (e) {
    if (e.keyCode === 39) {
        imagine();
    }
});

function renderPost() {
    var canvas1 = document.getElementById("postLayer1_ID");
    var canvas2 = document.getElementById("postLayer2_ID");
    var canvas3 = document.getElementById("postLayer3_ID");
    var canvas4 = document.getElementById("postLayer4_ID");
    var canvas5 = document.getElementById("postLayer5_ID");
    var canvas6 = document.getElementById("postLayer6_ID");
    var canvas7 = document.getElementById("postLayer7_ID");

    var canvasFull = document.createElement('canvas');
    var ctx = canvasFull.getContext('2d');
    canvasFull.width = canvas1.width;
    canvasFull.height = canvas1.height;

    ctx.drawImage(canvas1, 0, 0);
    ctx.drawImage(canvas2, 0, 0);
    ctx.drawImage(canvas3, 0, 0);
    ctx.drawImage(canvas4, 0, 0);
    ctx.drawImage(canvas5, 0, 0);
    ctx.drawImage(canvas6, 0, 0);
    ctx.drawImage(canvas7, 0, 0);

    var image = canvasFull.toDataURL("image/png");
    var link = document.createElement('a');
    link.download = 'post.png';
    link.href = image;
    link.click();
}