<?php

echo $this->tag->javascriptInclude(
    "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js",
    true
);
echo $this->tag->javascriptInclude("https://code.jquery.com/jquery-3.6.0.js", true);
echo $this->tag->javascriptInclude("js/main.js");
