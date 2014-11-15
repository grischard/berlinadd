#!/bin/bash
sed "/L\.Icon\.Default\.imagePath = (function () {/a return 'thirdparty/leaflet-0\.7\.3/images';" ../web/thirdparty/leaflet-0.7.3/leaflet-src.js > leaf.js
cat ../web/thirdparty/jquery-1.11.1.min.js ../web/thirdparty/jquery-ui-1.11.2.custom/jquery-ui.js leaf.js ../web/thirdparty/script.js > all.js
yuicompressor all.js -o all.min.js
rm all.js
rm leaf.js
mv all.min.js ../web