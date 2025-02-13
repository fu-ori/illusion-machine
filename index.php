<!DOCTYPE html>
<html lang="en">

<head>
    <title>ILLUSION MACHINE</title>
    <?php include "engine/head.php"; ?>
</head>

<body>

    <section class="zoe-ui">
        <div class="columns">

            <div class="column">
                <div class="config">
                    <p>CHOOSE YOUR PREFERENCES</p>
                    <div class="clear10x"></div>
                    <div class="box box-gen">
                        <label class="label">COLOR 1</label>
                        <input type="text" data-coloris>
                    </div>
                </div>
            </div>

            <div class="column is-6">
                <div class="renders">

                    <!-- POST -->
                    <div class="box box-art has-text-centered" id="post">
                        <canvas id="postLayer7_ID"></canvas>
                        <canvas id="postLayer6_ID"></canvas>
                        <canvas id="postLayer5_ID"></canvas>
                        <canvas id="postLayer4_ID"></canvas>
                        <canvas id="postLayer3_ID"></canvas>
                        <canvas id="postLayer2_ID"></canvas>
                        <canvas id="postLayer1_ID"></canvas>

                        <div class="has-text-right">
                            <div class="clear10x"></div>
                            <a class="button is-light is-small" onclick="renderPost();">save post</a>
                        </div>
                    </div>
                    <!-- ##################################################### -->

                    <script type="text/javascript" src="engine/engine.js"></script>
                    <?php include "models/diffusion.php"; ?>
                </div>
            </div>

            <div class="column is-1">
                <ul class="render-tools">
                    <li>
                        <a onclick="imagine()" class="button is-danger is-large">
                            <i class="ph-thin ph-magic-wand"></i>
                        </a>
                    </li>

                    <li>
                        <a onclick="" class="button is-light is-large">
                            <i class="ph-thin ph-info"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </section>

</body>

</html>