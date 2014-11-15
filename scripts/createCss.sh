#!/bin/bash
cat ../web/thirdparty/leaflet-0.7.3/leaflet.css ../web/thirdparty/jquery-ui-1.11.2.custom/jquery-ui.css ../web/thirdparty/styles.css > all.css
yuicompressor all.css -o all.min.css
rm all.css 
mv all.min.css ../web