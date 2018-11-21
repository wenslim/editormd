<?php

Route::namespace('Wenslim\editormd') -> group(function () {
    Route::post('wenslim/editormd/uploadImage', 'Editor@uploadImage') -> name('editormd.uploadImage');
});