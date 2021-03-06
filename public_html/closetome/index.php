<?php
    require '../../lib/class-hay.php';
    $hay = new Hay("closetome");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <title>Close to me</title>
</head>
<body>
    <div id="app"
         v-cloak>
        <div class="screen"
             v-bind:is-app="!!iframeSrc">
            <div v-show="!iframeSrc">
                <header>
                    <a href="../">&laquo; Hay's tools</a>
                </header>

                <h1><?php $hay->title(); ?></h1>
                <h2><?php $hay->description(); ?></h2>

                <p>Click on the button to get a map of all Wikidata items around you.</p>

                <button
                    v-on:click="go"
                    v-bind:disabled="loading"
                    class="button">
                    <span v-if="!loading">What's close to me?</span>
                    <span v-if="loading">One moment...</span>
                </button>

                <section>
                    <h3>Options</h3>

                    <label for="language">
                        <span>Language</span>
                        <input
                            type="text"
                            autocorrect="off"
                            autocapitalize="none"
                            v-model="language" />
                    </label>

                    <label for="radius">
                        <span>Radius</span>

                        <input
                            type="range"
                            min="0.5"
                            max="3"
                            step="0.5"
                            v-model="radius" />

                        <span>&nbsp;{{radius}} km</span>
                    </label>
                </section>
            </div>

            <div class="screen--app" v-show="iframeSrc">
                <header>
                    <a href=".">Close to me</a>
                    &nbsp;&mdash;&nbsp;
                    <a href="../">Hay's tools</a>
                </header>

                <iframe
                    v-bind:src="iframeSrc"
                    class="screen__app"
                    border="0"
                    referrerpolicy="origin"
                    sandbox="allow-scripts allow-same-origin allow-popups"></iframe>
            </div>
        </div>
    </div>

    <script src="bundle.js"></script>
</body>
</html>