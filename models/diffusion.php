<script>
// normal | multiply | screen | overlay | darken | lighten | color-dodge | color-burn | hard-light
// | soft-light | difference | exclusion | hue | saturation | color | luminosity

// Loading
function loadImages(images, callback) {
    let loadedImages = 0;
    const totalImages = images.length;
    images.forEach(image => {
        image.onload = () => {
            loadedImages++;
            if (loadedImages === totalImages) {
                callback(); 
            }
        };
    });
}

// Layer 1 (background)
const background = new Image();
background.src = 'models/diffusion/diffusion-webp/0001.jpg';

// Layer 1 (efx)
const efx = new Image();
efx.src = 'models/diffusion/diffusion-efx/0001.jpg';

// Layer 2 (SVG)
const svg1 = new Image();
svg1.src = "models/diffusion/svg/0001.svg";

// Layer 3 (SVG)
const svg2 = new Image();
svg2.src = "models/diffusion/svg/0002.svg";

// Layer 4
const focus = new Image();
focus.src = "engine/fallback.png";

// Layer 7 (efx)
const object3d = new Image();
object3d.src = "models/diffusion/svg/0003.svg";;

// Render
loadImages([background, efx, svg1, svg2, focus, object3d], function() {
    const postLayer1 = document.getElementById('postLayer1_ID').getContext('2d');
    const postLayer2 = document.getElementById('postLayer2_ID').getContext('2d');
    const postLayer3 = document.getElementById('postLayer3_ID').getContext('2d');
    const postLayer4 = document.getElementById('postLayer4_ID').getContext('2d');
    const postLayer5 = document.getElementById('postLayer5_ID').getContext('2d');
    const postLayer6 = document.getElementById('postLayer6_ID').getContext('2d');
    const postLayer7 = document.getElementById('postLayer7_ID').getContext('2d');

    postLayer1.drawImage(background, 0, 0, postLayer1.canvas.width, postLayer1.canvas.height);
    postLayer1.globalCompositeOperation = "lighten";
    postLayer1.globalAlpha = .8; 
    postLayer1.drawImage(efx, 0, 0, postLayer1.canvas.width, postLayer1.canvas.height);

    postLayer2.drawImage(svg1, 400, 500); 
    postLayer2.fillStyle = "magenta";
    postLayer2.globalCompositeOperation = 'source-in';  
    postLayer2.fillRect(0, 0, postLayer2.canvas.width, postLayer2.canvas.height);

    postLayer3.drawImage(svg2, -400, -400); 
    postLayer3.fillStyle = "cyan";
    postLayer3.globalCompositeOperation = 'source-in';  
    postLayer3.fillRect(0, 0, postLayer3.canvas.width, postLayer3.canvas.height);

    postLayer4.drawImage(focus, 0, 0);

    postLayer5.drawImage(object3d, -300, 300);
    postLayer5.fillStyle = "greenyellow";
    postLayer5.globalCompositeOperation = 'source-in';  
    postLayer5.fillRect(0, 0, postLayer5.canvas.width, postLayer5.canvas.height);

    document.fonts.load('1em "open sans"').then(function() {
        postLayer6.font = '800 90px "open sans"'; 
        postLayer6.fillStyle = 'cyan';
        postLayer6.strokeStyle = 'magenta';
        postLayer6.lineWidth = 30; 
        postLayer6.textAlign = 'center';
        postLayer6.textBaseline = 'middle';

        let text = 'Hello World'; 
        text = text.replace(/<br>/g, '\n');
        const lines = text.split('\n');
        const textHeight = 90;
        const maxWidth = postLayer6.canvas.width - 40; 
        const lineHeight = textHeight * 1.2; 

        let maxLineWidth = 0;
        lines.forEach(line => {
            const lineWidth = postLayer6.measureText(line).width;
            maxLineWidth = Math.max(maxLineWidth, lineWidth);
        });

        const canvasWidth = postLayer6.canvas.width;
        const canvasHeight = postLayer6.canvas.height;
        let randomX = Math.random() * canvasWidth; 
        let randomY = Math.random() * (canvasHeight - lines.length * lineHeight);
        if (randomX + maxLineWidth / 2 > canvasWidth) {
            randomX = canvasWidth - maxLineWidth / 2;  
        }
        if (randomX - maxLineWidth / 2 < 0) {
            randomX = maxLineWidth / 2; 
        }
        lines.forEach((line, index) => {
            const y = randomY + index * lineHeight;
            postLayer6.strokeText(line, randomX, y);
            postLayer6.fillText(line, randomX, y);
        });
    });
});
</script>